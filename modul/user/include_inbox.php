<?php
include'../include/conf.php'; 
include'../include/db.php';
?>
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
					$http.open('GET', 'cek_inboxs.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}

			}

// checkbox


  function pilihan()
  {
     // membaca jumlah komponen dalam form bernama 'myform'
     var jumKomponen = document.myform.length;

     // jika checkbox 'Pilih Semua' dipilih
     if (document.myform.pilih.checked == true)
     {
        // semua checkbox pada data akan terpilih
        for (i=1; i<=jumKomponen; i++)
        {
            if (document.myform[i].type == "checkbox") document.myform[i].checked = true;
        }
     }
     // jika checkbox 'Pilih Semua' tidak dipilih
     else if (document.myform.pilih.checked == false)
        {
            // semua checkbox pada data tidak dipilih
            for (i=1; i<=jumKomponen; i++)
            {
               if (document.myform[i].type == "checkbox") document.myform[i].checked = false;
            }
        }
  }


  
  </script>


		</script>

		<script type="text/javascript">
			setTimeout(function() {cekinbox();}, 10000);
		</script>

<script type="text/javascript" src="jquery.min.js"></script>

<script src="getsms.js"></script>
<script src="getsms1.js"></script>

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
        <form action="kirim_inbox.php" name="myform" method="post">
		
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <!--DWLayoutTable-->
            <tr>
              <td valign="middle"><a onload="MM_preloadImages('images/delete_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hapus','','images/delete_over.gif',1)">
        <input name="Submit" value="delete" type="image" src="images/delete.gif" name="hapus" width="70" height="25" border="0" id="hapus" onclick="return confirm('Apakah anda yakin akan menghapus SMS ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')">
      </a><img src="images/garis.gif" /> <a onload="MM_preloadImages('images/delete_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hapus1','','images/balas_over.gif',1)">
        <input name="Submit" value="kirim" type="image" src="images/balas.gif" name="hapus1" width="70" height="25" border="0" id="hapus1">
      </a> <img src="images/garis.gif" /> <a onload="MM_preloadImages('images/move_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hapus2','','images/move_over.gif',1)">
        <input name="Submit" value="move" type="image" src="images/move.gif" name="hapus2" width="70" height="25" border="0" id="hapus2">
      </a> <img src="images/garis.gif" /> <a href="export.php?id=inbox" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('pelanggan','','images/export_sms_over.gif',1)"><img src="images/export_sms.gif" name="pelanggan" height="25" border="0" id="pelanggan" /></a></td>
              <td height="41" align="right" valign="middle">
                <input name="id" type="hidden" id="id" value="inbox" />
                </a>
                  <input name="q1" class="baca1" id="q1" onFocus="if(this.value=='nama pengirim') this.value='';" onBlur="if(this.value=='') this.value='nama pengirim';" value="nama pengirim" onKeyUp="showUser(this.value)" size="15" type="text" maxlength="255"/>
                  <input name="q2" class="baca1" id="form" onFocus="if(this.value=='isi sms') this.value='';" onBlur="if(this.value=='') this.value='isi sms';" value="isi sms" onKeyUp="showUser1(this.value)" size="15" type="text" maxlength="255"/></td>
            </tr>
            <tr>
              <td height="26" colspan="2">
			  <div id="txtHint">
			  <div id="cekinbox">
                  <?php
$jcon = mysql_query("SELECT * FROM jumlah_konten");
$tcon=mysql_fetch_array($jcon);
/* PagingWeb.php */
$flname2 = $_SERVER['PHP_SELF'];
$n = $_REQUEST['pages'];

$sql2 = "SELECT * FROM inbox ORDER BY ID DESC LIMIT $tcon[inbox]";
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
	<?php
	echo"</th>
    <th width='1%' align='left'></th>
    <th width='20%' align='left'>Pengirim</th>
    <th width='45%' align='left'>Isi</th>
    <th width='15%' align='left'>Tanggal</th>
    <th width='12%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{




echo "<tr class='row0'>";

echo"<td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[ID]'></a></td>";  
$gbr=mysql_query("SELECT * FROM modem where nama='$row2[RecipientID]'");
$jgbr=mysql_num_rows($gbr);
$tgbr=mysql_fetch_array($gbr);
if($jgbr==1)
{
echo"<td class='baca1' align='left'> <img src='icon_modem/$tgbr[gambar]' border='0'></td>";   
}
if($jgbr==0)
{
echo"<td class='baca1' align='left'> <img src='icon_modem/default.png' border='0'></td>";   
}

$string=$row2[SenderNumber];

$ok=$string{0};  
if ($ok=='+')
{
$hp=substr($row2[SenderNumber], 3);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp='$hp'");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
if ($hasil>=1)
{
?>
<td class='baca1' align='left'><a name='<?php echo"$row2[ID]";?>' href='#' alt='<?php echo"$row2[SenderNumber]";?>'><?php echo"$tampilkan[nama]";?></a></td>
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
	<td class='baca1' align='left'>"; 
	?>
<a href="#<?php echo"$hp";?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_group_sms.php?no_hp=<?php echo"$hp";?>&id_sms=<?php echo"$row2[ID]";?>&SenderID=<?php echo"$row2[RecipientID]";?>', 'Pindahkan SMS', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='img/folder.png' border='0'></a>&nbsp;
	
<a href="#<?php echo"$row2[ID]";?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ok.php?no_hp=<?php echo"$hp";?>&phoneid=<?php echo"$row2[RecipientID]";?>', 'Balas SMS', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')">
<?php
echo"<img src='images/reply.png' border='0'></a>&nbsp;";

if ($hasil==0) 
{
?> 
<script type="text/javascript">
agreewin.onclose=function(){ //Define custom code to run when window is closed
	return true //Allow closing of window in both cases
}

</script>

<a href="#<?php echo $hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_buku_telepon.php?no_hp=<?php echo $hp;?>', 'Tambah Buku Telepon', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='images/plus.gif' border='0'></a>

<?php
}

echo"&nbsp;</td>";
	
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
              <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)"></a></div></div></td>
            </tr>
          </table>
    </form></td>
  </tr>
</table>
