<<?php 
	$username = $_POST["username"];
	$password = $_POST["pass"];

	if ($username == 'admin' && $password == 'ekoputra') {
		session_id("Login");
		session_start();
		$_SESSION ['username']= $username;
		header("Location: index.php");
		session_write_close();
	}else{
		header("Location: failedLogin.php");
	}
 ?>