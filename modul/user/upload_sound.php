<?php
session_start();
ini_set('upload_max_filesize','1000M');

include'../include/conf.php'; 
include'../include/db.php';
include'cek_session.php'; 
error_reporting(E_ALL);
ini_set("display_errors", 0); 
$file_name = basename( $_FILES['ufile']['name']);


$target_path = "sound_sms/";

$target_path = $target_path . basename( $_FILES['ufile']['name']); 

if(move_uploaded_file($_FILES['ufile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['ufile']['name']). 
    " has been uploaded";
$koreksi = mysql_query("INSERT INTO sound SET Id='',nama_file='$file_name'");
	
} else{
    echo "There was an error uploading the file, please try again!";
}
?>
