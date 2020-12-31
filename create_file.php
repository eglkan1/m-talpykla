<?php
session_start(); 

$id = 0;
$update_file = false;
$folder = false;
$title = '';
$description = '';


$conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die (mysqli_error($conn));
$username =$_SESSION['username'];

//$query = "SELECT fk_FOLDERid, FILE from files WHERE id='$id'";
   // $results = mysqli_query($conn, $query);
    //$db_field = mysqli_fetch_assoc( $results);

//$results = $conn->query("SELECT fk_FOLDERid, FILE from files WHERE id='$id'") or die ($conn->error);
//$db_field = $results->fetch_assoc();

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$folder_id=$_GET['folder_id'];
	//$filepath = $folder_id['FILE'];
	//echo("DELETE FROM files WHERE id='$id' '$folder_id'");
	$conn->query("DELETE FROM files WHERE id='$id'") or die($conn->error);

	$_SESSION['message'] = "Failas buvo ištrintas!";
	$_SESSION['msg_type'] = "danger";

	//$file_pointer = '../m-talpykla/images';  
   
// Use unlink() function to delete a file  
/*if (!unlink($file_pointer)) {  
    echo ("$file_pointer cannot be deleted due to an error");  
}  
else {  
    echo ("$file_pointer has been deleted");  
}  
*/

	header("location: files.php?folder=$folder_id");
}
/*
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $conn->query("SELECT * FROM files WHERE id=$id") or die ($conn->error);
	if($result->num_rows){
 	$row = $result->fetch_array();
	$title = $row['title'];
	$description = $row['description'];
	$folder_id=$row['fk_FOLDERid'];
	}
}

if (isset ($_POST['update_file'])){
	$id = $_POST['id'];
	$title = $_POST['title'];

	$conn->query("UPDATE files SET title='$title', description='$description' WHERE id=$id") or die ($conn->error);

	$_SESSION['message'] = "Pavadinimas buvo atnaujintas!";
	$_SESSION['msg_type'] = "warning";

	header("location: files.php?folder=$folder_id");

}
*/
?>