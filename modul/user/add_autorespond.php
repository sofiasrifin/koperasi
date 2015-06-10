<?
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
include'cek_session.php'; 

$bil=mysql_query("select kata_kunci from autorespond where kata_kunci='$kata_kunci'");
$jum=mysql_num_rows($bil);

if ($jum==0)
{
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO autorespond SET id='',kata_kunci='$kata_kunci',balasan='$balasan',aktif='$RadioGroup1',filter='$RadioGroup3'";
$query = mysql_query($sql) ;
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
	
	if ($RadioGroup3==5)
	{

	$pjg_array=count($p_num);
		for ($k=0;$k<$pjg_array;$k++)
		{
		$query1 = mysql_query("INSERT INTO filter_autorespond (id, isi_group, isi_hp) VALUES ('$kata_kunci', '', '$p_num[$k]')");
		}
	}
header("Location:seting_autorespond.php");
}

if ($jum<>0)
{
header("Location:seting_autorespond.php?id=sama");
}
?>