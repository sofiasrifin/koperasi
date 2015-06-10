<?
include'../include/db.php'; 
include'../include/conf.php'; 


// Masukkan data pelanggan ke tabel pelanggan//
echo"$group";

$sql = "INSERT INTO daftar_nohp SET Id='',group='$group'";
$query = mysql_query($sql) ;


?>