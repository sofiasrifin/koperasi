<?php
include'../include/conf.php'; 
include'../include/db.php';
$del=mysql_query("delete from arr_poll");

?>
<link rel="stylesheet" href="windowfiles/dhtmlwindow.css" type="text/css" />

<script type="text/javascript" src="windowfiles/dhtmlwindow.js">

/***********************************************
* DHTML Window Widget- � Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<link rel="stylesheet" href="modalfiles/modal.css" type="text/css" />
<script type="text/javascript" src="modalfiles/modal.js"></script>
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
<script type="text/javascript">

			function cekinbox()
			{
				var
					$http,
					$self = arguments.callee;

				if (window.XMLHttpRequest) {
					$http = new XMLHttpRequest();
				} else if (window.ActiveXObject) {
					try {
						$http = new ActiveXObject('Msxml2.XMLHTTP');
					} catch(e) {
						$http = new ActiveXObject('Microsoft.XMLHTTP');
					}
				}

				if ($http) {
					$http.onreadystatechange = function()
					{
						if (/4|^complete$/.test($http.readyState)) {
							document.getElementById('cekinbox').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 10000);
						}
					};
					$http.open('GET', 'cek_graphic_poll.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}

			}

  </script>


		<script type="text/javascript">
			setTimeout(function() {cekinbox();}, 10000);
		</script>

<script type="text/javascript" src="jquery.min.js"></script>


<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->

			setTimeout(function() {cektemplate();}, 10000);

</script>
		
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <!--DWLayoutTable-->
            <tr>
              <td valign="middle"><a href="#" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'add_poll.php', 'Tambah Polling', 'width=370px,height=400px,center=1,resize=0,scrolling=0', 'recal')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('pelanggan','','images/polling_over.gif',1)"><img src="images/polling.gif" name="pelanggan" height="25" border="0" id="pelanggan" /></a>  </td>
              <td height="41" align="right" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
            <tr>
              <td height="26" colspan="2">
			  <div id="cekinbox">
                  <?php
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

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
$waktu=$tket[autorefresh]/1000;
echo"<td class='baca1' align='left'>$row2[id_poll] </td>
<td class='baca1' align='left'>$tket[jenis_grafik] </td>
<td class='baca1' align='left'>$waktu S </td>
<td class='baca1' align='left'>$tket[judul_grafik] </td>
<td class='baca1' align='left'>$tket[ket_poll] </td>
"; 

	?>
<td class='baca1' align='left'>
<a href='tampil_graphic.php?id_poll=<?php echo $row2[id_poll];?>'><img src="images/graph.png" border="0" title="tampil graphic"/></a> 
</td>
<td class='baca1' align='left'>
<a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'edit_graph.php?id_poll=<?php echo $row2[id_poll];?>', 'Edit Graphic', 'width=370px,height=320px,center=1,resize=0,scrolling=0', 'recal')"><img src="images/plus.gif" border="0" title="graphic polling"/></a> 
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
              <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)"></a></div></td>
            </tr>
          </table>
    </td>
  </tr>
</table>
