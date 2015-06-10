<script src="js/datepicker/jquery.ui.datetimepicker.min.js" type="text/javascript"></script>
<link href="js/datepicker/jquery.ui.datetimepicker.css" rel="stylesheet" type="text/css" />
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
	
	$("#publish").datetimepicker({
		dateFormat : "dd/mm/yy HH:MM"
	});
	
</script>  
<h3>Tambah Message</h3>
<p>&nbsp;</p>
<form name="form1" method="post" action="?module=tambah_onschedule">

Message : <br>
<textarea name="isi_pesan" rows="12" cols="60" OnFocus="Count();" 
		OnClick="Count();" onKeydown="Count();" OnChange="Count();" 
		onKeyup="Count();"><?php echo $data['message']; ?></textarea>
<br>Panjang SMS : <input type="text" readonly name="counter" size="3" value="160" /><br><br>

<br><br>
<table>
<tr>
    <td>Pilih Group : </td>
    <td>
    <select name='group'>
    <option value="0" selected>All</option>
    <?php
    $query = "SELECT * FROM sms_group";
    $hasil = mysql_query($query);
    while ($data = mysql_fetch_array($hasil))
    {
      echo "<option value='".$data['idgroup']."'>".$data['group']."</option>";
    }
    ?>
    </select>
    </td>
</tr>
	<?php
	$query = mysql_query("SELECT * FROM sms_message order by id");
	$data = mysql_fetch_array($query);
	?>
<tr>
    <td>Published Date Time</td>
    <td><input type="text" name="pubdate" size="30" value="<?php //print $data['pubdate'];?>" id="publish"></td>
</tr>
</table><br>
<input type="submit" name="submit" value="Simpan Message" class='tombolku'>
<?php echo "<input type='button' value='Kembali' onClick=\"window.location.href='?module=sms_onschedule';\">"; ?>
</form>
<?php
	if(isset($_POST['submit'])){
	
   $phone = $_POST['phoneid'];
   $pesan = $_POST['isi_pesan'];
   $group = $_POST['group'];
   $pubdate = str_replace("/", "-", $_POST['pubdate']);
   $query = "INSERT INTO sms_message(message, pubdate, idgroup, sender) VALUES ('$pesan', '$pubdate', '$group', '$phone')";
   $hasil = mysql_query($query) or die(mysql_error());
   if ($hasil){
   echo "<p>Pesan sudah disimpan</p>";
	?>
    	<script language="javascript">
		 setTimeout('self.location.href="?module=sms_onschedule"',1000);
		</script>
    <?php
	}else{
	  echo "<p>Pesan Gagal disimpan</p>";
    ?>
    <script language="javascript">
		 setTimeout('self.location.href="?module=sms_onschedule"',500);
		</script>
 <?php
 }
 }
 ?>