<?php
include'../include/db.php'; 
$cekhead=mysql_query("SELECT * FROM header_footer where nama='header'");
$tcekhead=mysql_fetch_array($cekhead);
$nama1=mysql_query("SELECT nama FROM user where user_id='$nama'");
$tnama1=mysql_fetch_array($nama1);
$nama1="$tnama1[nama]";

$phrase1  = "$tcekhead[format_sms_biasa]";
$healthy1 = array('$name');
$yummy1   = array("$nama1");

$phrase2  = "$tcekhead[format_sms_auto]";
$healthy2 = array('$name');
$yummy2   = array("$nama1");

$newphrase1 = str_replace($healthy1, $yummy1, $phrase1);
$newphrase2 = str_replace($healthy2, $yummy2, $phrase2);



if($tcekhead[aktif]=='1')
{
	if($tcekhead[sms_biasa]=='1')
	{
	$headbiasa=$newphrase1;
	}
	if($tcekhead[autorespond]=='1')
	{
	$headauto=$newphrase2;
	}	
}

$cekfoot=mysql_query("SELECT * FROM header_footer where nama='footer'");
$tcekfoot=mysql_fetch_array($cekfoot);
$nama=mysql_query("SELECT nama FROM user where user_id='$nama'");
$tnama=mysql_fetch_array($nama);
$nama1="$tnama[nama]";

$phrase  = "$tcekfoot[format_sms_biasa]";
$healthy = array('$name');
$yummy   = array("$nama1");

$phrase3  = "$tcekfoot[format_sms_auto]";
$healthy3 = array('$name');
$yummy3   = array("$nama1");

$newphrase = str_replace($healthy, $yummy, $phrase);
$newphrase3 = str_replace($healthy3, $yummy3, $phrase3);

if($tcekfoot[aktif]=='1')
{
	if($tcekfoot[sms_biasa]=='1')
	{
	$footbiasa=$newphrase;
	}
	if($tcekfoot[autorespond]=='1')
	{
	$footauto=$newphrase3;
	}	
}



?>