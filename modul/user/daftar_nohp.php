<?php
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
include'cek_session.php'; 
include'ses_cekhead.php';

$nama="Daftar No Hp";
$inbox1=mysql_query("SELECT * FROM inbox where autorespond='0'");
while($t_inbox1=mysql_fetch_array($inbox1))
{

$pieces1 = explode(" ", $t_inbox1[TextDecoded]);
$kunci=mysql_query("SELECT * FROM addin_autorespond where nama='$nama'");
$t_kunci=mysql_fetch_array($kunci);

$str = strtolower($pieces1[0]);
$str1 = strtolower($t_kunci[keyword]);

if($str==$str1)
{
$hp=substr($t_inbox1[SenderNumber], 3);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$hp");
$tampilkan=mysql_fetch_array($pel);
$jum_nilai=mysql_num_rows($pel);

$daftar_nohp=mysql_query("SELECT * FROM daftar_nohp");
$t_daftar_nohp=mysql_fetch_array($daftar_nohp);
	if($jum_nilai>0)
	{
	$nohp=$t_inbox1[SenderNumber];
	$nama=$tampilkan[nama];
	$ada=stripslashes($t_daftar_nohp['reg_ada']); 
	eval("\$ada= \"$ada\";");
	$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
	('$t_inbox1[SenderNumber]', '$headauto$ada$footauto', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
	$sql1 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
	}
	if($jum_nilai==0)
	{
	$nohp=$t_inbox1[SenderNumber];
	$nama="$pieces1[1] $pieces1[2]";
	$ok=stripslashes($t_daftar_nohp['reg_berhasil']); 
	eval("\$ok= \"$ok\";");
	$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
	('$t_inbox1[SenderNumber]', '$headauto$ok$footauto', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
	$sql1 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
	$query2=mysql_query("INSERT INTO data_pelanggan (nama, no_hp, alamat, grup) VALUES ('$pieces1[1] $pieces1[2]', '$hp', 'ok', '$t_daftar_nohp[grup]')");
	}
}

}

?>