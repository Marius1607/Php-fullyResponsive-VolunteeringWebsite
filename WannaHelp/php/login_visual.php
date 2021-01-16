<!DOCTYPE html>
<?php session_start() ?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>
            WannaHelp?
        </title>
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="../img/icon.png">
        <link rel = "stylesheet" href = "../css/login.css">
    </head>
    <body>
        <style>
            body{
                background-image: linear-gradient(#485563, #29323c);
                width: 100%;
                position: absolute;
                margin: 0;
            }

            #forgot_password_paragraph{
                color: #00B9F7;
                border: none;
                width: fit-content;
                background-color: transparent;
                font-size: 20px;
            }

            #forgot_password_paragraph :hover{
                cursor: pointer;
            }
        </style>
        <div class = "wrapper">
            <form action="../php/login.php" method="post">
                <h3> Autentificare </h3>
                <?php
                if(isset($_SESSION['password_changed'])){
                        $email_s = $_SESSION['password_changed'];
                        echo "<p style = 'color:red;'> Un email cu noua ta parolă a fost trimis la adresa: $email_s </p>";
                        unset($_SESSION['password_changed']);
                    }
                    ?>
                <input type = "text" name = "email" placeholder="Adresă de email" required>
                <input type = "password" name = "password" placeholder="Parolă" required>
                <?php 
                if (isset($_SESSION["username"])){
                    echo '<p style = "color:red;">Ești deja logat </p>';
                }

                if(isset($_SESSION["error"])){
                    echo '<p style = "color:red;">Emailul sau parolă incorecte</p>';
                    unset($_SESSION["error"]);
                }
                ?>
                <input type = "submit" id = "register-btn" value = "Autentificare" name = "login_user">
            </form>
            <form action = "register_visual.php">
                <input type="submit" id = "already-btn" value="Nu ai cont?">
        </form>
        <form action = "../php/forgot_password.php">
            <input id = "forgot_password_paragraph" type = "submit" value = "Ți-ai uitat parola?">
        </form>
        </div>
        <span id = "motto"> Wanna Help?</span>
        <img src = "../img/logo.png" class = "logoImg">
    </body>
</html>