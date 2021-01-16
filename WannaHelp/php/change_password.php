<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'wannahelp');
    $a_pass = mysqli_real_escape_string($db, $_POST['p_actuala']);
    $n_pass = mysqli_real_escape_string($db, $_POST['p_noua']);
    $cn_pass = mysqli_real_escape_string($db, $_POST['confirma_p_noua']);
    $username = $_SESSION['username'];
    $query = "SELECT password FROM users WHERE email = '$username'";
    $result = $db->query($query);
    $the_row = $result->fetch_assoc();
    if(md5($a_pass) == $the_row["password"]){
        if($n_pass == $cn_pass){
            $n_pass = md5($n_pass);
            $query = "UPDATE users SET password = '$n_pass' WHERE email = '$username'";
            mysqli_query($db, $query);
            echo '<script type="text/javascript">alert("Parola dumneavoastră a fost schimbată");</script>';
            header( "refresh:0.1 ;url=../php/home.php");
        }

        else{
            echo '<script type="text/javascript">alert("Parolele nu corespund");</script>';
            header( "refresh:0.1 ;url=../html/home.html");
        }
    }

    else {
        $_SESSION["eroare_parola"] = "eroare";
        header("Location: password_change_visual.php");
    }
?>