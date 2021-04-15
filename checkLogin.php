<<?php 
	$username = $_POST["username"];
	$password = $_POST["pass"];

<<<<<<< HEAD
	if ($username == 'admin' && $password == 'admin') {
=======
	if ($username == 'admin' && $password == 'ekoputra') {
		session_id("Login");
		session_start();
		$_SESSION ['username']= $username;
>>>>>>> f3c2c58481aaad15ae8209dad7f30911527a8a01
		header("Location: index.php");
		session_write_close();
	}else{
		header("Location: failedLogin.php");
	}
 ?>