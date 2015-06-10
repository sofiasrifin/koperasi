
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

</script>

<table>
	<tr>
    	<td><a href="?module=tambah_berita"><button>Tambah Berita</button></a></td>
 	<!--
    	<td>Cari Judul Berita</td>
        <td>:&nbsp;<input type="text" name="cari"/></td>
     -->
    </tr>
</table>

<table id='theTable' border="1" width="80%">
    <tr>
    	<th><b>No</b></th>
        <th><b>Judul</b></th>
        <th><b>Tgl Posting</b></th>
        <th><b>Aksi</b></th>
       
	</tr>
    <?php
	include 'inc/fungsi_tanggal.php';
	include_once("inc/ClassPaging.php");
	//include 'class_paging.php';
	
    $limit = 5;
	$query = new CnnNav($limit,'berita','*','id_berita');//berita = tabel, id_berita= primary key
	//jalankan querynya
	$result = $query ->getResult();
	//perintah diatas sama dengan perintah mysql_query
	$nomor = ($limit * $_GET['offset'])+0; 
	//$query= mysql_query("SELECT * FROM berita order by id_berita") or die(mysql_error());
	//$no=0;
	while($hasil = mysql_fetch_array($result)){
	//$no++;
	$nomor++;
	?>
 <?php
echo	"<tr>
		<td width='3%' align='center'>$nomor</td>
		<td width='60%'>$hasil[judul]</td>
        <td width='20%' align='center'>".jin_date_str($hasil[tanggal])."</td>
        <td align='center'><a href='?module=edit_berita&edit=$hasil[id_berita]'><img src='images/edit.png'></a>&nbsp;
		<a onclick=\"return confirm('Anda yakin akan menghapus $hasil[judul] ?'); if (ok) return true; else return false\" href=?module=edit_berita&&hapus=$hasil[id_berita]><img src='images/no.png'></a>
		</td>
	</tr>";
	
	}
	
   
echo	"</table>";
		// echo "Hal: $linkHalaman <br /><br />";
$query->printNav(); //Cetak paging
//echo "<div class=’pages’> $linkHalaman </div><br />";
?>

 