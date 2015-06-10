<?php
include'../include/conf.php'; 
include'../include/db.php';
?>
<html>
<head>
<title>Paging ala Facebook</title>
<link rel="stylesheet" href="windowfiles/dhtmlwindow.css" type="text/css" />
<script type="text/javascript" src="windowfiles/dhtmlwindow.js"></script>
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="modalfiles/modal.css" type="text/css" />
<script type="text/javascript" src="modalfiles/modal.js"></script>

<link href="style1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery.1.4.2.min.js"></script>
<script type="text/javascript" src="update.js"></script>
<script src="getsms.js"></script>
<script src="getsms1.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript">
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



$(document).ready(function() {
  //jika showmore post diklik
  $('.load_more').live("click",function() {
  //buat variabel id_terakhir dari id milik load_more
  var id_terakhir = $(this).attr("id");
  //Jika id_terakhir tidak sama dengan end
  if(id_terakhir!='end'){//lakukan request ajax
    $.ajax({
      type: "POST",
      url: "tampil_inbox.php", //proses ke file php
      data: "idakhir="+ id_terakhir, 
      beforeSend:  function() {
        $('a.load_more').append('<img src="facebook_style_loader.gif" />');
      },
      success: function(html){
        $(".facebook_style").remove(); //hilangkan div dengan class name facebook style
        $("ol#updates").append(html); //memberikan respon ke ol#updates
      }
    });
  }
  return false;
  });
});

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
</head>
<body>
<div id='container'>
 <ol class="row" id="updates">
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
<div id='container'>
 <ol class="row" id="updates">

<?php
//tampilkan status dengan limit 5
   echo"<table width=100% class='adminlist'>";
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

$query ="select * FROM inbox ORDER BY ID DESC LIMIT 5";
$result = mysql_query($query);
while($row=mysql_fetch_array($result)){

echo "<tr class='row0'>";
$o=$row[ID];
echo"<td class='baca1' align='left'> <input type='checkbox' name='chk[$o]' value='$row[ID]'></a></td>";  
$gbr=mysql_query("SELECT * FROM modem where nama='$row[RecipientID]'");
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

$string=$row[SenderNumber];

$ok=$string{0};  
if ($ok=='+')
{
$hp=substr($row[SenderNumber], 3);
$pel=mysql_query("SELECT * FROM data_pelanggan where no_hp='$hp'");
$tampilkan=mysql_fetch_array($pel);
$hasil=mysql_num_rows($pel);
if ($hasil>=1)
{
?>
<td class='baca1' align='left'><a name='<?php echo"$row[ID]";?>' href='#' alt='<?php echo"$row[SenderNumber]";?>'><?php echo"$tampilkan[nama]";?></a></td>
<?php
}
if ($hasil==0)
{
echo "<td class='baca1' align='left'>$row[SenderNumber]</td>";
}

}
else
{
echo "<td class='baca1' align='left'>$row[SenderNumber]</td>";
}

echo"<td class='baca1' align='left'>$row[TextDecoded]</td>
    <td class='baca1' align='left'>$row[ReceivingDateTime]</td>
	<td class='baca1' align='left'>"; 
	?>
<a href="#<?php echo"$hp";?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_group_sms.php?no_hp=<?php echo"$hp";?>&id_sms=<?php echo"$row[ID]";?>&SenderID=<?php echo"$row[RecipientID]";?>', 'Pindahkan SMS', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">
<img src='img/folder.png' border='0'></a>&nbsp;
	
<a href="#<?php echo"$row[ID]";?>" onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ok.php?no_hp=<?php echo"$hp";?>&phoneid=<?php echo"$row[RecipientID]";?>', 'Balas SMS', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')">
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

?>
 

<?php } 
   echo '</table> <br>';
?>
</div>
  
<div class="facebook_style" id="facebook_style">
<a id="<?php echo $id_status1; ?>" href="#" class="load_more" >Show Older Posts <img src="arrow1.png" /></a>
</div>
</div>
</td>
            </tr>
          </table>
</form>

</body>
</html>
