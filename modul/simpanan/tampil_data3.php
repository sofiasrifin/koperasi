<script type="text/javascript">
$(function() {
  $("#theTable.tiga tr:even").addClass("stripe1");
  $("#theTable.tiga tr:odd").addClass("stripe2");

  $("#theTable.tiga tr").hover(
	  function() {
		  $(this).toggleClass("highlight");
	  },
	  function() {
		  $(this).toggleClass("highlight");
	  }
  );
});
</script>
<?php
include '../../inc/inc.koneksi.php';
include "../../inc/fungsi_koperasi.php";
$cari	= $_POST['cari'];
$where	= " WHERE no_anggota LIKE '%$cari%' OR nama LIKE '%$cari%'";
echo "<table id='theTable' class='tiga' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Nomor</th>
			<th>Nama</th>
			<th>L/P</th>
			<th>Total</th>
		</tr>";
	$sql	= "SELECT a.no_anggota,a.nama,a.jk,
				(SELECT sum(jumlah) FROM simpanan WHERE no_anggota=a.no_anggota) as total,
				(SELECT sum(jumlah) FROM pengambilan WHERE no_anggota=a.no_anggota) as total2
				FROM anggota as a
				$where
				ORDER BY no_anggota";
	$query	= mysql_query($sql);
	$no=1;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[no_anggota]</td>
				<td>$rows[nama]</td>
				<td align='center'>$rows[jk]</td>
				<td align='right'>".number_format($rows[total]-$rows[total2])."</td>
			</tr>";
	$no++;
	}
echo "</table>";
?>