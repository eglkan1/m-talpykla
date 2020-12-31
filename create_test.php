<?php

session_start(); 

$title = '';

$conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die (mysqli_error($conn));
$username =$_SESSION['username'];

$userid_res = $conn->query("SELECT id from teachers WHERE username='$username'") or die ($conn->error);
$userid = $userid_res->fetch_array();

$testid_res = $conn->query("SELECT id from tests") or die ($conn->error);
$testid = $testid_res->fetch_array();



if (isset($_POST['start'])){
	$title = $_POST['title'];

	$conn->query("INSERT INTO tests (title, fk_TEACHERid) VALUES('$title', '$userid[0]')") or die($conn->error);

	$_SESSION['message'] = "Testas sėkmingai sukurtas!";
	$_SESSION['msg_type'] = "success";

	header("location: my_tests.php");
}

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	print_r($id);
	$conn->query("DELETE FROM tests WHERE id='$id'") or die($conn->error);

	$_SESSION['message'] = "Testas buvo ištrintas!";
	$_SESSION['msg_type'] = "danger";

	header("location: my_tests.php");
}

if (isset($_POST['addRadioQuestion'])){
	$radio_question_text = $_POST['radio_question_text'];
	$id = $_POST['id'];
	$testid = $_POST['testid'];
	$correct_answer = $_POST['correct_answer'];
	
	$choice = array();
	$choice[1] = $_POST['answer1'];
    $choice[2] = $_POST['answer2'];
	$choice[3] = $_POST['answer3'];
	$choice[4] = $_POST['answer4'];
	$choice[5] = $_POST['answer5'];

	$result=$conn->query("INSERT INTO questions (question, question_number, fk_TESTid) 
	VALUES('$radio_question_text', '$id' , '$testid')") or die($conn->error);


	if($result){
		echo 'LABA DIENA2';
		foreach($choice as $option => $value){
			if($value != ""){
				if ($correct_answer == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}

				$insert_row=$conn->query("INSERT INTO answers (answer, is_correct, fk_QUESTIONid) 
				VALUES('$value','$is_correct','$id')") or die($conn->error);

				if($insert_row){
					continue;
				}else{
					die("Nepavyko");
				}
 
			}
		}
		$_SESSION['message'] = "Klausimas sėkmingai pridėtas! Galite pridėti dar vieną klausimą";
		$_SESSION['msg_type'] = "success";
		header("location: question.php?add_question=$testid");
	}
}

?>
