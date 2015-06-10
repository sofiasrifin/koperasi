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
<?php
include "inc.koneksi.php";

$offset = $_GET['offset'];
$totalquery = mysql_query("select * from sms_group");
$numrows = mysql_num_rows($totalquery);

//jumlah data yang ditampilkan perpage
$limit = 50;
if (empty ($offset)) {
	$offset = 0;
}
?>
<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0">
	<tr> 
    	<td height="30""> 
      		<div align="left"><font size="2" face="tahoma">Group<br> Jumlah Group : <?php echo "$numrows" ;?> </font></div>
      	</td>
    </tr>
</table>
<?php
// panggil semua data dari tabel siswa diurutkan berdasarkan id siswa, dibatasi dengan limit = 15
$hasil = mysql_query("select * from sms_group order by idgroup ASC limit $offset,$limit");
$k = 1;
$k = 1 + $offset;

echo"
	<div align=left>
		<input type=button value='Tambah Group' onclick=\"window.location.href='?module=tambahgroup';\">
<!--	<input type=button value='Daftar Phonebook' onclick=\"window.location.href='?module=daftarphonebook';\"> 		
		<input type=button value='Send Group' onclick=\"window.location.href='?module=sendgroup';\">	-->
		<table id=theTable border=1>
			<tr>
				<th><font size='2' face='tahoma'> No. </font></th>
				<th><font size='2' face='tahoma'> ID </font></th>
				<th><font size='2' face='tahoma'> Nama Group </font></th>
				<th><font size='2' face='tahoma'> Aksi </font></th>
			</tr>
";

while ($data = mysql_fetch_array($hasil)) {
	echo "<tr>
			<td width=10 align=center><font size='2' face='tahoma'>$k</font> </td>
			<td><font size='2' face='tahoma'> $data[idgroup] </font></td>
			<td> <font size='2' face='tahoma'>$data[group] </font></td>
			<td><font size='2' face='tahoma'> <a href=?module=lihatdetailgroup&id=$data[idgroup] title='Lihat Group'>Lihat<img src='view.png'></a> | 
			<a href=?module=editgroup&id=$data[idgroup] title='Edit Group'> <img src='images/edit.png'></a></font></td>
		</tr> ";
$k++;
}
//untuk tutup tabel
echo "</table>";
echo "<div class=paging>";

if ($offset!=0) {
	$prevoffset = $offset-50;
	echo "<span class=prevnext> <a href=$PHP_SELF?module=inbox&offset=$prevoffset>Back</a></span>";
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
		echo "<a href=$PHP_SELF?module=inbox&offset=$newoffset>$i</a>";
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
	echo "<span class=prevnext><a href=$PHP_SELF?module=inbox&offset=$newoffset>Next</a>";
}
else {
	echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
}
echo "</div";
echo "</font>";
?>