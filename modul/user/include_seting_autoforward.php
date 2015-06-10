<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="windowfiles/dhtmlwindow.css" type="text/css" />

<script type="text/javascript" src="windowfiles/dhtmlwindow.js">

/***********************************************
* DHTML Window Widget- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<link rel="stylesheet" href="modalfiles/modal.css" type="text/css" />
<script type="text/javascript" src="modalfiles/modal.js"></script>

<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
<script src="getnohp.js"></script>
<script src="getnohp1.js"></script>

<script type="text/JavaScript">

			function ceknohp()
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
							document.getElementById('ceknohp').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 10000);
						}
					};
					$http.open('GET', 'cek_seting_autoforward.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}

			}
			
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

			setTimeout(function() {ceknohp();}, 10000);

//-->
</script>
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">

</head>

<body onload="MM_preloadImages('images/tambah_pelanggan_over.gif')">

<form action="del.php" method="post" name="data_pelanggan" id="data_pelanggan">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <!--DWLayoutTable-->
    <tr>
      <td height="41" valign="middle"><a onload="MM_preloadImages('images/delete_over.gif')"> <a onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('hapus','','images/delete_over.gif',1)">
        <input name="Submit" type="image" value="Submit" src="images/delete.gif" name="hapus" width="70" height="25" border="0" id="hapus" onclick="return confirm('Apakah anda yakin akan menghapus Data Autorespond ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')">
      </a> <img src="images/garis.gif" /> <a href="#" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_autoforward.php', 'Tambah Autoforward', 'width=430px,height=380px,center=1,resize=0,scrolling=0', 'recal')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('pelanggan','','images/autoforward_over.gif',1)"><img src="images/autoforward.gif" name="pelanggan" height="25" border="0" id="pelanggan" /></a> <img src="images/garis.gif" /> <a href="#" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_allowed.php', 'Tambah No Hp Autoforward', 'width=320px,height=300px,center=1,resize=0,scrolling=0', 'recal')" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('pelanggan1','','images/tambah_pelanggan_over.gif',1)"><img src="images/tambah_pelanggan.gif" name="pelanggan1" height="25" border="0" id="pelanggan1" /></a></td>
      <td align="right" valign="middle"><a href="compose.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('compose','','images/compose_over.gif',1)"> </a>
          

</td>
    </tr>
    <tr>
      <td height="26" colspan="2"><script type="text/javascript">
agreewin.onclose=function(){ //Define custom code to run when window is closed
	return true //Allow closing of window in both cases
}
</script><div id="txtHint"><div id="ceknohp">
        <?php
include'../include/conf.php'; 
include'../include/db.php'; 
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT  distinct nama_grup from grup_autoforward";
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
    <th width='15%' align='left'>Nama Grup</th>
    <th width='60%' align='left'>Jumlah No HP</th>
    <th width='5%' align='left'></th>


  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{

echo "<tr class='row0'>
    <td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[nama_grup]'></a></td>";    
echo "<td class='baca1' align='left'>$row2[nama_grup]</td>
    <td class='baca1' align='left'>";
$jnohp=mysql_query("SELECT no_hp from grup_autoforward where nama_grup='$row2[nama_grup]'");
$jmlnohp=mysql_num_rows($jnohp);

while($tjnohp=mysql_fetch_array($jnohp))
{
$hp=substr($tjnohp[no_hp], 1);

$nama=mysql_query("SELECT nama from data_pelanggan where no_hp=$hp");
$j_nama=mysql_num_rows($nama);
$t_nama=mysql_fetch_array($nama);	
if($j_nama==1)
{	
echo"$t_nama[nama], ";
}
if($j_nama==0)
{
echo"0$hp, ";
}
}
echo"	</td>
	<td class='baca1' align='left'>";
?>
<a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'edit_autoforward.php?grup=<?php echo $row2[nama_grup];?>', 'Edit Autoforward', 'width=430px,height=380px,center=1,resize=0,scrolling=0', 'recal')"><img src=images/plus.gif border='0' title='edit'>

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
    <th width='15%' align='left'>Keyword</th>
    <th width='60%' align='left'>Isi SMS</th>
    <th width='5%' align='left'>Aktif</th>
    <th width='5%' align='left'></th>


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
        <input name="id" type="hidden" id="id" value="autoforward" />
      </div></div>
          </a></td>
    </tr>
  </table>
</form>
</body>
</html>
