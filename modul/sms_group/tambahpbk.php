
</style>
<div class="font">
<h3>Tambah Phonebook</h3>
<p>&nbsp;</p>
<form name="formku" method="post" action="<?php $_SERVER['PHP_SELF'];?>?module=target_pbk">

<table border="0">
	<tr>
        <td><font size="2" face="tahoma">Nama</font></td>
        <td>:</td>
        <td><input type="text" name="nama" size="50"></td>
    </tr> 
	<tr>
        <td><font size="2" face="tahoma">Alamat</font></td>
        <td>:</td>
        <td><input type="text" name="alamat" size="50"></td>
    </tr> 
	<tr>
        <td><font size="2" face="tahoma">No. Telp</font></td>
        <td>:</td>
        <td><input type="text" name="notelp" value="+62"></td>
    </tr> 
<tr valign="top"><td><font size="2" face="tahoma">Group</font></td><td>:</td><td>  
<?php
$query = "SELECT * FROM sms_group";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
  echo "<input type='checkbox' name='group[]' value='".$data['idgroup']."'> ".$data['group']."<br>";
}
?>
</td></tr>
<tr valign="top">
	<td><font size="2" face="tahoma">Tgl Lahir</font></td>
    <td>:</td>
    <td><input type="text" name="tgllhr" size="20"><br><font size="2" face="tahoma">Format: DD-MM-YYYYY, Contoh: 01-12-1980</font></td>
    </tr>
</table>
<!--
<br><br><font size="2" face="tahoma">
Kirim SMS konfirmasi?</font>
<input type="radio" name="confirm" value="1"> Ya <input type="radio" name="confirm" value="0" checked> Tidak
<br>
-->
<br>
<input type="submit" name="submit" value="Simpan Phonebook" class='tombolku'>
<input type="button" value="Kembali" onclick="window.location.href='?module=daftarphonebook'"/>
</form>
<?php
if ($_GET['module'] == "target_pbk")
{
	echo "<p>&nbsp;</p>";
// proses penyimpanan data phonebook yang baru
   $nama = $_POST['nama'];
   $alamat = $_POST['alamat'];
   $tgllhr = $_POST['tgllhr'];
   
   $splittgl = explode('-', $tgllhr);
   $tgllhr = $splittgl[2]."-".$splittgl[1]."-".$splittgl[0]; 
   
   $group = $_POST['group'];
   
   if (!empty($group))
   {
   foreach($group as $namagroup)
   {
      $listgroup .= $namagroup.'|';
   }
   $listgroup = '|'.$listgroup;
   }
   else $listgroup = '';
   
   $notelp = $_POST['notelp'];
   
   if (substr($notelp, 0, 1) == '0')
   {
	$notelp[0] = "X";
	$notelp = str_replace("X", "+62", $notelp);
   }
   else $notelp = $notelp;
   
   //$confirm = $_POST['confirm'];
   $now = date("Y-m-d");
   
   $query = "INSERT INTO sms_phonebook VALUES ('$notelp', '$nama', '$alamat', '$listgroup', '$now', '$tgllhr')";
   $hasil = mysql_query($query);
   if ($hasil) echo "<p><h2>Data sudah disimpan</h2></p>";
   else echo "<p><h2>Data gagal disimpan</h2></p>";
   
   $query = "SELECT id FROM sms_autoresponder WHERE idgroup = '$group'";
   $hasil = mysql_query($query);
   while ($data = mysql_fetch_array($hasil))
   {
      $idpesan = $data['id'];
      $query2 = "INSERT INTO sms_autolist VALUES ('$notelp', '$idpesan', '0')";
      mysql_query($query2);
   }
}
?>
</div>
</body>
</html>