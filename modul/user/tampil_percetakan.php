<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">

<?php 
include'../include/conf.php'; 
include'../include/db.php';
$tipe=$_POST['tipe'];
$table=$_POST['table'];
$mulai=$_POST['mulai'];
$akhir=$_POST['akhir'];
if($tipe==all)
{
	if($table==inbox)
	{
	$sql2 = "SELECT * FROM inbox ORDER BY ID DESC";
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
    <th width='20%' align='left'>Pengirim</th>
    <th width='45%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{


echo "<tr class='row0'>";  
$string=$row2[SenderNumber];
$ok=$string{0};  
if ($ok=='+')
{
$hp=substr($row2[SenderNumber], 3);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$hp");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
if ($hasil==1)
{
?>
<td class='baca1' align='left'><a name='<?php echo $row2[ID];?>' href='#' alt='<?php echo $row2[SenderNumber];?>'><?php echo $tampilkan[nama];?></a></td>
<?php
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row2[SenderNumber]</td>";
}

}
else
{
echo "<td class='baca1' align='left'>$row2[SenderNumber]</td>";
}

echo"<td class='baca1' align='left'>$row2[TextDecoded]</td>
    <td class='baca1' align='left'>$row2[ReceivingDateTime]</td>
";
	
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

}

// outbox //
	if($table==outbox)
	{
	$sql2 = "SELECT * FROM sentitems ORDER BY ID DESC";
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
    <th width='20%' align='left'>Dari Nomor</th>
    <th width='45%' align='left'>Isi Pesan</th>
    <th width='20%' align='left'>Waktu Pengiriman</th>
    <th width='20%' align='left'>Status</th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{
$hp1=substr($row2[DestinationNumber], 1);
$hp=substr($row2[DestinationNumber], 0);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$hp");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
echo "<tr class='row0'>";   
if ($hasil==1)
{
echo "<td class='baca1' align='left'><a href='#' alt='$row2[DestinationNumber]'>$tampilkan[nama]</a></td>";
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row2[DestinationNumber]</td>";
}

echo"<td class='baca1' align='left'>$row2[TextDecoded]</td>
<td class='baca1' align='left'>$row2[SendingDateTime]</td>
    <td class='baca1' align='left'>$row2[Status]</td>";
echo"</tr>
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
	
	}



}










if($tipe==tgl)
{
	if($table==inbox)
	{
	$sql2 = "SELECT * FROM inbox WHERE ReceivingDateTime between '$mulai' AND '$akhir'";
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
    <th width='20%' align='left'>Pengirim</th>
    <th width='45%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{


echo "<tr class='row0'>";  
$string=$row2[SenderNumber];
$ok=$string{0};  
if ($ok=='+')
{
$hp=substr($row2[SenderNumber], 3);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$hp");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
if ($hasil==1)
{
?>
<td class='baca1' align='left'><a name='<?php echo $row2[ID];?>' href='#' alt='<?php echo $row2[SenderNumber];?>'><?php echo $tampilkan[nama];?></a></td>
<?php
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row2[SenderNumber]</td>";
}

}
else
{
echo "<td class='baca1' align='left'>$row2[SenderNumber]</td>";
}

echo"<td class='baca1' align='left'>$row2[TextDecoded]</td>
    <td class='baca1' align='left'>$row2[ReceivingDateTime]</td>
";
	
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

}

// outbox //
	if($table==outbox)
	{
	$sql2 = "SELECT * FROM sentitems WHERE SendingDateTime between '$mulai' AND '$akhir'";
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
    <th width='20%' align='left'>Dari Nomor</th>
    <th width='45%' align='left'>Isi Pesan</th>
    <th width='20%' align='left'>Waktu Pengiriman</th>
    <th width='20%' align='left'>Status</th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{
$hp1=substr($row2[DestinationNumber], 1);
$hp=substr($row2[DestinationNumber], 0);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$hp");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
echo "<tr class='row0'>";   
if ($hasil==1)
{
echo "<td class='baca1' align='left'><a href='#' alt='$row2[DestinationNumber]'>$tampilkan[nama]</a></td>";
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row2[DestinationNumber]</td>";
}

echo"<td class='baca1' align='left'>$row2[TextDecoded]</td>
<td class='baca1' align='left'>$row2[SendingDateTime]</td>
    <td class='baca1' align='left'>$row2[Status]</td>";
echo"</tr>
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
	
	}



}


?> 