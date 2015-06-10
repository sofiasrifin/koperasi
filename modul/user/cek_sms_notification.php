<?php
include'../include/conf.php'; 
include'../include/db.php';
?>
					
<div id="cektemplate">

<div id="cekgroup">
</script><div id="txtHint"><div id="ceknohp"><?php
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT * FROM sound ORDER BY id DESC";
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
    <th width='60%' align='left'>Nama Sound</th>
    <th width='12%' align='left'></th>
    <th width='5%' align='left'></th>
    <th width='5%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{
echo "<tr class='row0'>";   
echo "<td class='baca1' align='left'><a href='#' alt='$row2[nama_file]'>$row2[nama_file]</a></td>";
echo"<td class='baca1' align='left'>";

if($row2[aktif]=='1')
{
echo"aktif";
}
if($row2[aktif]=='0')
{
echo"<a href='insert.php?id=sound&no=$row2[id]'>set sound</a>";
}

echo"</td><td class='baca1' align='left'><a href='include_sms_notification.php?id=beranda&note=play&no=$row2[id]'><img src='images/play.gif' border='0'></a>&nbsp;</td>
</td><td class='baca1' align='left'>";
if($row2[aktif]=='1')
{
}
if($row2[aktif]=='0')
{
echo"<a href='del.php?id=sound&no=$row2[id]&filename=sound_sms/$row2[nama_file]'><img src='images/del.gif' border='0'></a>&nbsp;</td>";
}
	
echo"

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
   echo "<tr class='baca1'>
    <th  width='4%' align='left'></th>
    <th width='30%' align='left'>Dari Nomor</th>
    <th width='45%' align='left'>Isi Pesan</th>
    <th width='20%' align='left'>Status</th>
    <th width='10%' align='left'></th>


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
?> 

 <a href="compose.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('compose','','images/compose_over.gif',1)"></div>