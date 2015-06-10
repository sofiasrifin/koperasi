<script type="text/javascript">
$(document).ready(function(){
	$("#paging_button li").click(function(){
		var tgl1 	= $('#tgl1').val();
		var tgl2 	= $('#tgl2').val();
		var field 	= $('#cbo_field').val();
		var text 	= $('#text').val();
		var	pilih	= $(".pilih:checked").val();
		var jml_pilih = $(".pilih:checked");
		var urut	= $('#cbo_urut').val();
		
		$("#paging_button li").css({'background-color' : '','color':'black'});
		$(this).css({'background-color' : '#e1efb2','color':'red'});
		
		$("#tampil_data").load("modul/lap_labajual/tampil_data.php?tgl1="+tgl1+"&tgl2="+tgl2+
										 "&field="+field+"&text="+text+"&urut="+urut+"&pilih="+pilih+"&page="+this.id);
		return false;
	});
	
	$("#1").css({'background-color' : '#e1efb2','color':'red'});
});
</script>
<?php

include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';

$per_page = 10;

$tgl1	= jin_date_sql($_GET['tgl1']);
$tgl2	= jin_date_sql($_GET['tgl2']);
$field	= $_GET['field'];
$text	= $_GET['text'];

$urut	= $_GET['urut'];

$pilih	= $_GET['pilih'];

if($pilih=='tgl'){
	$where	= " WHERE tgljual BETWEEN '$tgl1' AND '$tgl2'";
}elseif($pilih=='costum'){
	if($field=='kodejual'){
		$where	= " WHERE h_jual.kodejual LIKE '%$text%'";
	}elseif($field=='tglbeli'){
		$where	= " WHERE $field='".jin_date_sql($text)."'";
	}elseif($field=='kode_barang'){
		$where	= " WHERE d_jual.kode_barang LIKE '%$text%'";		
	}else{
		$where	= " WHERE $field LIKE '%$text%'";
	}
}else{
	$where	= "";
}


$sql = "SELECT h_jual.kodejual,tgljual, d_jual.kode_barang,nama_barang,jmljual,hargajual,(jmljual*hargajual) as total
		from h_jual
		join d_jual
		join barang
		on h_jual.kodejual=d_jual.kodejual AND d_jual.kode_barang=barang.kode_barang
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