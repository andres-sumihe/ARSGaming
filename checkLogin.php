<<?php 
	$username = $_POST["username"];
	$password = $_POST["pass"];

	if ($username == 'admin' && $password == 'ekoputra') {
		header("Location: index.php");
	}else{
		header("Location: failedLogin.php");
	}
 ?>