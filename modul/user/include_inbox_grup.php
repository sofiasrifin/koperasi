<?php
include'../include/conf.php'; 
include'../include/db.php';
$grup=$_GET['grup'];

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
  <tr>
    <td>
<?php
if ($id==phonebook)
{
?>
        <form name="form1" method="post" action="insert.php">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="44%" class="baca1">Nama</td>
              <td width="30%" class="baca1">No Telp </td>
              <td width="30%" class="baca1">Alamat</td>
              <td width="11%" class="baca1">Anggota</td>
              <td width="15%">&nbsp;</td>
            </tr>
            <tr>
              <td><input name="nama" type="text" class="baca1" id="nama" value="<?php echo $jeneng;?>" size="15"></td>
              <td><input name="no_hp" type="text" class="baca1" id="no_hp" value="<?php echo $no_hp;?>" size="12">
                  <input name="id" type="hidden" id="id" value="phonebook"></td>
              <td><input name="alamat" type="text" class="baca1" id="alamat" size="13"></td>
              <td><select name="grup" class="bacas" id="grup">
<?php $sql1=mysql_query("SELECT * from grup");
while ($a1=mysql_fetch_array($sql1))
{
;
?>
                  <option> <?php echo"$a1[nama]";
}
?></option>
              </select></td>
              <td><input name="Submit" type="submit" class="judul" value="OK"></td>
            </tr>
          </table>
        </form>
<?php
}
?>
        <form action="del.php" name="myform" method="post">
		
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <!--DWLayoutTable-->
            <tr>
              <td valign="middle"><a onload="MM_preloadImages('images/delete_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('hapus','','images/delete_over.gif',1)">
                <input name="Submit" type="image" value="Submit" src="images/delete.gif" name="hapus" width="70" height="25" border="0" id="hapus" onclick="return confirm('Apakah anda yakin akan menghapus SMS ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')">
              </a><img src="images/garis.gif" /> <a href="export.php?id=inbox_group" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('pelanggan','','images/export_sms_over.gif',1)"><img src="images/export_sms.gif" name="pelanggan" height="25" border="0" id="pelanggan" /></a></td>
              <td height="41" align="right" valign="middle"><a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)">
                <input name="id" type="hidden" id="id" value="inbox_grup" />
				<input name="grup" type="hidden" id="grup" value="<?php echo $grup;?>" />

                </a>
                  </td>
            </tr>
            <tr>
              <td height="26" colspan="2">
<?php
$jcon = mysql_query("SELECT * FROM jumlah_konten");
$tcon=mysql_fetch_array($jcon);

$sql2 = "SELECT * FROM inbox_grup_sms where id_grup='$grup' ORDER BY Id DESC LIMIT $tcon[foldersms]";
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
    <th width='5%' align='left'></th>
    <th width='18%' align='left'>Pengirim</th>
    <th width='40%' align='left'>Isi</th>
    <th width='20%' align='left'>Tanggal</th>
    <th width='20%' align='left'></th>



  </tr>";

   $i=0;
   $o=1;

   foreach ($arr2 as $row2) { 

{


echo "<tr class='row0'>
    <td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row2[Id]'></a></td>";   
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp=$row2[no_hp]");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
$hp=substr($row2[SenderNumber], 3);
$gbr=mysql_query("SELECT * FROM modem where nama='$row2[SenderID]'");
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

if ($hasil>=1)
{
?>
<td class='baca1' align='left'><a name='<?php echo $hp;?>' href='#' alt='<?php echo $row2[no_hp];?>'><?php echo $tampilkan[nama];?></a></td>
<?php
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>0$row2[no_hp]</td>";
}


echo"<td class='baca1' align='left'>$row2[isi]</td>
    <td class='baca1' align='left'>$row2[tgl]</td>
	<td class='baca1' align='left'>"; ?>
	
<a href="#<?php echo $hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_group_sms1.php?no_hp=<?php echo $row2[no_hp];?>&id_sms=<?php echo $row2[Id];?>&grup_lama=<?php echo $row2[id_grup];?>&SenderID=<?php echo $row2[SenderID];?>', 'Pindahkan SMS', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='img/folder.png' border='0'></a>
	
<a href="#<?php echo $hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ok.php?no_hp=<?php echo $row2[no_hp];?>&phoneid=<?php echo $row2[SenderID];?>', 'Balas SMS', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')">
<?php
echo"<img src='images/reply.png' border='0'></a>";

if ($hasil==0) 
{
?> 
<script type="text/javascript">
agreewin.onclose=function(){ //Define custom code to run when window is closed
	return true //Allow closing of window in both cases
}

</script>

<a href="#<?php echo $hp;?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_buku_telepon.php?no_hp=<?php echo $row2[no_hp];?>', 'Tambah Buku Telepon', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='images/plus.gif' border='0'></a>

<?php
}

	
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
              <a href="compose.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('compose','','images/compose_over.gif',1)"></a></td>
            </tr>
          </table>
    </form></td>
  </tr>
</table>
