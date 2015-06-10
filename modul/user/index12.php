<?php
// database //
include'../include/db.php'; 
include'../include/conf.php'; 



// autorespond //
$inbox=mysql_query("SELECT * FROM inbox where autorespond='0'");
$jin=mysql_num_rows($inbox);
while($t_inbox=mysql_fetch_array($inbox))
{

$pieces = explode(" ", $t_inbox[TextDecoded]);
$kunci=strtolower($pieces[0]);
echo"$kunci";
$autorespond=mysql_query("SELECT * FROM autorespond where kunci='$kunci' and aktif='1'");
$t_autorespond=mysql_fetch_array($autorespond);
$j_auto=mysql_num_rows($autorespond);
if($j_auto==0)
{
}
if($j_auto<>0)
{
}
}
?>