<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
include'cek_session.php'; 

$sql=mysql_query("SELECT nama,alamat,email,foto FROM user WHERE user_id='$nama'");
$row=mysql_fetch_array($sql);
?>

<link href="../css.css" rel="stylesheet" type="text/css">
<link href="css/user.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
</script>
<body>
<form name="form1" method="post" action="update_user.php">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="baca1">
    <tr>
      <td width="2%" height="25" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="17%" align="right" bgcolor="#FFFFFF"><strong>
        <?php
	$no=$_GET['no'];	
	$user=mysql_query("SELECT * FROM user WHERE no='$no'");
	$tampil=mysql_fetch_array($user);
	
	?>
      </strong></td>
      <td width="81%" bgcolor="#FFFFFF"><input name="id" type="hidden" id="id" value="update_user" />
          <input name="no" type="hidden" id="no" value="<?php echo"$tampil[no]";?>" /></td>
    </tr>
    <tr>
      <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF">Password </td>
      <td bgcolor="#FFFFFF">&nbsp;:
        <input name="pass" type="password" class="baca1" id="pass" size="30" />
        * </td>
    </tr>
    <tr>
      <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF">Nama </td>
      <td bgcolor="#FFFFFF">&nbsp;:
        <input name="nama" type="text" class="baca1" id="nama" value="<?php echo"$tampil[nama]";?>" size="30" /></td>
    </tr>
    <tr>
      <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF">Alamat </td>
      <td bgcolor="#FFFFFF">&nbsp;:
        <input name="alamat" type="text" class="baca1" id="alamat" value="<?php echo"$tampil[alamat]";?>" size="30" />      </td>
    </tr>
    <tr>
      <td height="31" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF">Telp / HP </td>
      <td bgcolor="#FFFFFF">&nbsp;:
        <input name="telp_hp" type="text" class="baca1" id="telp_hp" value="<?php echo"$tampil[telp_hp]";?>" size="30" /></td>
    </tr>
    <tr>
      <td height="31" bgcolor="#FFFFFF">&nbsp;</td>
      <td align="left" bgcolor="#FFFFFF">E-Mail </td>
      <td bgcolor="#FFFFFF">&nbsp;:
        <input name="email" type="text" class="baca1" id="email" value="<?php echo"$tampil[email]";?>" size="30" /></td>
    </tr>
    <tr>
      <td height="26" align="left" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="26" align="left" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="26" align="left" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%" valign="top">* </td>
            <td width="95%" class="atas">Jika anda mengganti password, wajib logout terlebih dahulu. Kosongkon bila tidak ingin mengubah password </td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="37" colspan="3" align="center" valign="middle" bgcolor="#EFEFDE"><a onload="MM_preloadImages('images/kirim_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('kirim','','images/kirim_over.gif',1)">
        <input name="Submit" type="image" value="Submit" src="images/kirim.gif" width="70" height="25" border="0" id="kirim" onClick="parent.agreewin.hide()">
      </a></a></td>
    </tr>
  </table>
</form>
