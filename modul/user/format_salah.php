<?php
// database //
include'../include/db.php'; 
include'../include/conf.php'; 
$inbox1=mysql_query("SELECT * FROM inbox where autorespond='0'");
while($t_inbox1=mysql_fetch_array($inbox1))
{
$pieces1 = explode(" ", $t_inbox1[TextDecoded]);
$key=$pieces1[0];
$kunci=mysql_query("SELECT * FROM addin_autorespond where keyword='$key' and aktif='1'");
$j_addin=mysql_num_rows($kunci);
$t_kunci=mysql_fetch_array($kunci);
if ($j_addin==0)
{
$auto=mysql_query("SELECT * FROM autorespond where kunci='$pieces1[0]' and aktif='1'");
$j_auto=mysql_num_rows($auto);
if($j_auto==0)
	{
		$salah=mysql_query("SELECT * FROM format_salah");
		$t_salah=mysql_fetch_array($salah);
		$kirim1 = mysql_query("INSERT INTO outbox (DestinationNumber, TextDecoded, ID, MultiPart, SenderID, CreatorID) VALUES 
		('$t_inbox1[SenderNumber]', '$t_salah[isi_sms]', '$newID', 'true', '$t_inbox1[RecipientID]', 'Gammu')");
		$kirim2 = mysql_query("UPDATE inbox SET autorespond='1' where Id='$t_inbox1[ID]'");
	}
}


}


?>