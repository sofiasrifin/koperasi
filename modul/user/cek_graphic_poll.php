<?php
include'../include/db.php'; 
include'../include/conf.php'; 

$sql2 = "SELECT distinct id_poll FROM poll";
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
    <th width='15%' align='left'>Id Polling</th>
    <th width='10%' align='left'>Jenis Grafik</th>
    <th width='10%' align='left'>Update grafik</th>
    <th width='20%' align='left'>Judul grafik</th>
    <th width='70%' align='left'>Keterangan Polling</th>
    <th width='5%' align='left'></th>
    <th width='5%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{



$ket=mysql_query("SELECT * FROM ket_poll where id_poll='$row2[id_poll]'");
$tket=mysql_fetch_array($ket);
echo "<tr class='row0'>";
$waktu=$tket['autorefresh']/1000;
echo"<td class='baca1' align='left'>$row2[id_poll] </td>
<td class='baca1' align='left'>$tket[jenis_grafik] </td>
<td class='baca1' align='left'>$waktu S </td>
<td class='baca1' align='left'>$tket[judul_grafik] </td>
<td class='baca1' align='left'>$tket[ket_poll] </td>
"; 

	?>
<td class='baca1' align='left'>
<a href='tampil_graphic.php?id_poll=<?php echo $row2['id_poll'];?>'><img src="images/graph.png" border="0" title="tampil graphic"/></a> 
</td>
<td class='baca1' align='left'>
<a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'edit_graph.php?id_poll=<?php echo $row2['id_poll'];?>', 'Edit Graphic', 'width=370px,height=320px,center=1,resize=0,scrolling=0', 'recal')"><img src="images/plus.gif" border="0" title="graphic polling"/></a> 
</td>

<?php

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
   echo "<tr>
    <th width='20%' align='left'>Id Polling</th>
    <th width='70%' align='left'>Id Polling</th>
    <th width='10%' align='left'></th>


  </tr>";

echo "<tr class='row0'>
    <td class='normal' align='left'></td>
	";    
echo "<td class='normal'align='left'></td>
    <td class='normal'align='left'></td>
  </tr></table>
";
}
?>
              <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)"></a>