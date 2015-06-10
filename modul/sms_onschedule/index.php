<html>
 <head>
 <script type="text/javascript">
$(function() {
	$("#theTable tr:even").addClass("stripe1");
	$("#theTable tr:odd").addClass("stripe2");

	$("#theTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
function deleteRow(ID) {
		var id	= ID;
	   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
		if (pilih==true) {
			$.ajax({
				type	: "POST",
				url		: "modul/sms_onschedule/hapus.php",
				data	: "id="+id,
				success	: function(data){
					$("#tampil_data").load("modul/sms_onschedule/index.php");
				}
			});
		}
	}
</script>
   <script type="text/javascript" src="ajax.js"></script>
 </head>
 <body onLoad="ajax('run.php')">
 <div><h2>SMS Terjadwal</h2></div>

 <input type="button" align="left" value="Tambah Sms Terjadwal" onClick="window.location.href='?module=tambah_onschedule'">
 <br>
  <br>
  <?php
	$query = mysql_query("SELECT * FROM sms_message order by id") or die(mysql_error());
echo "<table id='theTable' width='80%'>
 	<tr>
    	<td>No</td>
        <td>Isi Pesan</td>
        <td>Group</td>
        <td>Waktu Kirim</td>
        <td>Atur</td>
    </tr>";
	while($data = mysql_fetch_array($query)){
	$no++;
	$idgroup = $data['idgroup'];
	if ($idgroup>0)
	{
	$query2 = " SELECT * FROM sms_group WHERE idgroup = '$idgroup'";
	$hasil = mysql_query($query2) or die(mysql_error());
	$data2 = mysql_fetch_array($hasil);
	$namagroup = $data2['group'];
	}
echo"<tr>
    	<td>".$no."</td>
        <td>".$data['message']."</td>
        <td>".$namagroup."</td>
        <td>".$data['pubdate']."</td>
        <td><a href=?module=edit_onschedule&id=$data[id]><img src='images/edit.png'></a> 
		 	 <a href='javascript:deleteRow(\"{$data[id]}\")'><img src='images/no.png'>
        </td>
         

 
    </tr>";
  }
echo "</table>";
?>
 </body>  
</html>