<?php
include'../include/db.php'; 

$inmax = mysql_query("select * from grafik order by id,inbox desc limit 15");
$oumax = mysql_query("select * from grafik order by id,outbox desc limit 15");

$jinmax=mysql_fetch_array($inmax);
$joutmax=mysql_fetch_array($oumax);

if($jinmax['inbox']>=$joutmax['outbox'])
{
$jmax=$jinmax['inbox'];
}
else
{
$jmax=$joutmax['outbox'];
}
echo"$jmax";

?> 