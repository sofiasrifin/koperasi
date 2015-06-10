<script type="text/javascript">
$(document).ready(function(){
	$("#paging_button li").click(function(){
		var tgl1 	= $('#tgl1').val();
		var tgl2 	= $('#tgl2').val();
		var field 	= $('#cbo_field').val();
		var text 	= $('#text').val();
		var kode_akun 	= $('#kode_akun').val();
		var	pilih	= $(".pilih:checked").val();
		var jml_pilih = $(".pilih:checked");
		var urut	= $('#cbo_urut').val();
		
		$("#paging_button li").css({'background-color' : '','color':'black'});
		$(this).css({'background-color' : '#e1efb2','color':'red'});
		
		$("#tampil_data").load("modul/lap_bukubesar/tampil_data.php?tgl1="+tgl1+"&tgl2="+tgl2+
										 "&field="+field+"&text="+text+"&kode_akun="+kode_akun+"&urut="+urut+"&pilih="+pilih+"&page="+this.id);
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
$kode_akun	= $_GET['kode_akun'];
// $field	= $_GET['field'];
$text	= $_GET['text'];

$urut	= $_GET['urut'];

$pilih	= $_GET['pilih'];

if($pilih=='tgl'){
	$where	= " WHERE tgl BETWEEN '$tgl1' AND '$tgl2'";
}elseif($pilih=='costum'){
	if($field=='kode_akun'){
		$where	= " WHERE a.kode_akun LIKE '%$text%'";		
	}else{
		$where	= " WHERE $field LIKE '%$text%'";
	}
}else{
	$where	= "";
}


$sql = "SELECT c.tgl, c.uraian, b.nama_akun, debet, kredit
		FROM d_jurnal AS a
		JOIN jurnal AS c 
		JOIN akun as b
		ON a.no_jurnal = c.no_jurnal and a.kode_akun=b.kode_akun
		WHERE a.kode_akun = '$kode_akun' ";
		
$rsd = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);

echo "<ul>";
for($i=1; $i<=$pages; $i++){
	echo '<li id="'.$i.'">'.$i.'</li>';
}
echo "</ul>";
?>