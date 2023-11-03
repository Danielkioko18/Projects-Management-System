<?php 
session_start();
ob_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'projects');

// variable declaration
$name = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name    	 =  e($_POST['name']);
	$regno       =  e($_POST['regno']);
	$email       =  e($_POST['email']);	
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1 || $password_2 )) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		//encrypt the password before saving in the database
		$password = md5($password_1);
		$sql="SELECT * FROM users WHERE email='$email'";
		$result=mysqli_query($db,$sql);
		$rows=mysqli_num_rows($result);

		$regsql="SELECT * FROM users WHERE reg_no='$regno'";
		$regresult=mysqli_query($db,$regsql);
		$row=mysqli_num_rows($regresult);
		if ($rows>0) {
			array_push($errors, "Sorry!! This Email already Exists Please Login!");
		}
		elseif($row>0){
			array_push($errors, "Sorry!! This Reg_no already Exists Please Login!");
		}
		elseif ($rows==0) {
				$query = "INSERT INTO users (name, reg_no, email, password) 
						  VALUES('$name', '$regno', '$email', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: login.php');
			}
		}

		
	}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// Login function for users and admins
function login(){
	global $db, $email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		// user found
		if (mysqli_num_rows($results) == 1) { 
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			$userid=$_SESSION['user'];

			$_SESSION['user'] = $logged_in_user;
			$_SESSION['success']  = "You are now logged in";
			header('location: dashboard.php');		  
		}else {
			array_push($errors, "Wrong Email or Password");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

?>
