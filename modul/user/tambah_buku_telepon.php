<?php
include'../include/conf.php'; 
include'../include/db.php';
$no_hp=$_GET['no_hp'];
?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>

<div style="padding: 5px">
  <p class="style1">Silahkan masukkan data pemilik no HP berikut </p>
  <form action="insert.php" method="post" name="ddmessage" target="_self" id="agecheck">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="style1">
      <tr>
        <td width="22%">No HP </td>
        <td width="2%">:</td>
        <td width="76%"><input name="no_hp" type="text" id="no_hp" value="<?php echo"0$no_hp";?>" size="30" onFocus="this.blur()"/></td>
      </tr>
      <tr>
        <td height="34">Grup</td>
        <td>:</td>
        <td><p class="MsoNormal">
          <select name="grup" class="bacas">
            <option>-- Silahkan Pilih Group --</option>
            <?php $sql=mysql_query("SELECT * from grup");
while ($a=mysql_fetch_array($sql))
{
?>
            <option> <?php echo"$a[nama]";
}
?></option>
          </select>
        </p>        </td>
      </tr>
      <tr>
        <td height="35">Nama</td>
        <td>:</td>
        <td><span class="MsoNormal">
          <input name="namapengguna" type="text" id="namapengguna" size="30" />
          <input name="id" type="hidden" id="id" value="tambah_pelanggan" />
        </span></td>
      </tr>
      <tr>
        <td height="35">Alamat</td>
        <td>:</td>
        <td><span class="MsoNormal">
          <input name="alamat" type="text" id="alamat" size="30" />
        </span></td>
      </tr>
      <tr>
        <td height="35">&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="  Tambah  " onClick="parent.agreewin.hide()" /></td>
      </tr>
    </table>
  </form>
</div>
