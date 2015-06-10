<?
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 

include'cek_session.php'; 
$command1 = mysql_query("DELETE FROM filter_autorespond where id='$key'"); 
// Masukkan data pelanggan ke tabel pelanggan//
$insert=mysql_query("UPDATE autorespond SET kata_kunci='$kata_kunci',balasan='$balasan',aktif='$RadioGroup1',filter='$RadioGroup3' WHERE id='$no'");

	if ($RadioGroup3==3)
	{

	$pjg_array=count($p_num);
		for ($k=0;$k<$pjg_array;$k++)
		{
		$query1 = mysql_query("INSERT INTO filter_autorespond (id, isi_group, isi_hp) VALUES ('$kata_kunci', '$p_num[$k]', '')");
		}
	}
	
	if ($RadioGroup3==4)
	{

	$pjg_array=count($p_num);
		for ($k=0;$k<$pjg_array;$k++)
		{
		$query1 = mysql_query("INSERT INTO filter_autorespond (id, isi_group, isi_hp) VALUES ('$kata_kunci', '', '$p_num[$k]')");
		}
	}
	
header("Location:seting_autorespond.php");
?>