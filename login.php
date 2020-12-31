<?php

session_start();

$conn = new mysqli('localhost', 'root', '', 'mtalpykla');

$username = $_POST['username'];
$password = $_POST['password'];

$s = "select * from teachers where username='$username' && password='$password'";

$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);

if ($num == 1){
	$_SESSION['username'] = $username;
	header("Location: account.php");
} else{
	echo "Neteisingas slaptazodis arba prisijungimo vardas!";
}

?>