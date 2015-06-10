<html>
<head>
<?php
include'../include/db.php';
$id_poll=$_GET['id_poll'];
include 'ofc-library/open_flash_chart_object.php';

$ket=mysql_query("SELECT autorefresh FROM ket_poll where id_poll='$id_poll'");
$tket=mysql_fetch_array($ket);
?>
<script type="text/JavaScript">
<!--
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
//   -->
</script>
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">

</head>
<body onLoad="JavaScript:timedRefresh(<?php echo $tket['autorefresh'];?>);">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="43%"><?php
open_flash_chart_object( 550, 400, "data_poll.php?id_poll=$id_poll" );
?></td>
    <td width="57%"><table width="100%" class='adminlist'>

<?php
$warnaGenap = "#E0E0E0";   // warna abu-abu
$warnaGanjil = "#F5F5F5";  // warna putih
$counter = 1;
$foto=mysql_query("select jawaban,foto,jumlah from poll where id_poll='$id_poll'");
while($tfoto=mysql_fetch_array($foto))
{
if ($counter % 2 == 0) $warna = $warnaGenap;
else $warna = $warnaGanjil;
?>
  <tr bgcolor='<?php echo $warna;?>' class='baca1'>
    <td width="41%"><?php echo"<img src='$tfoto[foto]' width='32px' height='40'>"; ?></td>
    <td width="59%" align="center" bgcolor="<?php echo $warna;?>"><?php echo"$tfoto[jawaban]<br><strong>$tfoto[jumlah]</strong>"; ?></td>
  </tr>
<?php
$counter++;
}
?>	</table>
</td>
  </tr>
</table>
<a href="graphic_poll_new.php?id_poll=<?php echo $id_poll;?>" target="_blank">Buka di windows baru</a>
</body>


</html>

