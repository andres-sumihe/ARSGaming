<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="login.css?v=<?=time();?>">
</head>
<body>
	<section class="wrapper">
	<div class="content">
		<header>
		<h1>Welcom back</h1>
		</header>
		<section>
		<form method="post" action="checkLogin.php" class="login-form">
			<div class="input-group">
			<label for="username">Username</label>
			<input type="text" placeholder="Username or Email" id="username" name="username">
			</div>
			<div class="input-group">
			<label for="password">Password</label>
			<input type="password" placeholder="Password" id="pass" name="pass">
			</div>
			<div class="input-group"><button>Login</button></div>
		</form>
		</section>
		<footer>
		<p id="quote">Loading Quote</p>
		</footer>
	</div>
	</section>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script>
		

		const options = {
			method: 'GET',
			url: 'https://famous-quotes4.p.rapidapi.com/random',
			params: {category: 'all', count: '1'},
			headers: {
				'x-rapidapi-key': 'YOUR_API_KEY',
				'x-rapidapi-host': 'famous-quotes4.p.rapidapi.com'
			}
		};


		axios.request(options).then(function (response) {
			var x = document.getElementById("quote");
				x.innerHTML = `"${response.data[0].text}" - ${response.data[0].author}`;
		}).catch(function (error) {
			console.error(error);
		});
	</script>

</body>
</html>