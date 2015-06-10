<?
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
include'cek_session.php'; 


$bil=mysql_query("select id from autoreply order by id desc");
$no=mysql_fetch_array($bil);
$jum=mysql_num_rows($bil);

if ($jum==0)
{
$id=1;
// Masukkan data pelanggan ke tabel pelanggan//
$sql = "INSERT INTO autoreply SET id='$id',balasan='$balasan',aktif='$RadioGroup1'";
$query = mysql_query($sql) ;

	$pjg_array=count($p_num);
		for ($k=0;$k<$pjg_array;$k++)
		{
		$query1 = mysql_query("INSERT INTO filter_autoreply (id, no_hp) VALUES ('$id', '$p_num[$k]')");
		}
	
header("Location:seting_autoreply.php");
}

if ($jum<>0)
{
$id=$no[id]+1;
$sql = "INSERT INTO autoreply SET id='$id',balasan='$balasan',aktif='$RadioGroup1'";
$query = mysql_query($sql) ;

	$pjg_array=count($p_num);
		for ($k=0;$k<$pjg_array;$k++)
		{
		$query1 = mysql_query("INSERT INTO filter_autoreply (id, no_hp) VALUES ('$id', '$p_num[$k]')");
		}
	
header("Location:seting_autoreply.php");
}
?>