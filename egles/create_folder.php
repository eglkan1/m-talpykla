<?php
session_start(); 

$id = 0;
$update = false;
$folder = false;
$title = '';


$conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die (mysqli_error($conn));
$username =$_SESSION['username'];
$userid_res = $conn->query("SELECT id from teachers WHERE username='$username'") or die ($conn->error);
$userid = $userid_res->fetch_array();

if (isset($_POST['create'])){
	$title = $_POST['title'];

	$conn->query("INSERT INTO folders (title, fk_TEACHERid) VALUES('$title', '$userid[0]')") or die($conn->error);

	$_SESSION['message'] = "Katalogas sėkmingai sukurtas!";
	$_SESSION['msg_type'] = "success";

	header("location: account.php");

}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	print_r($id);
	$conn->query("DELETE FROM folders WHERE id='$id'") or die($conn->error);

	$_SESSION['message'] = "Katalogas buvo ištrintas!";
	$_SESSION['msg_type'] = "danger";

	header("location: account.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $conn->query("SELECT * FROM folders WHERE id=$id") or die ($conn->error);
	if($result->num_rows){
 	$row = $result->fetch_array();
	$title = $row['title'];
	}
}

if (isset ($_POST['update'])){
	$id = $_POST['id'];
	$title = $_POST['title'];

	$conn->query("UPDATE folders SET title='$title' WHERE id=$id") or die ($conn->error);

	$_SESSION['message'] = "Pavadinimas buvo atnaujintas!";
	$_SESSION['msg_type'] = "warning";

	header("location: account.php");

}

if (isset($_GET['folder'])){
	$id = $_GET['folder'];
	
	$result = $conn->query("SELECT * FROM folders WHERE id=$id") or die ($conn->error);
	if($result->num_rows){
		$row = $result->fetch_array();
		$title = $row['title'];
	}
}


?>