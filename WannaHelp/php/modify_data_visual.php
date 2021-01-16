<?php session_start(); ?>
<html>
    <head>
        <title>Modifică date</title>
        <link rel="icon" type="image/jpg" href="../img/icon.png">
        <link rel = "stylesheet" href = "../css/register.css">
        <link rel = "stylesheet" href = "../css/autocomplete.css">
        <link rel = "stylesheet" href = "../css/password_change.css">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            $db = mysqli_connect('localhost', 'root', '', 'wannahelp');
            $email = $_SESSION['username'];
            $sql = "SELECT prenume, nume, telefon, website, facebook,localitate, judet FROM users WHERE email = '$email'";
            $result = $db->query($sql);
            $the_row = $result->fetch_assoc();
        ?>    
        <div class = "wrapper">
            <form autocomplete="off" action="../php/update_data.php" method="post"  onsubmit="return checkform(this);">
                <h3>Modifică date</h3>
                <input type = "text" name = "prenume" value= "<?php echo($the_row["prenume"]);?>" placeholder = "Prenume" pattern ="([a-z]|[A-Z]){3,40}" required>
                <input type = "text" name = "nume" value="<?php echo($the_row["nume"]);?>" placeholder="Nume" pattern ="([a-z]|[A-Z]){3,40}" required>
                <input type = "email" name = "email" value="<?php echo($email)?>" placeholder="Email" required>
                <?php
                    if(isset($_SESSION['erroare_email']))
                    {
                    echo '<p style = "color:red;">Emailul introdus există deja</p>';
                    unset($_SESSION['erroare_email']);
                    }
                ?>
                <input type = "number" name = "telefon" value="<?php echo($the_row["telefon"]);?>" placeholder = "Telefon"  pattern="^!*([0-9]!*){10,15}$" required>
                <input type = "text" name = "facebook" value="<?php echo($the_row["facebook"]);?>"placeholder = "Facebook">
                <input type = "text" name ="website" value="<?php echo($the_row["website"]);?>" placeholder="Website">
                <input type = "text" name = "localitate" value="<?php echo($the_row["localitate"]);?>" placeholder ="Localitate" required>
                <div class = "autocomplete">
                    <input type = "text" id = "regiune-text" name = "judet" value="<?php echo($the_row["judet"]);?>" placeholder = "Județ" required>
                </div>
                <br>
                <input type="submit" id = "register-btn" value="Modifică" name="sub_user">
                <script src = "../js/autocomplete.js"></script>
            </form>
        </div>
            <span id = "motto"> DO <br> YOU <br> WANNA <br> HELP? </span>
            <img src = "../img/logo.png" class = "logoImg">
    </body>

    
</html>