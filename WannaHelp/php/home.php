<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>
            WannaHelp 
        </title>
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../css/home.css">
        <link rel = "stylesheet" href = "../css/autocomplete.css">
        <link rel = "stylesheet" href = "../css/list-style.css">
        <link rel="icon" type="image/jpg" href="../img/icon.png">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
        <script src = "../js/feature.js"> </script>
    </head>
    <body>
    
        <div class = "user-options" type = "submit">
            <form action = "../php/optiuni_utilizator.php" method = "post">
                <select  class = "lista-user" name = "user_details" onchange="this.form.submit()">
                    <option value="" selected="selected" disabled="disabled" onload=true><?php
                    if(isset($_SESSION['username'])){
                        echo($_SESSION['username']);
                    }
                    else{
                        echo("Utilizator");
                    }
                    ?></option>
                    <option onclick="this.form.submit()"> Modifică date </option>
                    <option onclick="this.form.submit()"> Schimbă parola </option>
                    <option onclick="this.form.submit()"> Deconectare </option>
            </select>
            </form>
        </div>
        <h2>Wanna Help?</h2>
        
        <div class = "wrapper">
            <h3>Caută voluntar </h3>
                <form autocomplete="off" action="../php/displayMembers.php" method="post">
                    <input type = "text" name = "nume" id = "name" placeholder="Nume" onkeyup="displaySearchText()">
                    <div class="autocomplete">
                        <input type = "text" id ="regiune-text" name = "judet" onkeyup="displaySearchText()" placeholder="Județ">
                    </div>
                    
            <?php
            if(!(isset($_SESSION['username']))){
                ?>
                <a href="register_visual.php">Înregistrare</a>
                <?php
            }
            ?>
        
        <input type="submit" id = "submit-btn" value="Vezi tot">
        <?php
            if(!(isset($_SESSION['username']))){
                ?>
        <a href="../php/login_visual.php">Autentificare</a>
            <?php }?>
        </form>
        </div>
        <img src = "../img/logo.png" class = "logoImg">
        <script src = "../js/autocomplete.js"></script>
    </body>
</html>