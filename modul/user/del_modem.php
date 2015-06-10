<?
include'../include/db.php'; 
include'../include/conf.php'; 
$cek=mysql_query("select * from modem");
$tcek=mysql_fetch_array($cek);
$no=$tcek[Id]+1;

passthru("gammu-smsd -n phone$no -k", $hasil);
passthru("gammu-smsd -n phone$no -u", $hasil);


?>