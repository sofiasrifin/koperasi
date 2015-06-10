<?
include"../conf/db.php"; 
$kode3 = $_GET['kode3'];
  $query=mysql_query("SELECT id_buku,judul,pengarang FROM buku WHERE id_buku='$kode3'");
  $a=mysql_fetch_array($query);
  $b=mysql_num_rows($query);
  if ($b<>0)
  {
?>
<link href="../css.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="warkecil">
  <tr>
    <td height="52"><b><?=$a[judul];?></b><br>
    Pengarang <b><?=$a[pengarang];?></b></td>
  </tr>
</table>
<?
   }
   else
   {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="warkecil">
  <tr>
    <td height="60">Maaf kode buku <b><?=$kode3;?></b> belum ada dalam database kami silahkan hubungi petugas.</td>
  </tr>
</table>
<?
   }
?>