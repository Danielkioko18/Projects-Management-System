<?php include('php/functions.php') ?>

<!-- =================LOGIN FORM================================= --> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta http-equiv="X-UA-Compatible">
	<title>Chuka University</title>
	<link rel="icon" href="gallery/logo.jpg">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body oncontextmenu="return false">	
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="POST" action="login.php">
		<?php echo display_error(); ?>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" placeholder="Email">
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>

</body>
</html>
