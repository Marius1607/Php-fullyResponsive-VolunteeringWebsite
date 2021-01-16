<?php session_start(); ?>
<html>
    <head>
        <title>Schimbă parola</title>
        <link rel="icon" type="image/jpg" href="../img/icon.png">
        <link rel = "stylesheet" href = "../css/register.css">
        <link rel = "stylesheet" href = "../css/autocomplete.css">
        <link rel = "stylesheet" href = "../css/password_change.css">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    </head>

</html>
    <body>
    <script src = "../js/password_scripts.js"></script>
    <div class = "wrapper">
        <h3>SCHIMBĂ PAROLA</h3>
        <form action = "change_password.php" method =  "post">
            <input name = "p_actuala" type = "password" placeholder="Parolă actuală" required>
            <?php 
                if(isset($_SESSION["eroare_parola"])){
                    echo '<p style = "color:red;">Parola introdusă nu este corectă</p>';
                    unset($_SESSION['eroare_parola']);
                }
            ?>
            <input id = "pass" name = "p_noua" type = "password" placeholder="Parolă nouă" oninput = "compare2()" onchange="compare2()" pattern = "([0-9]|[a-z]|[A-Z]|[^[a-z]){5,30}$" required>
            <input id = "confirm_pass" name = "confirma_p_noua" type = "password" placeholder="Confirmă parola nouă" oninput = "compare()" onchange="compare()" pattern = "([0-9]|[a-z]|[A-Z]|[^[a-z]){5,30}$" required>
            <p id = "pass_error">Parolele nu corespund</p>   
            <p id = "pass_error2">Parola introdusă este prea scurtă</p>
            <input type = "submit" value = "Schimbă" id = "register-btn">
        </form>
    <style>
    #pass_error{
    color:red;
    display: none;
    }
    #pass_error2{
    color:red;
    display: none;
    }
    </style>
    </div>
    <img src = "../img/logo.png" class = "logoImg">
    </body>
</html>