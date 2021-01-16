<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'wannahelp');
$error = "Email sau parolă incorecte";

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


$password = md5($password);
$query = "SELECT * FROM users WHERE email='$username' AND password='$password'";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results) == 1) {
	if(!isset($_SESSION['username'])){
  	  $_SESSION['username'] = $username;
  	  unset($_SESSION['error']);
  	  header('Location: home.php');
	  }
	  else{
		header('Location: login_visual.php');
	  }
	}
else {
		$_SESSION['error'] = $error;
		header('Location: login_visual.php');
  	}
}
?>