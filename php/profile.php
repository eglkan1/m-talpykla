<?php

session_start();
$name="";
$surname="";
$username = "";
$password_new = "";
$password_old = "";
$email = "";
$school = "";

$errors = array();

$db = mysqli_connect('localhost','root','','mtalpykla') or die("cannot connect to database");
session_start();
$username=$_SESSION['username'];
$query=mysqli_query($db,"SELECT * FROM teachers where username='$username'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
//Register users

$name = mysqli_real_escape_string($db, $_POST['name']);
$surname = mysqli_real_escape_string($db, $_POST['surname']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$school = mysqli_real_escape_string($db, $_POST['school']);

//form validation
if(empty($name)) array_push($errors, "Name is required");
if(empty($surname)) array_push($errors, "Surname is required");
if(empty($username)) array_push($errors, "Username is required");
if(empty($password)) array_push($errors, "Password is required");
if(empty($email)) array_push($errors, "Email is required");
if(empty($school)) array_push($errors, "School is required");

//check DB for existing user with same username

$user_check_query = "SELECT * FROM user WHERE username = '$username' or password = '$password' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user)
{
	if($user['username'] === $username){
		array_push($errors, "Username already exists");
	}
}

if ($user)
{
	if($user['email'] === $email){
		array_push($errors, "Email already exists");
	}
}


if(count($errors) == 0){
	$password_checking = md5($password);
	$query = "INSERT INTO teachers (name,surname,username,password,email,school) VALUES ('$name','$surname','$username',
	'$password','$email', '$school')";
	mysqli_query($db,$query);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "You are already logged in";

	header('location: index.html');
}

?>