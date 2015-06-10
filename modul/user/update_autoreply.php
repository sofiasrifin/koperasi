<?
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 

include'cek_session.php'; 

$command1 = mysql_query("DELETE FROM filter_autoreply where id='$key'"); 
// Masukkan data pelanggan ke tabel pelanggan//
$insert=mysql_query("UPDATE autoreply SET balasan='$balasan',aktif='$RadioGroup1' WHERE id='$key'");

	$pjg_array=count($p_num);
		for ($k=0;$k<$pjg_array;$k++)
		{
		$query1 = mysql_query("INSERT INTO filter_autoreply (id, no_hp) VALUES ('$key', '$p_num[$k]')");
		}
header("Location:seting_autoreply.php");
?>