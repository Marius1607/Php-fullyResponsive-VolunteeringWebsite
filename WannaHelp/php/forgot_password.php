<!DOCTYPE html>
<html>
    <head>
        <title>
            Ți-ai uitat parola?
        </title>
        <link rel = "stylesheet" href = "../css/register.css">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="../img/icon.png">
    </head>
    <body>
        <?php
            session_start();
            $db = mysqli_connect('localhost', 'root', '', 'wannahelp');
            if(isset($_SESSION['username']))
            {
                echo '<script type="text/javascript">alert("Ești deja logat");</script>';
                header( "refresh:0.1 ;url=../html/home.html");
                // $username = $_SESSION['username'];
                // //Generating a random 8character password;
                // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                // $password = '';       
                // for ($i = 0; $i < 8; $i++) { 
                //     $index = rand(0, strlen($characters) - 1); 
                //     $password .= $characters[$index]; 
                // } 
                // $msg = "Parola ta este acum: " .$password;
                // $msg = wordwrap($msg,70);
                // mail($username,"Recuperare parolă",$msg);
                // echo '<script type="text/javascript">alert("Un email cu noua ta parolă a fost trimis la adresa: '.$username.'");</script>';
                // $password = md5($password);
                // $query = "UPDATE users SET password = '$password' WHERE email = '$username'";
                // mysqli_query($db, $query);
                // header( "refresh:0.1 ;url=../html/home.html");
            }

            else{
                ?>
                <div class = "wrapper">
                    <h3>Recuperare parolă</h3>
                <form action="sending_password_for_unlogged_user.php" method = 'post'>
                <?php
                if(isset($_SESSION['parola_inexistenta'])){
                        echo '<p style = "color:red;">Nu am putut găsi acest email în baza de date</p>';
                        unset($_SESSION['parola_inexistenta']);
                    }
                    ?>
                    <input name = 'email' type = 'text' placeholder = 'Introdu adresa de email aici'>
                    <input type = 'submit' value = 'Trimite' id = "register-btn">
                </form>
            </div>
                <?php
            }
            
        ?>
    </body>
</html>