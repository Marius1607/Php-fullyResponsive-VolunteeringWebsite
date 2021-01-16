<!DOCTYPE html>
<html>
<head>
    <title> Register </title>
    <link rel="icon" type="image/jpg" href="../img/icon.png">
    <style>
        thead {
          width: 100%;
          font-size: 50%;
          font-family: "Roboto Condensed";
          color: red;
        }

        table{
          width: 100%;
          height: 100%;
        }

        td {
          font-size: 40%;
          font-family: "Roboto Condensed";
          color: red;
          width: 100%;
        }
    </style>
</head>
  <body>
    <?php
      session_start();
      // initializing variables
      $username = "";
      $email    = "";
      $errors = array(); 

      // connect to the database
      $db = mysqli_connect('localhost', 'root', '', 'wannahelp');

      if (isset($_POST['reg_user'])) {
      
          $prenume = mysqli_real_escape_string($db, $_POST['prenume']);
          $nume = mysqli_real_escape_string($db, $_POST['nume']);
          $email = mysqli_real_escape_string($db, $_POST['email']);
          $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
          $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
          $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
          $facebook = mysqli_real_escape_string($db, $_POST['facebook']);
          $website = mysqli_real_escape_string($db, $_POST['website']);
          $localitate = mysqli_real_escape_string($db, $_POST['localitate']);
          $judet = mysqli_real_escape_string($db, $_POST['judet']);

          //formating the name and firstname
          $prenume = ucfirst(strtolower($prenume));
          $nume = ucfirst(strtolower($nume));
          $localitate = ucfirst(strtolower($localitate));
          $judet = ucfirst(strtolower($judet));

      if ($password_1 != $password_2) {
	  array_push($errors, "Parolele nu corespund");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['email'] === $email) {
      $_SESSION['register_wrong'] = "set";
      array_push($errors, "Emailul există deja");
    }
  }
    
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0 && !(isset($_SESSION["username"]))) {
    $password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO users (prenume, nume, email, password, telefon, facebook, website, localitate, judet) 
  			  VALUES('$prenume', '$nume', '$email', '$password', '$telefon', '$facebook', '$website', '$localitate', '$judet')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $email;
  	header('Location: home.php');
  }

  else{
    header('Location: register_visual.php');
    $_SESSION['prenume'] = $prenume;
    $_SESSION['nume'] = $nume;
    $_SESSION['email'] = $email;
    $_SESSION['telefon'] = $telefon;
    $_SESSION['facebook'] = $facebook;
    $_SESSION['website'] = $website;
    $_SESSION['localitate'] = $localitate;
    $_SESSION['judet'] = $judet;
    
  }

}
        ?>
    </body>
</html>