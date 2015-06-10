<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 

$hpunread=mysql_query("select * from inbox where status='unread'");
$jumunread=mysql_num_rows($hpunread);
echo"($jumunread)";
?>