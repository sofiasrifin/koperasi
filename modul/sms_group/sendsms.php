<script>
	function Count(){
		var karakter,maksimum;  
		maksimum = 160
		karakter = maksimum-(document.form1.isi_pesan.value.length);  
		if (karakter < 0) {
			alert("Jumlah Maksimum Karakter:  " + maksimum + "");  
			document.form1.isi_pesan.value = document.form1.isi_pesan.value.substring(0,maksimum);  
			karakter = maksimum-(document.form1.isi_pesan.value.length);  
			document.form1.counter.value = karakter;  
		} 
		else {
			document.form1.counter.value =  maksimum-(document.form1.isi_pesan.value.length);
		}
	}
</script> 

<form name="form1" method="post" action="?module=target_pesan_pbk">
<h3> Kirim Pesan Single </h3>
<?php
include "inc.koneksi.php";
  $ph = str_replace(" ", "+", $_GET['ph']);
  $query = "SELECT nama FROM sms_phonebook WHERE noTelp = '$ph'";
  $hasil = mysql_query($query);
  $data  = mysql_fetch_array($hasil);
  $nama = $data['nama'];
  //echo "<br><p><b>Nomor Tujuan :</b> ".$nama." (".$ph.")</p>";
?>
<table>
<tr>
	<td width="100"> <font face=tahoma size=2>Nama Tujuan </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><input name="nama" type="text" size="20" value='<?php echo $nama;?>' disabled> <input name="nama" type="hidden" size="20" value='<?php echo $nama;?>'></td>
</tr>
<tr>
	<td width="100"> <font face=tahoma size=2>Nomor Tujuan </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><input name="hp" type="text" size="20" value=<?php echo $ph;?> disabled> <input name="hp" type="hidden" size="20" value=<?php echo $ph;?>></td>
</tr>
<tr valign="top">
	<td><font face=tahoma size=2> Isi Pesan </font></td>
	<td><font face=tahoma size=2> : </font></td>
	<td>
		<textarea name="isi_pesan" cols="40" rows="7" OnFocus="Count();" 
		OnClick="Count();" onKeydown="Count();" OnChange="Count();" 
		onKeyup="Count();"></textarea> 
	</td>
</tr>
<tr>
	<td colspan="2"></td>
	<td><input name="counter" type="text" size="5" maxlength="5" value="160" /></td>
</tr>
<tr>
	<td><input type="submit" value="Kirim Pesan" /></td>
    <td>&nbsp;</td>
    <td><?php echo "<input type='button' value='Kembali' onClick=\"window.location.href='?module=daftarphonebook';\">"; ?></td>
</tr>
</table>
</form>


<?php
/*
include "inc.koneksi.php";
	$ph = str_replace(" ", "+", $_GET['ph']);
  $query = "SELECT nama FROM sms_phonebook WHERE noTelp = '$ph'";
  $hasil = mysql_query($query);
  $data  = mysql_fetch_array($hasil);
  $nama = $data['nama'];
  echo "<br><p><b>Nomor Tujuan :</b> ".$nama." (".$ph.")</p>";
 */
?>
<!--
<form name="form1" method="post" action="?module=sendsms">
<input type="hidden" name="phone" value="<?php //echo $ph; ?>">
<table width="34%" border="0">
	<tr>
   	  <td width="30%"><font size="2" face="tahoma">Message :</font></td>
        <td width="30%"></td>
        <td width="30%"></td>
    </tr>
	<tr>
  		<td colspan="3"><textarea name="isi_pesan" rows="12" cols="60" OnFocus="Count();" 
		OnClick="Count();" onKeydown="Count();" OnChange="Count();" 
		onKeyup="Count();"></textarea></td>
	</tr>
	<tr>
   	  <td><font size="2" face="tahoma">Panjang SMS : </font><input type="text" readonly name="counter" size="3" value="160" /></td>
	</tr>
</table>

<br><br>
<input type="submit" name="submit" value="Kirim SMS" class='tombolku'>
<?php //echo "<input type='button' value='Kembali' onClick=\"window.location.href='?module=daftarphonebook';\">"; ?>
</form>
-->
