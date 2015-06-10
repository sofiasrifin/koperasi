<?
include"../include/db.php"; 
$kode = $_GET['kode'];
  $query=mysql_query("SELECT * FROM admin WHERE id='$kode' AND aktif='1'");
  $a=mysql_fetch_array($query);
  $b=mysql_num_rows($query);
  if ($b<>0)
  {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td width="22%"><img src="../<?=$a[foto];?>" align="left" width="64px" height="80px" hspace="6"><a class="textkcl"><b>Nama :</b><br><?=$a[nama];?><br><b>Alamat :</b><br><?=$a[alamat];?>, <i><?=$a[telp];?></i></td></tr>
</table>
<?
   }
   else
   {
?>

<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center"><br><a class="textkcl">Maaf ID <b><?=$kode;?></b> belum terdaftar Silahkan mendaftar terlebih dahulu</a></table>
<?
   }
?>