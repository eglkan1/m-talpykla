<?php

session_start(); 

$conn = new mysqli('localhost', 'root', '', 'mtalpykla') or die (mysqli_error($conn));

if (isset($_GET['id'])){
    $id = $_GET['id'];
    
    $fileid_res = $conn->query("SELECT id from files WHERE id='$id'") or die ($conn->error);
    $fileid = $fileid_res->fetch_array();
    $file = '../m-talpykla/images/'.$fileid['title'];
    echo "labas";

    if(file_exists($file)){
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: filename=".basename($file).""); 
        readfile($file);
        exit();
    }
}

?>