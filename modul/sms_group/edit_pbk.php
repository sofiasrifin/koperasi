<?php
	include "inc.koneksi.php";
$id = str_replace(" ","+", $_GET['id']);
    $query = "SELECT * FROM sms_phonebook WHERE noTelp = '$id'";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
?>

<p>&nbsp;</p>
<h3>Edit Phonebook</h3>
<p>&nbsp;</p>
<form name="formku" method="post" action="?module=target_edit_pbk">
<table border="0">
	<tr>
    	<td><font face=tahoma size=2>Nama</font></td>
        <td><font face=tahoma size=2>:</font></td>
        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" size="50"></td>
    </tr> 
	<tr>
    	<td><font face=tahoma size=2>Alamat</font></td>
        <td><font face=tahoma size=2>:</font></td>
        <td><input type="text" name="alamat" value="<?php echo $data['alamat'];?>" size="50"></td>
    </tr> 
	<tr>
        <td><font face=tahoma size=2>No. Telp</font></td>
        <td><font face=tahoma size=2>:</font></td>
        <td><input type="text" name="notelp" value="<?php echo $data['noTelp']?>"></td>
    </tr> 

<tr valign='top'><td><font face=tahoma size=2>Group</font></td><td>:</td> 
<td>
<?php	
	//include "inc.koneksi.php";
   $splittgl = explode('-', $data['datebirth']);
   if (count($splittgl) == 3) $tgllhr = $splittgl[2]."-".$splittgl[1]."-".$splittgl[0]; 
   else $tgllhr = "00-00-0000";

 $group = explode('|', $data['idgroup']);

$query2 = "SELECT * FROM sms_group";
$hasil2 = mysql_query($query2);
while ($data2 = mysql_fetch_array($hasil2))
{
   if (in_array($data2['idgroup'], $group)) echo "<input type='checkbox' name='group[]' value='".$data2['idgroup']."' checked> ".$data2['group']."<br>";
   else echo "<input type='checkbox' name='group[]' value='".$data2['idgroup']."'> ".$data2['group']."<br>";
}
?>
</td></tr>
<tr valign="top"><td><font face=tahoma size=2>Tgl Lahir</font></td><td>:</td><td><input type="text" name="tgllhr" size="20" value="<?php echo $tgllhr; ?>"><br><font face=tahoma size=2>Format: DD-MM-YYYYY, Contoh: 01-12-1980</font></td></tr>
</table>
</table>
<br />
<input type="submit" name="submit" value="Simpan Phonebook" class='tombolku'>
<input type="hidden" name="notelplama" value="<?php echo $data['noTelp'];?>">
<input type="hidden" name="grouplama" value="<?php echo $data['idgroup'];?>">
</form>

</body>
</html>