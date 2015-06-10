<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
//-->
</script>
<form action="del.php" method="post" name="tambah" id="tambah">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <!--DWLayoutTable-->
    <tr>
      <td height="41" valign="middle"><a onload="MM_preloadImages('images/delete_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hapus','','images/delete_over.gif',1)">
        <input name="Submit" type="image" value="Submit" src="images/delete.gif" name="hapus" width="70" height="25" border="0" id="hapus" onclick="return confirm('Apakah anda yakin akan menghapus SMS ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')">
      </a> </td>
    </tr>
    <tr>
      <td height="26"><?php
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT * FROM sentitems ORDER BY ID DESC";
$res2 = mysql_query($sql2);

if ($res2 != null) {
   $jml2 = mysql_num_rows($res2);
   if ($jml2 == 0) {	   
   }

   // Batas baris per halaman
   $batas2 = 15;
   if (($jml2%$batas2) == 0) {
       $jmlpage2 = (int)($jml2/$batas2);
   } else {
       $jmlpage2 = ((int)$jml2/$batas2)+1;
   }
$kel2 = $jml2/5;
if ($kel2==floor($jml2/5)){
	$hal2 = $kel;
} else {
	$hal2 = floor($jml2/5)+1;
}
   // Inisialisasi variabel page
   (isset($_GET['pages'])) ?
   $page2 = (int)$_GET['pages'] : $page2 =1;

   if ($page2 > $jmlpage2)
       $page2=$jmlpage2;

   while ($rows2 = mysql_fetch_array($res2)) {
       $arrdata2[]=$rows2;
   }
   mysql_free_result($res2);

   // Set end dan start page
   $end2  = (int)($page2*$batas2)-1;
   $start2= (int)$end2-($batas2-1);

   if ($end2>$jml2)
       $end2=$jml2-1;

   for ($i2=$start2; $i2<=$end2; $i2++) {
       $arr2[] = $arrdata2[$i2];
   }

if ($jml2<>0)
{
   echo"<center><table width=100% class='adminlist'>";
   echo "<tr class='baca1'>
    <th  width='4%' align='left'></th>
    <th width='30%' align='left'>Dari Nomor</th>
    <th width='45%' align='left'>Isi Pesan</th>
    <th width='20%' align='left'>Status</th>
    <th width='10%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{
$hp=substr($row2[DestinationNumber], 0);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$hp");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
echo "<tr class='row0'>
    <td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[ID]'>"; ?>
          <? echo"</a></td>";   
if ($hasil==1)
{
echo "<td class='baca1' align='left'><a href='#' alt='$row2[DestinationNumber]'>$tampilkan[nama]</a></td>";
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row2[DestinationNumber]</td>";
}

echo"<td class='baca1' align='left'>$row2[TextDecoded]</td>
    <td class='baca1' align='left'>$row2[Status]</td>
	<td class='baca1' align='left'><a href='balas.php?no_hp=$hp&isi=$row2[TextDecoded]'><img src='images/reply.png' border='0'></a>&nbsp;</td>";
	
echo"</td>

  </tr>
";
$o++;
}
   

   }
   echo '</table> <br>';
   echo"<a class='baca1'>hal</a>";
   // View link dan periksa halaman aktif
   for ($n=1; $n<=$jmlpage2; $n++) {
      echo ($n != $page2) ?
      " <a class='baca1' href='$flname2?pages=$n'>$n</a> " :
      " <a class='baca1'><b>$n</b></a>";
   }

}
}
if($jml2==0)
{
   echo"<center><table width=100% class='adminlist'>";
   echo "<tr>
    <th  width='4%' align='left'></th>
    <th width='25%' align='left'>Pengirim</th>
    <th width='35%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>


  </tr>";

echo "<tr class='row0'>
    <td class='normal' align='left'></td>
	";    
echo "<td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
  </tr></table>
";
}
?> <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)">
          <input name="id" type="hidden" id="id" value="outbox" />
        </a></td>
    </tr>
  </table>
</form>
