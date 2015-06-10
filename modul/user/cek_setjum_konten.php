<?php
include'../include/conf.php'; 
include'../include/db.php';
?>
					
<?php
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT * FROM jumlah_konten";
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
    <th  width='20%' align='left'>Inbox</th>
    <th width='20%' align='left'>Outbox</th>
    <th width='20%' align='left'>Sent Item</th>
    <th width='20%' align='left'>Phonebook</th>
    <th width='20%' align='left'>Folder SMS</th>
    <th width='10%' align='left'></th>


  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{
echo "<tr class='row0'>
    <td class='baca1' align='left'>$row2[inbox]</td>
	<td class='baca1' align='left'>$row2[outbox]</td>
	<td class='baca1' align='left'>$row2[sentitem]</td>
	<td class='baca1' align='left'>$row2[phonebook]</td>
	<td class='baca1' align='left'>$row2[foldersms]</td>
	<td class='baca1' align='left'>"; 
	?>

<a href="#" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'edit_konten.php', 'Edit Jumlah Konten', 'width=320px,height=300px,center=1,resize=0,scrolling=0', 'recal')">
<img src='images/aktif.gif' border='0'></a>&nbsp;	
	
	
<?php	echo"</td>

</tr>";
$o++;
}
   

   }
   echo '</table> <br>';
}
}
?>
