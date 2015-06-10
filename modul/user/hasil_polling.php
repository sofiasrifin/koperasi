<?php
include'../include/db.php';
?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>
<script language="JavaScript">

/*
Drop down messages script
By Website Abstraction (http://wsabstract.com)
Over 400+ free scripts here!
*/

//change contents of message box, where the first one corresponds with the first drop down box, second with second box etc
var thecontents=new Array()
<?

echo "
thecontents[0]=''";
$i=1;
$sqls=mysql_query("SELECT isi from template_sms order by id asc");
while($tmpl=mysql_fetch_array($sqls))
{
echo"
thecontents[$i]='$tmpl[isi]'";
$i++;

}
?>
//don't edit pass this line

function changecontent(which){
document.ddmessage.Text.value=thecontents[which.selectedIndex]
}

document.ddmessage.Text.value=thecontents[document.ddmessage.selectbox.selectedIndex]
</script>

<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">

<div style="padding: 5px">
  <p class="style1">
    <?php
$id_poll=$_GET['id_poll'];
$sql2 = "SELECT * FROM poll where id_poll='$id_poll'";
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
   echo"<a class='style1'><strong>Hasil Polling $id_poll</strong></a><p><center>
   <table width=100% class='adminlist'>";
   echo "<tr class='baca1'>
    <th width='60%' align='left'>Jawaban</th>
    <th width='40%' align='left'>Jumlah</th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{



echo "<tr class='row0'>";

echo"<td class='baca1' align='left'>$row2[jawaban] </td>
<td class='baca1' align='left'>$row2[jumlah] </td>";


echo"</tr>";
$o++;
}
   

   }
   echo '</table> <br>';


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
</p>
</div>
