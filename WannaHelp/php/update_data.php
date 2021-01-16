<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'wannahelp');
    $em = $_SESSION['username'];
    $errors = array(); 
    if (isset($_POST['sub_user'])) {
        $prenume = mysqli_real_escape_string($db, $_POST['prenume']);
        $nume = mysqli_real_escape_string($db, $_POST['nume']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
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

        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if ($user) { 
            if ($user['email'] === $email && !($user['email'] === $em)) {
            array_push($errors, "Adresa de email introdusă există deja");
            }
        }

        // $check = false;
        // foreach ($judete as $area) {
        //     if($area === $judet){
        //         $check = true;
        //     }
        // }

        // if ($check != true){
        //     array_push($errors, "Județul introdus nu există");
        // }     
        
        if (count($errors) == 0)  {
            $query = "UPDATE users SET prenume = '$prenume', nume = '$nume', email = '$email', telefon = '$telefon', 
            facebook = '$facebook', website = '$website', localitate = '$localitate', judet = '$judet' WHERE email = '$em'";
            mysqli_query($db, $query);
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['username'] = $email;
            header('Location: ../php/home.php');
        }

        else {
            $_SESSION['erroare_email'] = "err";
            header( "Location: modify_data_visual.php");
        }
    }
?>