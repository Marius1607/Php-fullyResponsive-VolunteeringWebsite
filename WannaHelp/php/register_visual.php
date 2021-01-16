<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>
            Rețeaua națională de contacte în astronomie
        </title>
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="../img/icon.png">
        <link rel = "stylesheet" href = "../css/register.css">
        <link rel = "stylesheet" href = "../css/autocomplete.css">
        <link rel = "stylesheet" href = "../css/capbox.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    </head>
    <body>
        <div class = "wrapper">
            <form autocomplete="off" action="../php/register.php" method="post"  onsubmit="return checkform(this);">
                <h3>Înregistrare</h3>
                <?php 
                    if(isset($_SESSION['username'])){
                        echo '<p style = "color:red;">Nu-ți poți face un cont cât timp ești logat</p>';
                    }
                ?>
                <input type = "text" name = "prenume" placeholder="Prenume" pattern ="([a-z]|[A-Z]){3,40}" value = '<?php if(isset($_SESSION['prenume'])) echo($_SESSION['prenume']); ?>'required>
                <input type = "text" name = "nume" placeholder="Nume" pattern ="([a-z]|[A-Z]){3,40}" value = '<?php if(isset($_SESSION['nume'])) echo($_SESSION['nume']); ?>' required>
                <input type = "email" name = "email" placeholder="Adresă de email" value = '<?php if(isset($_SESSION['email'])) echo($_SESSION['email']); ?>'required>
                <?php
                    if(isset($_SESSION['register_wrong']))
                    {
                    echo '<p style = "color:red;">Emailul introdus există deja</p>';
                    unset($_SESSION['register_wrong']);
                    }
                ?>
                <input type = "password" id = "pass" name = "password_1" placeholder="Parolă (cel puțin 5 caractere)" oninput = "compare2()" onchange="compare2()" pattern = "([0-9]|[a-z]|[A-Z]|[^[a-z]){5,30}$" required>
                <input type = "password" id = "confirm_pass" name = "password_2" placeholder="Confirmă parolă" oninput = "compare()" onchange="compare()" pattern = "([0-9]|[a-z]|[A-Z]|[^[a-z]){5,30}$" required>  
                <p id = "pass_error">Parolele nu corespund</p>   
                <p id = "pass_error2">Parola introdusă este prea scurtă</p>
                <input type = "number" name = "telefon" placeholder="Telefon" pattern="^!*([0-9]!*){10,15}$" value = '<?php if(isset($_SESSION['telefon'])) echo($_SESSION['telefon']); ?>'required>
                <input type = "text" name = "facebook" placeholder="Adresă facebook(dacă există)" value = '<?php if(isset($_SESSION['facebook'])) echo($_SESSION['facebook']); ?>'>
                <input type = "text" name ="website" placeholder = "Adresă website personal (dacă există)" pattern="https?://.+" value = '<?php if(isset($_SESSION['website'])) echo($_SESSION['website']); ?>'>
                <input type = "text" name = "localitate" placeholder="Localitate" value = '<?php if(isset($_SESSION['localitate'])) echo($_SESSION['localitate']); ?>' required>
                <div class = "autocomplete">
                    <input type = "text" id = "regiune-text" name = "judet" placeholder="Județ" oninput="displayCaptcha()" onclick ="displayCaptcha()" onchange="displayCaptcha()" value = '<?php if(isset($_SESSION['judet'])) echo($_SESSION['judet']); ?>'required>
                </div>
                <br>
                <div class="capbox">

                    <div id="CaptchaDiv"></div>

                        <div class="capbox-inner">
                            Type the number:<br>

                        <input type="hidden" id="txtCaptcha">
                        <input type="text" name="CaptchaInput" id="CaptchaInput" size="15"><br>

                    </div>
                </div>
                <input type="submit" id = "register-btn" value="Înregistrare" name="reg_user">
            </form>
            <form action = "login_visual.php">
                <input type="submit" id = "already-btn" value="Ai deja un cont?">
            </form>
        </div>
        <script src = "../js/autocomplete.js"></script>
        <script src = "../js/password_scripts.js"></script>
        <span id = "motto"> Wanna <br> Help?</span>
        <img src = "../img/logo.png" class = "logoImg">

        <script type="text/javascript">

        //Ca sa nu ramanem cu sesiuni aiurea. De sesiunile astea am avut nevoie pentru a completa field-urile in caz ca au fost introduse
        //date gresite si s-a apasat butonul register. Sa nu fie user-ul nevoit sa completeze totul
        <?php 
            if(isset($_SESSION['nume'])){
                unset($_SESSION['prenume']);
                unset($_SESSION['nume']);
                unset($_SESSION['email']);
                unset($_SESSION['telefon']);
                unset($_SESSION['facebook']);
                unset($_SESSION['website']);
                unset($_SESSION['afiliere_lista']);
                unset($_SESSION['afiliere']);
                unset($_SESSION['localitate']);
                unset($_SESSION['judet']);
                ?>
                displayCaptcha();
                <?php
            }
        ?>

        // Captcha Script - Nu e facut de mine. Merge. Nu umblati la el!!!
        function displayCaptcha(){
            document.getElementsByClassName("capbox")[0].style.display = "inline-block";
        }

        function checkform(theform){
            var why = "";
            if(theform.CaptchaInput.value == ""){
                why += "- Please Enter CAPTCHA Code.\n";
            }

            if(theform.CaptchaInput.value != ""){
                if(ValidCaptcha(theform.CaptchaInput.value) == false){
                    why += "- The CAPTCHA Code Does Not Match.\n";
                }
            }

            if(why != ""){
                alert(why);
                return false;
            }
        }

        var a = Math.ceil(Math.random() * 9)+ '';
        var b = Math.ceil(Math.random() * 9)+ '';
        var c = Math.ceil(Math.random() * 9)+ '';
        var d = Math.ceil(Math.random() * 9)+ '';
        var e = Math.ceil(Math.random() * 9)+ '';

        var code = a + b + c + d + e;
        document.getElementById("txtCaptcha").value = code;
        document.getElementById("CaptchaDiv").innerHTML = code;

        // Validate input against the generated number
        function ValidCaptcha(){
            var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
            var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
            if (str1 == str2){
                return true;
            }else{
                return false;
            }
        }

        function removeSpaces(string){
            return string.split(' ').join('');
        }

        </script>


        <style>
            #pass_error{
            color:red;
            display: none;
            }
            #pass_error2{
            color:red;
            display: none;
            }
            #error_login_1{
                color: red;
                display: none;
            }
        </style>
    </body>
</html>