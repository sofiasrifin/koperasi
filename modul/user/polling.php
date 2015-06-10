<?php
session_start();
include'../include/db.php'; 
include'../include/conf.php'; 
include'cek_session.php'; 
include'ses_cekhead.php';

$nama="Polling";
$inbox1=mysql_query("SELECT * FROM inbox where autorespond='0'");
while($t_inbox1=mysql_fetch_array($inbox1))
{

$pieces1 = explode(" ", $t_inbox1[TextDecoded]);
$kunci=mysql_query("SELECT * FROM addin_autorespond where nama='$nama'");
$t_kunci=mysql_fetch_array($kunci);


$str = strtolower($pieces1[0]);
$str1 = strtolower($t_kunci[keyword]);
$str2 = strtolower($pieces1[1]);
$str3 = strtolower($pieces1[2]);

if($str==$str1)
{
$info=mysql_query("SELECT * FROM poll where id_poll='$str2' and jawaban='$str3'");
$jum_info=mysql_num_rows($info);
$t_info=mysql_fetch_array($info);
$stringAkhir=$t_info[ket];
	if($jum_info>0)
	{
	$hp=substr($t_inbox1[SenderNumber], 3);
	$poll=mysql_query("SELECT * FROM inbox_poll where id_poll='$str2' and no_hp='$hp'");
	$jpoll=mysql_num_rows($poll);
		if($jpoll==1)
		{
		$isi="Jawaban polling anda telah dirubah menjadi jawaban $str3.";
		$text="$headauto$isi$footauto";
		$up=mysql_query("UPDATE inbox_poll SET jawab='$str3' WHERE id_poll='$str2' and no_hp='$hp'");
		$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
		('0$hp', '$text', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
		}
		if($jpoll==0)
		{
		$isi="Jawaban polling anda telah dimasukkan. Anda dapat mengganti jawaban anda dengan mengikuti poling dengan menggunakan no HP yang sama.";
		$text="$headauto$isi$footauto";
		$ins=mysql_query("INSERT INTO inbox_poll SET id_poll='$str2',jawab='$str3',no_hp='$hp'");
		$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
		('0$hp', '$text', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
		}
	$sql1 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
	}

	if($jum_info==0)
	{
	$isi="Maaf Id polling atau jawaban tidak ada di database kami.";
	$text="$headauto$isi$footauto";

	$hp=substr($t_inbox1[SenderNumber], 3);
	$query1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
	('0$hp', '$text', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
	}
	$sql1 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
}

}

?>