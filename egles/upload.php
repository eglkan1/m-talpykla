<?php

session_start(); 

$conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die (mysqli_error($conn));

if (isset($_POST["upload"])){
    $id = $_POST["id"];
    $title = $_POST["title"];

    $pname = rand(1000, 10000)."-".$_FILES["fileToUpload"]["name"];
    $tname = $_FILES["fileToUpload"]["tmp_name"];
    $fileSize = $_FILES["fileToUpload"]["size"];
    $fileType = $_FILES["fileToUpload"]["type"];

    $fileExt = explode('.', $pname);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'docx');

    if(in_array($fileActualExt, $allowed)){
            if($fileSize < 1000000){

                $folderid_res = $conn->query("SELECT id from folders 
                WHERE id='$id'") or die ($conn->error);
                $folderid = $folderid_res->fetch_array();
            
                $uploads_dir = '../m-talpykla/images';
                move_uploaded_file($tname, $uploads_dir.'/'.$pname);
                
            
                $conn->query("INSERT INTO files(title,FILE,fk_FOLDERid) 
                VALUES('$title','$pname','$folderid[0]')") or die ($conn->error);
                
                $_SESSION['message'] = "Failas sėkmingai įkeltas!";
                $_SESSION['msg_type'] = "success";
                header("location: account.php");

            } else {
                $_SESSION['message'] = "Failas per didelis!";
                $_SESSION['msg_type'] = "warning";
                header("location: account.php");
            }

    } else {
        $_SESSION['message'] = "Netinkamas failo formatas!";
        $_SESSION['msg_type'] = "warning";
        header("location: account.php");
    }


}
?>