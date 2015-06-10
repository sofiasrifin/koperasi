<html>
<head>
<?
include'../include/db.php';
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
<body onLoad="JavaScript:timedRefresh(<?=$tket[autorefresh];?>);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="82%" height="100%"><?
open_flash_chart_object( '100%', '600px', "data_poll.php?id_poll=$id_poll" );
?></td>
    <td width="2%">&nbsp;</td>
    <td width="13%"><table width="100%" class='adminlist'>

<?
$warnaGenap = "#E0E0E0";   // warna abu-abu
$warnaGanjil = "#F5F5F5";  // warna putih
$counter = 1;
$foto=mysql_query("select jawaban,foto,jumlah from poll where id_poll='$id_poll'");
while($tfoto=mysql_fetch_array($foto))
{
if ($counter % 2 == 0) $warna = $warnaGenap;
else $warna = $warnaGanjil;
?>
  <tr bgcolor='<?=$warna;?>' class='baca1'>
    <td width="41%"><? echo"<img src='$tfoto[foto]' width='52px' height='60'>"; ?></td>
    <td width="59%" align="center" bgcolor="<?=$warna;?>"><? echo"$tfoto[jawaban]<br><strong>$tfoto[jumlah]</strong>"; ?></td>
  </tr>
<?
$counter++;
}
?>	</table></td>
    <td width="3%">&nbsp;</td>
  </tr>
</table>
<a href="graphic_poll_new.php?id_poll=<?=$id_poll;?>" target="_blank"></a>
</body>


</html>

