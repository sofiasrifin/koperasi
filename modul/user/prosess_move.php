<?php
session_start();
$select=$_POST['select'];
$chk=$_POST['chk'];
include'../include/db.php'; 
include'../include/conf.php'; 
for($o=1; $o<=120; $o++)
{ 

$sms=mysql_query("SELECT * FROM inbox where ID='$chk[$o]'");
$t_sms=mysql_fetch_array($sms);
$grup=mysql_query("SELECT * FROM grup_sms where nama='$select'");
$t_grup=mysql_fetch_array($grup);
$j_grup=$t_grup[jumlah]+1;
$hp=substr($t_sms[SenderNumber], 3);
if($chk[$o]<>'')
{
$command = mysql_query("DELETE FROM inbox where ID='$chk[$o]'"); 
$insert=mysql_query("UPDATE grup_sms SET jumlah='$j_grup' WHERE nama='$select'");
$sql = "INSERT INTO inbox_grup_sms SET id='',id_grup='$select',no_hp='$hp',isi='$t_sms[TextDecoded]',tgl='$t_sms[ReceivingDateTime]',SenderID='$t_sms[RecipientID]'";
$query = mysql_query($sql) ;
}
if($chk[$o]=='')
{
}
}

header("Location:include_inbox.php?id=kotak_masuk"); 

?>