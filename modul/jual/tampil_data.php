
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
		url		: "modul/jual/tampil_data.php",
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
			url		: "modul/jual/hapus_detail.php",
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

$where	= " WHERE kodejual='$cari'";

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
	<!--	<th>Satuan</th>		-->
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Total</th>
			<th width='10%'>Aksi</th>
		</tr>";
	$sql	= "SELECT idjual,kodejual,d_jual.kode_barang,jmljual,hargajual,nama_barang 
				FROM d_jual 
				JOIN barang
				ON d_jual.kode_barang=barang.kode_barang
				$where
				ORDER BY idjual";
	$query	= mysql_query($sql) or die(mysql_error());
	
	$no=1;
	while($rows=mysql_fetch_array($query)){
		$total = $rows[jmljual]*$rows[hargajual];
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[kode_barang]</td>
				<td>$rows[nama_barang]</td>
	<!--		<td align='center'>$rows[pbsid]</td>		-->
				<td align='center'>$rows[jmljual]</td>
				<td align='right'>".number_format($rows[hargajual])."</td>
				<td align='right'>".number_format($total)."</td>
				<td align='center'>
				<a href='javascript:deleteRow(\"{$rows[kodejual]}\")'>
				<img src='images/no.png' title='Hapus'>
				</a>	
				</td>
			</tr>";
	$no++;
	$gtot=$gtot+$total;
	}
echo "<tr>
		<td colspan='5' align='right'>Total</td>
		<td align='right'><b>".number_format($gtot)."</b></td>
		<td><input name='gtot' id='gtot' type='hidden' value='$gtot'></td>
	</tr>
	</table>";
?>