<?php

$name= $_POST['name'];
$surname= $_POST['surname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$school = $_POST['school'];

//Database connection

$conn = new mysqli('localhost', 'root', '', 'mtalpykla');
if ($conn->connect_error){
	die ('Connection Failed : '. $conn->connect_error);
} else{
	$stmt = $conn->prepare("insert into teachers(name,surname,username,password,email,school) 
		values (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssss", $name, $surname, $username, $password, $email, $school);
	$execval = $stmt->execute();
	echo $execval;
	echo "registration successfully...";
	$_SESSION['username'] = $username;
	header("Location: account.php");
	$stmt->close();
	$conn->close();
}

?>