<?php
include'../include/conf.php'; 
include'../include/db.php';
?>
					
<?php
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT * from info_ruang";
$res2 = mysql_query($sql2);

if ($res2 != null) {
   $jml2 = mysql_num_rows($res2);
   if ($jml2 == 0) {	   
   }

   // Batas baris per halaman
   $batas2 = 150;
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
    <th width='15%' align='left'>Nama Ruang</th>
    <th width='60%' align='left'>Keterangan</th>
    <th width='5%' align='left'></th>


  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{

echo "<tr class='row0'>
    <td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[id]'></a></td>";    
echo "<td class='baca1' align='left'>$row2[ruang]</td>
<td class='baca1' align='left'>$row2[ket]</td>
<td class='baca1' align='left'>";
?>
<a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'edit_info.php?id=<?php echo $row2[id];?>', 'Edit Info Ruang', 'width=380px,height=300px,center=1,resize=0,scrolling=0', 'recal')"><img src=images/plus.gif border='0' title='edit'>

<?php	
echo"</td>";
	
echo"</tr>";
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
   echo "<tr class='baca1'>
    <th  width='4%' align='left'></th>
    <th width='15%' align='left'>Nama Ruang</th>
    <th width='60%' align='left'>Keterangan</th>
    <th width='5%' align='left'></th>


  </tr>";

echo "<tr class='row0'>
    <td class='normal' align='left'></td>
	";    
echo "<td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
  </tr></table>
";
}
?>

 <a href="compose.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('compose','','images/compose_over.gif',1)">
 <input name="id" type="hidden" id="id" value="autorespond" />
