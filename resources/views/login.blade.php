<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
</head>
<body  style="background-image: url({{asset('assets/img/bglanding.jpg')}})">
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>HONORKU</h1><br>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" /><br>
			<button style="border-radius: 10px;"><a href="/dashboard/paa" style="color: white">LOGIN</a></button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Universitas Airlangga</h1><br>
                <img src="assets/img/logo.png" alt="logo" style="max-width: 200px;">
				<p>Exellent With Morality</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>