<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  include"../include/db.php"; 

$kode = $_GET['kode'];
  $query=mysql_query("SELECT * FROM user WHERE user_id='$kode'");
  $a=mysql_fetch_array($query);
  $b=mysql_num_rows($query);
  if ($b<>0)
  {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="22%"><img src="user/<?php echo"$a[foto]";?>" width="108px" height="134px" hspace="7" border="3"></td>
<td width="77%"><a class="nama"><strong>Nama :<br /></strong><?php echo"$a[nama]";?><br><b>Alamat :</b><br />
<?php echo"$a[alamat]";?>
<br />
<b>E-Mail :</b><br />
<?php echo"$a[email]";?>
</a></td>
</tr>
</table>
<?php
}
else
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="22%"><img src="images/wrong.jpg"  hspace="7" border="3" align="left"></td>
<td width="77%"><a class="nama">Maaf, user <b><?php echo"$kode";?></b> belum terdaftar Silahkan menghubungi Administrator untuk mendapatkan user id dan password.</a></td>
</tr>
</table>
<?php
   }
?>