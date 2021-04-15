<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<script>
	function alertUser(msg) {
		alert(msg);
	}
</script>
<body onload="alertUser('Username atau Password Salah')">
	<form action="checkLogin.php" method="post">
		<label>Username</label>
		<input type="text" name="username">
		<br><br>
		<label>Password</label>
		<input type="password" name="pass">
		<br>
		<input type="submit" name="submit" value="Login">
	</form>
</body>
</html>