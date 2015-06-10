<strong class="Win7">pesan masuk<br></strong>
<?php
include'../include/conf.php'; 
include'../include/db.php'; 
$inbox=mysql_query("select * from inbox");
$juminbox=mysql_num_rows($inbox);
$hpunread=mysql_query("select * from inbox where status='unread'");
$jumunread=mysql_num_rows($hpunread);

$ok=mysql_query("select * from sentitems where status='SendingOKNoReport'");
$jumok=mysql_num_rows($ok);
$notok=mysql_query("select * from sentitems where status='SendingError'");
$jumnotok=mysql_num_rows($notok);



echo"$juminbox pesan ($jumunread pesan baru)";
?>
<br>
<strong class="Win7">pesan keluar<br>
</strong>
<?php
echo"$jumok berhasil dikirim ($jumnotok gagal dikirim)";
?>