<?php 
session_start();
//Conectare la baza de date
$db = mysqli_connect('localhost', 'root', '', 'wannahelp');
//Preluam email-ul introdus
$username = mysqli_real_escape_string($db, $_POST['email']);

//Executam query-ul de extragere a parolei in functie de email-ul introdus
$sql = "SELECT password FROM users WHERE email='$username'";
$results = mysqli_query($db, $sql);
$the_row = mysqli_fetch_assoc($results);

if (mysqli_num_rows($results) == 1) {
    //Se genereaza o parola aleatorie
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $password = '';       
    for ($i = 0; $i < 8; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $password .= $characters[$index]; 
    }
    $msg = "Parola ta este acum: " .$password;
    
    //Se trimite mail la adresa de email cu noua parola
    mail($username,"Recuperare parolă",$msg);

    //Se afiseaza un avertisment cu, ca totul a functionat bine
    $_SESSION['password_changed'] = "$username";   
    
    //se hash-eaza parola si se incarca in baza de date
    $password = md5($password);
    $query = "UPDATE users SET password = '$password' WHERE email = '$username'";
    mysqli_query($db, $query);

    //utilizatorul e trimis pe pagina de home
    header('Location: login_visual.php');
}
else{
    $_SESSION['parola_inexistenta'] = 'set';
    header( "Location: forgot_password.php");
}
?>