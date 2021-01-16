<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Modifică date
        </title>
    </head>
    <body>
        <?php 
        if(!(isset($_SESSION['username']))){
            header('Location: ../php/login_visual.php');
        }

        else{
            if($_POST['user_details'] == "Deconectare"){
                    session_unset();
                    session_destroy();
                    header('Location: ../php/home.php');
                }
            
            else if($_POST['user_details'] == "Schimbă parola"){
                header("Location: password_change_visual.php");
            }
            else if($_POST['user_details'] == "Modifică date"){
                header("Location: modify_data_visual.php");
            }
        }
        ?>
    </body>
</html>