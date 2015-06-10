<script type="text/javascript">
$(function() {
var jml	=  $("#jml").val();						  		   
$("#page").paginate({
	count 					: jml,
	start 					: 1,
	display     			: 5,
	border					: true,
	text_color  			: '#888',
	background_color    	: '#EEE',	
	text_hover_color  		: 'black',
	background_hover_color	: '#CFCFCF', 
	images					: true,
	mouse					: 'press',
	onChange     			: function(page){
								$("#tampil_data").load('modul/lap_barang/tampil_data.php?hal='+page);
							  }
});
});
</script>
<?php
include '../../inc/inc.koneksi.php';

$limit 	= 10;
$kode1	= $_GET['kode1'];
$kode2	= $_GET['kode2'];
$satuan	= $_GET['satuan'];
$nama	= $_GET['nama'];

$pilih	= $_GET['pilih'];

if($pilih=='kode'){
	$where	= " WHERE kode_barang BETWEEN '$kode1' AND '$kode2'";
}elseif($pilih=='satuan'){
	$where	= " WHERE satuan='$satuan'";
}elseif($pilih=='namabarang'){
	$where	= " WHERE nama_barang LIKE '%$nama%'";
}else{
	$where	= "";
}
/*
$cari	= str_replace("'","\'",$_GET['cari']);
$field	= $_GET['field'];

if(empty($cari)){
	$where = '';
}else{
	$where = "WHERE $field LIKE '%$cari%' ORDER BY $field";
}
*/

$sql = "select kode_barang, nama_barang,harga_jual,harga_beli,stok_awal,
		(select sum(harga_beli*stok_awal) from barang where kode_barang) as thpp
		FROM barang  $where";	
$rsd = mysql_query($sql) or di(mysql_error());
$count = mysql_num_rows($rsd);
$pages = ceil($count/$limit);

echo "<input type='hidden' id='jml' value='$pages'>";
echo "<div id='page'></div>";
?>