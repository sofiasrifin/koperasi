<?php
include'../include/db.php'; 
$jawaban=$_POST['jawaban'];	

$fileName = $_FILES['picture']['name'];
$fileSize = $_FILES['picture']['size'];
$fileError = $_FILES['picture']['error'];
if($fileSize > 0 || $fileError == 0){
$move = move_uploaded_file($_FILES['picture']['tmp_name'], 'foto_poll/'.$fileName);
if($move){
$insert=mysql_query("UPDATE poll SET foto='foto_poll/$fileName' WHERE jawaban='$jawaban'");
echo "Gambar berhalil diupload";
}else{
echo "Gagal mengupload gambar";
}
}else{
echo "Gagal mengupload gambar: ".$fileError;
}
?>