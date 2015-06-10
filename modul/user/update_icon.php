<?php
include'../include/db.php'; 

$id=$_POST['id'];	
$foto=$_POST['foto'];	

$fileName = $_FILES['picture']['name'];
$fileSize = $_FILES['picture']['size'];
$fileError = $_FILES['picture']['error'];
if($fileSize > 0 || $fileError == 0){
$move = move_uploaded_file($_FILES['picture']['tmp_name'], 'icon_modem/'.$fileName);
if($move){
$insert=mysql_query("UPDATE modem SET gambar='$fileName' WHERE Id='$id'");
echo "Gambar berhalil diupload";
}else{
echo "Gagal mengupload gambar";
}
}else{
echo "Gagal mengupload gambar: ".$fileError;
}




?>