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
				url		: "modul/sms_inbox/hapus.php",
				data	: "id="+id,
				success	: function(data){
					$("#tampil_data").load("modul/sms_inbox/inbox.php");
				}
			});
		}
	}
</script>
<!-- refresh script setiap 10 detik -->
<meta http-equiv="refresh" content="10; url=<?php $_SERVER['PHP_SELF']; ?>">
<?php
include "inc.koneksi.php";

$offset = $_GET['offset'];
$totalquery = mysql_query("select * from inbox");
$numrows = mysql_num_rows($totalquery);

//jumlah data yang ditampilkan perpage
$limit = 15;
if (empty ($offset)) {
	$offset = 0;
}
if ($numrows == 0) {
	echo "<br><center> Tidak Ada Pesan Masuk </center>";	
}
else {
?>
<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
	<tr> 
    	<td height="30""> 
      		<div align="left"><font size="2" face="tahoma">Inbox<br> Jumlah Pesan : <?php echo "$numrows" ;?> </font></div>
      	</td>
    </tr>
</table>
<?php
// panggil semua data dari tabel siswa diurutkan berdasarkan id siswa, dibatasi dengan limit = 15
$hasil = mysql_query("select * from inbox order by Class DESC limit $offset,$limit");
$k = 1;
$k = 1 + $offset;

echo"
	<div id=tampil_data align=left>
		<table id=theTable border=1 width=100%>
			<tr>
				<th><font size='2' face='tahoma'> No. </font></th>
				<th width=145><font size='2' face='tahoma'> Tanggal </font></th>
				<th width=130><font size='2' face='tahoma'> Pengirim </font></th>
				<th><font size='2' face='tahoma'> Pesan </font></th>
				<th width=90><font size='2' face='tahoma'> Aksi </font></th>
			</tr>
";

while ($data = mysql_fetch_array($hasil)) {
	$pesan = substr($data[TextDecoded],0,25);
	if($data[Processed] == 'false'){
		$tampil = "<tr>
			<td width=10 align=center><font size='2' face='tahoma'><b> $k</b></font> </td>
			<td><font size='2' face='tahoma'><b> $data[ReceivingDateTime] </b></font></td>
			<td> <font size='2' face='tahoma'><b>$data[SenderNumber] </b></font></td>
			<td><font size='2' face='tahoma'><b> <a href=?module=lihatdetail&ID=$data[ID] title='Lihat Pesan'>$pesan ..</a> </b></font></td>
			<td><font size='2' face='tahoma'> <a href=?module=lihatdetail&ID=$data[ID] title='Balas Pesan'> Reply </a> | 
			<a href='javascript:deleteRow(\"{$data[ID]}\")'> Hapus </a> </font></td>
		</tr> ";
	}
	else{
		$tampil = "<tr>
			<td width=10 align=center><font size='2' face='tahoma'> $k</font> </td>
			<td><font size='2' face='tahoma'> $data[ReceivingDateTime] </font></td>
			<td> <font size='2' face='tahoma'>$data[SenderNumber] </font></td>
			<td><font size='2' face='tahoma'><b> <a href=?module=lihatdetail&ID=$data[ID] title='Lihat Pesan'>$pesan ..</a> </b></font></td>
			<td><font size='2' face='tahoma'> <a href=?module=lihatdetail&ID=$data[ID] title='Balas Pesan'> Reply </a> | 
			<a href='javascript:deleteRow(\"{$data[ID]}\")'> Hapus </a> </font></td>
		</tr> ";
	}
echo"$tampil";
$k++;
}
//untuk tutup tabel
echo "</table>";
echo "<div class=paging>";

if ($offset!=0) {
	$prevoffset = $offset-15;
	echo "<span class=prevnext> <a href=$PHP_SELF?module=sms_inbox&offset=$prevoffset>Back</a></span>";
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
		echo "<a href=$PHP_SELF?module=sms_inbox&offset=$newoffset>$i</a>";
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
	echo "<span class=prevnext><a href=$PHP_SELF?module=sms_inbox&offset=$newoffset>Next</a>";
}
else {
	echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
}
}
echo "</div";
echo "</font>";
?>