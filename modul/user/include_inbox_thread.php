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

<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery.1.4.2.min.js"></script>
<script type="text/javascript" src="update.js"></script>
<script src="getsms.js"></script>
<script src="getsms1.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  //jika showmore post diklik
  $('.load_more').live("click",function() {
  //buat variabel id_terakhir dari id milik load_more
  var id_terakhir = $(this).attr("id");
  //Jika id_terakhir tidak sama dengan end
  if(id_terakhir!='end'){//lakukan request ajax
    $.ajax({
      type: "POST",
      url: "tampil_thread.php", //proses ke file php
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
</script>
</head>
<body>
<div id='container'>
 <ol class="row" id="updates">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <!--DWLayoutTable-->
            <tr>
		 
              <td valign="middle">&nbsp;&nbsp; <a href="export.php?id=inbox" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('pelanggan','','images/export_sms_over.gif',1)"><img src="images/export_sms.gif" name="pelanggan" height="25" border="0" id="pelanggan" /></a></td>
              <td height="41" align="right" valign="middle">
                <input name="id" type="hidden" id="id" value="inbox" />
                </a>
                  <input name="q1" class="baca1" id="q1" onFocus="if(this.value=='nama pengirim') this.value='';" onBlur="if(this.value=='') this.value='nama pengirim';" value="nama pengirim" onKeyUp="showUser(this.value)" size="15" type="text" maxlength="255"/>
                  <input name="q2" class="baca1" id="form" onFocus="if(this.value=='isi sms') this.value='';" onBlur="if(this.value=='') this.value='isi sms';" value="isi sms" onKeyUp="showUser1(this.value)" size="15" type="text" maxlength="255"/></td>
            </tr>
			</table> 
<?php
//tampilkan status dengan limit 5
$query ="select * FROM inbox ORDER BY ID DESC LIMIT 5";
$result = mysql_query($query);
while($row=mysql_fetch_array($result)){

$hp=substr($row[SenderNumber], 3);

$peng=mysql_query("select nama from data_pelanggan where no_hp='$hp'");
$tpeng=mysql_fetch_array($peng);
$jpeng=mysql_num_rows($peng);
if($jpeng==0)
{
$nama=$row[SenderNumber];
}
if($jpeng<>0)
{
$nama=$tpeng[nama];
}
?>
    <li> 
<?php echo "<a class='blue'><b>$nama</b></a> $row[TextDecoded]<br>"; ?> 
<a href='#'  onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ok.php?no_hp=<?php echo"$hp";?>&phoneid=<?php echo"$row[RecipientID]";?>', 'Balas SMS', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')" class="commentopen" style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11; margin: auto; color:#C1C1C1" >Balas SMS . </a> <a class="commentopen" style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11; margin: auto; color:#C1C1C1" href='del.php?id=sms&id_sms=<?php echo "$row[Id]";?>' onclick="return confirm('Apakah anda yakin akan menghapus data poling ini?\n\'Cancel\' untuk membatalkan, \'OK\' untuk menghapus.')">Hapus SMS . </a> <a class="commentopen" style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11; margin: auto; color:#C1C1C1" href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'tambah_group_sms.php?no_hp=<?php echo"$hp";?>&id_sms=<?php echo"$row2[ID]";?>&SenderID=<?php echo"$row2[RecipientID]";?>', 'Pindahkan SMS', 'width=320px,height=250px,center=1,resize=0,scrolling=0', 'recal')">Pindah SMS . </a><a style=" font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11; margin: auto; color:#C1C1C1" ><?php echo "$row[ReceivingDateTime]";?></a>



<!--Link Komentari diatas akan menampilkan dan menghilangkan class commentupdate -->
<div class="commentupdate" style='display:none' id='threatbox<?php echo $id_status; ?>'>
<div class="stcommenttext" >
<?php
$ot=mysql_query("select SenderNumber from inbox where ID='$id_status'");
$tot=mysql_fetch_array($ot);
$inb=mysql_query("select SenderNumber,TextDecoded from inbox where SenderNumber='$tot[SenderNumber]' and ID<>'$id_status'");
while($tinb=mysql_fetch_array($inb))
{
echo "<a class='blue'><b><hr>$nama</b></a> $tinb[TextDecoded]<hr>";
}
?>
</div>
</div>

</li>

<?php } ?>
  </ol>
  
<div class="facebook_style" id="facebook_style">
<a id="<?php echo $id_status1; ?>" href="#" class="load_more" >Tampilkan sms yang lain <img src="arrow1.png" /></a>
</div>
</div>
</body>
</html>
