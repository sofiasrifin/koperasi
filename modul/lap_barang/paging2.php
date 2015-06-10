<script type="text/javascript">
$(document).ready(function(){
	$("#paging_button li").click(function(){
		var kode1 	= $('#cbo_kode1').val();
		var kode2 	= $('#cbo_kode2').val();
		var satuan 	= $('#cbo_satuan').val();
		var nama 	= $('#namabarang').val();
		var urut	= $('#cbo_urut').val();
		var	pilih	= $(".pilih:checked").val();
		
		$("#paging_button li").css({'background-color' : '','color':'black'});
		$(this).css({'background-color' : '#e1efb2','color':'red'});
		
		$("#tampil_data").load('modul/lap_barang/tampil_data.php?kode1='+kode1+'&kode2='+kode2+'&urut='+urut+
										'&satuan='+satuan+'&pilih='+pilih+'&nama='+nama+'&page='+this.id);
		return false;
	});
	
	$("#1").css({'background-color' : '#e1efb2','color':'red'});
});
</script>
<?php

include '../../inc/inc.koneksi.php';

$per_page = 10;

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


$sql = "select kode_barang, nama_barang,harga_jual,harga_beli,stok_awal,
		(select sum(harga_beli*stok_awal) from barang where kode_barang) as thpp
		FROM barang 
		$where";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

echo "<ul>";
for($i=1; $i<=$pages; $i++){
	echo '<li id="'.$i.'">'.$i.'</li>';
}
echo "</ul>";
?>