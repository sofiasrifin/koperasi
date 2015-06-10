<?php
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
include'cek_session.php'; 
include'ses_cekhead.php';

$nama="Nilai Siswa";
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

$nilai=mysql_query("SELECT * FROM nilai_siswa where nis='$pieces1[1]'");
$jum_nilai=mysql_num_rows($nilai);
$t_nilai=mysql_fetch_array($nilai);
	if($jum_nilai>0)
	{
	$text="Hasil nilai siswa dengan nis $pieces1[1], Big: $t_nilai[big], Bin: $t_nilai[bin], Mat: $t_nilai[mat], Ipa: $t_nilai[ipa]";
	$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
	('$t_inbox1[SenderNumber]', '$headauto$text$footauto', '$newID', 'true', '$t_inbox1[RecipientID]','Gammu')");
$sql1 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
	}
	if($jum_nilai==0)
	{
	$text1="Hasil nilai siswa dengan nis $pieces1[1] tidak ada silahkan di cek nis tersebut";
	$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
	('$t_inbox1[SenderNumber]', '$headauto$text1$footauto', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
	$sql1 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
	}
}

}

?>