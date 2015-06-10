<?php
include'../include/db.php';
$id=$_GET['id'];
$group=mysql_query("SELECT * FROM grup where id='$id'");
$tgroup=mysql_fetch_array($group);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>
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
</head>

<body onload="MM_preloadImages('images/back_over.gif')">
<form action="insert.php" method="post" name="form1" id="form1">
  <div style="padding: 5px">
    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="baca1">

      <tr valign="middle">
        <td height="27" align="center" bgcolor="#FFFFFF" class="style1">&nbsp;</td>
        <td valign="bottom" bgcolor="#FFFFFF" class="style1">Silahkan masukkan group yang akan ditambahkan </td>
      </tr>
      <tr valign="middle">
        <td height="19" align="center" bgcolor="#FFFFFF" class="style1">&nbsp;</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr valign="middle">
        <td width="12%" height="27" align="center" bgcolor="#FFFFFF" class="style1">&nbsp;</td>
        <td width="88%" bgcolor="#FFFFFF"><input name="nama" type="text" class="baca1" id="nama" value="<?php echo"$tgroup[nama]";?>" size="30" />
        <input name="id" type="hidden" id="id" value="update_group" />
        <input name="nama_lama" type="hidden" id="nama_lama" value="<?php echo"$tgroup[nama]";?>" />
        <input name="no" type="hidden" id="no" value="<?php echo"$id";?>" /></td>
      </tr>
      <tr>
        <td height="26" colspan="2" align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td height="37" align="center" valign="middle"><a onload="MM_preloadImages('images/kirim_over.gif')"> <a onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('kirim','','images/kirim_over.gif',1)"></a></a></td>
        <td height="37" align="left" valign="middle"><a onload="MM_preloadImages('images/kirim_over.gif')"><a onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('kirim','','images/kirim_over.gif',1)">
          <input name="Submit" type="image" value="Submit" src="images/kirim.gif" width="70" height="25" border="0" id="kirim" onClick="parent.agreewin.hide()"/>
        </a></a></td>
      </tr>
    </table>
  </div>
  </form>
</body>
</html>
