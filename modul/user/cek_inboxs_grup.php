
<?php
include'../include/conf.php'; 
include'../include/db.php'; 
?>

			  <div id="txtHint">
                  <?php
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT * FROM inbox_grup_sms where id_grup='$grup' ORDER BY Id DESC";
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
    <th  width='4%' align='left'>
	";
	?>
	<input name="pilih" onclick="pilihan()" type="checkbox">
	<?
	echo"</th>
    <th width='20%' align='left'>Pengirim</th>
    <th width='45%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>
    <th width='15%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{


echo "<tr class='row0'>
    <td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[ID]'>"; ?>
                  <? echo"</a></td>";   
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$row2[no_hp]");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
$hp=substr($row2[SenderNumber], 3);

if ($hasil==1)
{
?>
<td class='baca1' align='left'><a name='<?=$hp;?>' href='#' alt='<?=$row2[no_hp];?>'><?=$tampilkan[nama];?></a></td>
<?
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>0$row2[no_hp]</td>";
}


echo"<td class='baca1' align='left'>$row2[isi]</td>
    <td class='baca1' align='left'>$row2[tgl]</td>
	<td class='baca1' align='left'>"; ?>
	
<a href="#<?=$hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_group_sms.php?no_hp=<?=$row2[no_hp];?>&id_sms=<?=$row2[ID];?>', 'Pindahkan SMS', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='img/folder.png' border='0'></a>&nbsp;
	
<a href="#<?=$hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ok.php?no_hp=<?=$row2[no_hp];?>', 'Balas SMS', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')">
<?
echo"<img src='images/reply.png' border='0'></a>&nbsp;";

if ($hasil==0) 
{
?> 
<script type="text/javascript">
agreewin.onclose=function(){ //Define custom code to run when window is closed
	return true //Allow closing of window in both cases
}

</script>

<a href="#<?=$hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_buku_telepon.php?no_hp=<?=$row2[no_hp];?>', 'Tambah Buku Telepon', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='images/plus.gif' border='0'></a>

<?
}

echo"&nbsp;</td>";
	
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
    <th width='20%' align='left'>Pengirim</th>
    <th width='45%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>
    <th width='15%' align='left'></th>


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
              <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)"></a></div>