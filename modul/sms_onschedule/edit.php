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
<?php
$id = $_GET['id'];
    $query = "SELECT * FROM sms_message WHERE id = $id";
	$hasil = mysql_query($query);//or die(mysql_error());
	$data = mysql_fetch_array($hasil);
	$data['pubdate'] = str_replace("-", "/", $data['pubdate']);
?>
<h3>Edit Message</h3>
<p>&nbsp;</p>
<form name="form1" method="post" action="?module=edit_onschedule">

Message : <br>
<textarea name="isi_pesan" rows="12" cols="60" OnFocus="Count();" 
		OnClick="Count();" onKeydown="Count();" OnChange="Count();" 
		onKeyup="Count();"><?php echo $data['message']; ?></textarea>
<br>Panjang SMS : <input type="text" readonly name="counter" size="3" value="160" /><br><br>

<br><br>
<table width="322">
<tr>
    <td>Pilih Group : </td>
    <td>
    <select name='group'>
    <?php
    if($data['idgroup']==0)
		echo "<option value='0' selected>All</option>";
	else
		echo "<option value='0'>All</option>";
    ?>
    <?php
	$query2 = mysql_query("SELECT * FROM sms_group");
	while ($data2 = mysql_fetch_array($query2))
	{
		if ($data2['idgroup']== $data['idgroup'])
			echo "<option value='".$data2['idgroup']."' selected>".$data2['group']."</option>";
		else
			echo "<option value='".$data2['idgroup']."'>".$data2['group']."</option>";
	}
	?>
    </select>
    </td>
</tr>
	
<tr>
    <td>Published Date Time</td>
    <td><input type="text" name="pubdate" size="30" value="<?php print $data['pubdate'];?>" id="publish"></td>
</tr>
</table>
<input type="hidden" name="id" value="<?php echo $data['id'];?>">
<br>
<input type="submit" name="submit" value="Update Message" class='tombolku'>
<?php echo "<input type='button' value='Kembali' onClick=\"window.location.href='?module=sms_onschedule';\">"; ?>
</form>
<?php
	if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$msg = $_POST['isi_pesan'];
	$group = $_POST['group'];
	$pubdate = str_replace("/", "-",$_POST['pubdate']);
	$phone = $_POST['phoneid'];
	
	$query = "UPDATE sms_message SET message = '$msg', pubdate = '$pubdate', idgroup = '$group', sender = '$phone' WHERE id = '$id'";
	$hasil = mysql_query($query);
	if ($hasil){
   echo "<p>Pesan sudah diupdate</p>";
	?>
    	<script language="javascript">
		 setTimeout('self.location.href="?module=sms_onschedule"',1000);
		</script>
    <?php
	}else{
	  echo "<p>Pesan Gagal diupdate</p>";
    ?>
    <script language="javascript">
		 setTimeout('self.location.href="?module=sms_onschedule"',500);
		</script>
 <?php
 }
 }
 ?>
