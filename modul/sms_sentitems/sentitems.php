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
				url		: "modul/sms_sentitems/hapus.php",
				data	: "id="+id,
				success	: function(data){
					$("#tampil_data").load("modul/sms_sentitems/sentitems.php");
				}
			});
		}
	}
</script>
<?php
include "inc.koneksi.php";

$offset = $_GET['offset'];
$totalquery = mysql_query("select * from sentitems");
$numrows = mysql_num_rows($totalquery);

//jumlah data yang ditampilkan perpage
$limit = 50;
if (empty ($offset)) {
	$offset = 0;
}
if ($numrows == 0) {
	echo "<br><center><font face=tahoma size=2> Tidak Ada Pesan Terkirim </font></center>";	
}
else {
?>
<table width="80%" height="30" border="0" cellpadding="0" cellspacing="0">
	<tr> 
    	<td height="30"> 
      		<div align="left"><font size="2" face="tahoma">Sentitems<br> Jumlah Pesan : <?php echo "$numrows" ;?> </font></div>
      	</td>
    </tr>
</table>
<?php
// panggil semua data dari tabel siswa diurutkan berdasarkan id siswa, dibatasi dengan limit = 15
$hasil = mysql_query("select * from sentitems order by ID DESC limit $offset,$limit");
$k = 1;
$k = 1 + $offset;

echo"
	<div id=tampil_data align=left>
		<table id='theTable'  width=70%>
			<tr>
				<th> <font face=tahoma size=2>No. </font></th>
				<th> <font face=tahoma size=2>Tanggal </font></th>
				<th> <font face=tahoma size=2>No Tujuan </font></th>
				<th> <font face=tahoma size=2>Pesan </font></th>
				<th ><font face=tahoma size=2> Aksi </font></th>
			</tr>
";

while ($data = mysql_fetch_array($hasil)) {
	$pesan = substr($data[TextDecoded],0,30);

echo"
		<tr>
			<td width=10 align=center> <font face=tahoma size=2>$k </font></td>
			<td width=130><font face=tahoma size=2> $data[SendingDateTime] </font></td>
			<td width=100><font face=tahoma size=2> $data[DestinationNumber] </font></td>
			<td> <font face=tahoma size=2>$pesan ..</font> </td>
			<td width=50>
			<!-- <font face=tahoma size=2> <a href=?module=hapus_sentitems?ID=$data[ID] title='Hapus sentitems'> -->
			<a href='javascript:deleteRow(\"{$data[ID]}\")'> Hapus </a></td>
		</tr> 
";
$k++;
}
//untuk tutup tabel
echo "</table>";
echo "<div class=paging>";

if ($offset!=0) {
	$prevoffset = $offset-50;
	echo "<span class=prevnext> <a href=$PHP_SELF?module=sentitems&offset=$prevoffset>Back</a></span>";
}
else {
	echo "<span class=disabled>Back</span>";//cetak halaman tanpa link
}
//hitung jumlah halaman
$halaman = intval($numrows/$limit);//Pembulatan

if ($numrows%$limit){
	$halaman++;
}
for($i=1;$i<=$halaman;$i++){
	$newoffset = $limit * ($i-1);
	if($offset!=$newoffset){
		echo "<a href=$PHP_SELF?module=sentitems&offset=$newoffset>$i</a>";
		//cetak halaman
	}
	else {
		echo "<span class=current>".$i."</span>";//cetak halaman tanpa link
	}
}

//cek halaman akhir
if(!(($offset/$limit)+1==$halaman) && $halaman !=1){

	//jika bukan halaman terakhir maka berikan next
	$newoffset = $offset + $limit;
	echo "<span class=prevnext><a href=$PHP_SELF?module=sentitems&offset=$newoffset>Next</a>";
}
else {
	echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
}
}
echo "</div";
echo "</font>";
?>