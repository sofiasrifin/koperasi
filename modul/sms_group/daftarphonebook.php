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
$dataPerPage = 20;
 
if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;
 
$offset = ($noPage - 1) * $dataPerPage;

// menampilkan seluruh data phonebook

if (isset($_GET['sortby']))
{
   if ($_GET['sortby'] == 'nama')  $query = "SELECT * FROM sms_phonebook ORDER BY nama LIMIT $offset, $dataPerPage";
   else if ($_GET['sortby'] == 'notelp')  $query = "SELECT * FROM sms_phonebook ORDER BY noTelp LIMIT $offset, $dataPerPage";
   else if ($_GET['sortby'] == 'group')  $query = "SELECT * FROM sms_phonebook ORDER BY idgroup LIMIT $offset, $dataPerPage";
   else if ($_GET['sortby'] == 'alamat')  $query = "SELECT * FROM sms_phonebook ORDER BY alamat LIMIT $offset, $dataPerPage";
}
else $query = "SELECT * FROM sms_phonebook ORDER BY nama LIMIT $offset, $dataPerPage";

$hasil = mysql_query($query);
echo "<br>";


echo "<font size='2' face='tahoma'><h2>Daftar Phonebook</h2></font>
	<!-- <input type=button value='Tambah Phonebook' onclick=\"window.location.href='?module=tambahpbk';\"> --> ";
?>
	
    <table>
    <tr>
    	<td align="left"><b>Import Phone Book</b></td>
    </tr>
    <tr>
	<form method="post" enctype="multipart/form-data" action="?module=proses_import">
	<td>Pilih file
	<input type="hidden" name="MAX_FILE_SIZE" value="20000000">
	<input name="userfile" type="file" size="50">
	<input name="upload" type="submit" value="Import"></td>
    <td width="10%">&nbsp;</td>
	<td align="right"><?php echo "<input type=button align= 'right' value='Tambah Phonebook' onclick=\"window.location.href='?module=tambahpbk';\"> "; ?></td>
	</form>
    <tr>
</table>
<?php	
echo "<br><table width='70%' id='theTable' border='1'>";
echo "<tr>
		<th width='4%' align='left'><font size='2' face='tahoma'>No.</font></th>
		<th width='35%'><font size='2' face='tahoma'>NAMA</font></a> </b></th>
		<th width='20%'><font size='2' face='tahoma'>NO HP</font></a></th>
		<th width='10%'><font size='2' face='tahoma'>ATUR</font></th>
	</tr>";
$i = ($noPage-1)*$dataPerPage;
while ($data = mysql_fetch_array($hasil))
{
   $i++;

   if ($i % 2 == 0) $style = "genap";
   else $style = "ganjil";

   $group = explode('|', $data['idgroup']);
   $listgroup = '';
   for($q=1; $q<=count($group)-2; $q++)
   {
	  $query2 = "SELECT `group` FROM sms_group WHERE idgroup = '$group[$q]'";
	  $hasil2 = mysql_query($query2);
      $data2  = mysql_fetch_array($hasil2);
	  $listgroup .= $data2['group'].', ';
   }
   
   echo "<tr class='".$style."'>
   			<td><font size='2' face='tahoma'>".$i."</font></td>
			<td align='left'><font size='2' face='tahoma'><a class='phonebook' title='".strtoupper($data['nama'])."|<b>No. Handphone:</b> ".$data['noTelp']."<br><br> <b>Alamat:</b> ".$data['alamat']."<br><br><b>Group:</b> ".$listgroup."<br><br><b>Tgl Lahir:</b> ".$data['datebirth']."'>".strtoupper($data['nama'])."</a></td>
			<td align='left'>".$data['noTelp']."</font></td>
			<td align='center'><font size='2' face='tahoma'><a href='".$_SERVER['PHP_SELF']."?module=edit_pbk&id=".$data['noTelp']."'><img src='images/edit.png'></a>  <a onclick=\"return confirm('Anda yakin akan menghapus $data[nama]?'); if (ok) return true; else return false\" href='".$_SERVER['PHP_SELF']."?module=hapus_pbk&id=".$data['noTelp']."'><img src='images/no.png'></a>  <a href='".$_SERVER['PHP_SELF']."?module=sendsms&ph=".$data['noTelp']."'><img src='images/sms.png'></a></font></td>
		</tr>";
   
}
echo "</table><br>";

$query  = "SELECT COUNT(*) AS jumData FROM sms_phonebook";
$hasil  = mysql_query($query);
$data   = mysql_fetch_array($hasil);
 
$jumData = $data['jumData'];
  
$jumPage = ceil($jumData/$dataPerPage);

echo "Halaman: "; 

if (isset($_GET['sortby']))
{

if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?module=daftarphonebook&sortby=".$_GET['sortby']."&page=".($noPage-1)."'>&lt;&lt; Prev</a>";
  
for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?module=daftarphonebook&sortby=".$_GET['sortby']."&page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}
 
if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?module=daftarphonebook&sortby=".$_GET['sortby']."&page=".($noPage+1)."'>Next &gt;&gt;</a>";

}
else
{

if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?module=daftarphonebook&page=".($noPage-1)."'>&lt;&lt; Prev</a>";
  
for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?module=daftarphonebook&page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}
 
if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?module=daftarphonebook&page=".($noPage+1)."'>Next &gt;&gt;</a>";


}
					
					
					
					?>