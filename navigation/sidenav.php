<?php 
include 'php/functions.php';

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../index.php");
}
?>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="icon" href="gallery/logo.jpg">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		* { margin: 0px; padding: 0px; }
		body {
			box-sizing: border-box;
			height: 100%;
			font-size: 100%;
			background: #F8F8FF;
			text-decoration: none;
			height: 100%;
		}
		.header {
			width: 40%;
			margin: 30px auto 0px;
			color: white;
			background: #5F9EA0;
			text-align: center;
			border: 1px solid #B0C4DE;
			border-bottom: none;
			border-radius: 10px 10px 0px 0px;
			padding: 20px;
		}
		.container{
			z-index: 10;
			position: fixed;
			box-sizing: border-box;
			float: left;
			background: #0099FF;
			border-right: 1px solid black;
			display: inline-block;
			width: 20%;
			min-height: 100%;
			font-family: calibri;

		}
		
		.profile_img img {
			display: inline-block; 
			width: 150px; 
			height: 150px; 
			margin-left: 30px;
			float: center;
			border: 1px solid black;
			border-radius: 50%;
		}
		.profile_info div {
			display: inline-block; 
			margin: 5px;
			float: left;

		}
		.profile_info div strong{
			display: inline-block; 
			margin-left: 20px;
			float: left;
			font-size: 23px;
			font-weight: bold;
		}
		.profile_info i{
			font-size: 23px;
		}
		#bus{
			margin-left: 30px;
		}
		#title{
			margin-left: 15px;
			font-family: clibri;
			color: white;
			font-weight: bold;
			font-size: 25px;
		}
		.profile_info div a{
			font-size: 22px;
			font-weight: bold;
			margin-left: 20px;
			font-style: italic;
		}
		#fa-fa-sign-out{
			margin-left: 5px;
		}
		.col-sm{
			float: left;
		}
		.actions ul{
			list-style: none;
			flex-direction: column;;
			text-decoration: none;

		}
		.actions ul li{
			justify-content: space-around;
			padding: 7px;
			border-bottom: 1px solid #33ACFF;
			width: auto;	
		}
		.actions ul li i{
			float: left;
		}
		.actions ul li a{
			font-family: sans-serif;
			text-decoration: none;
			font-size: 18px;
			color: white;
			margin-left: 20px;
			font-weight: bolder;
			width: 100%;
			height: 100%;
			padding: 1% 6%;
			display: block;
		}
		.actions ul li:hover{
			background-color: darkblue;
			cursor: pointer;
		}
		.actions ul li:hover a{
			color: white;
		}


	</style>
	<div class="container">
		<div class="col-responsive-md">
		<!-- logged in user information -->
		<div class="row">
			<div class="profile_info">
			<div class="profile_img">
				<img src="gallery/profile.png" >
			</div>			

			<div class="col">
				<div class="row">
					<?php  if (isset($_SESSION['user'])) : ?>
					<strong class="text-dark">
						<?php echo $_SESSION['user']['name']; ?>
					</strong>
					
					<a class="btn btn-danger" href="index.php?logout='1'" style="padding: 1px 12%;">Logout</a>
                       &nbsp; 
				</div>
				<?php endif ?>
				</div>
			</div>
		</div>
		
			<div class="actions">
				<ul>
					<li class="active" id="dash"><i class="fa fa-dashboard" style="font-size:23px;color:black"></i><a href="dashboard.php">Dashboard</a></li>					
					<li id="projects">
						<i class="fa fa-shopping-bag" style="font-size:20px;color:black;"></i>
						<a href="myprojects.php">My Projects</a>
					</li>
					<li id="myprofile">
						<i class='fa fa-user' style='font-size:23px;color:black'></i>
						<a href="profile.php">My Profile</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
