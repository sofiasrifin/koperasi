
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
function DataDetail(){
	var cari	= $("#kode").val();
	$.ajax({
		type	: "POST",
		url		: "modul/jurnal/tampil_data.php",
		data	: "cari="+cari,
		success	: function(data){
			$("#tampil_data_detail").html(data);
		}
	});
}

function deleteRow(ID) {
	var id	= ID;
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/jurnal/hapus_detail.php",
			data	: "id="+id,
			success	: function(data){
				//$("#tampil_data").load("modul/beli/tampil_data.php");
				$.messager.show({
					title:'Info',
					msg:data, //'Password Tidak Boleh Kosong.',
					timeout:2000,
					showType:'slide'
				});
				DataDetail();
			}
		});
	}
}
</script>
<?php
include '../../inc/inc.koneksi.php';

$cari	= $_POST['cari'];

$where	= " WHERE no_jurnal='$cari'";

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
		<!--	<th>Id Jurnall</th>	-->
			<th>Kode Akun</th>
			<th>Nama Akun</th>
			<th>Debet</th>
			<th>Kredit</th>
			<th width='5%'>Aksi</th>
		</tr>";
	$sql	= "SELECT idjurnal, no_jurnal, b.kode_akun, nama_akun, debet, kredit
				FROM d_jurnal AS a
				JOIN akun AS b
				 ON a.kode_akun = b.kode_akun
				$where ORDER BY idjurnal";
	$query	= mysql_query($sql) or die(mysql_error());
	
	$no=1;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
			<!--	<td align='center'>$rows[idjurnal]</td>	-->
				<td align='center'>$rows[kode_akun]</td>		
				<td align='center'>$rows[nama_akun]</td>
				<td align='right'>".number_format($rows[debet])."</td>
				<td align='right'>".number_format($rows[kredit])."</td>
				<td align='center'>
				<a href='javascript:deleteRow(\"{$rows[idjurnal]}\")'>
				<img src='images/no.png' title='Hapus'>
				</a>	
				</td>
			</tr>";
	$no++;
	$total_debet=$total_debet+$rows[debet];
	$total_kredit=$total_kredit+$rows[kredit];
	}
echo "<tr>
		<td colspan='3' align='right'>Total</td>
		<td align='right'><b>".number_format($total_debet)."</b></td>
		<td align='right'><b>".number_format($total_kredit)."</b></td>
		
		<td><input name='gtot' id='gtot' type='hidden' value='$gtot'></td>
	</tr>
	</table>";
?>