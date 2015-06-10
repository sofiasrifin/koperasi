<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
include'cek_session.php'; 
if ($status<>admin)
{
header("Location:../denied.php");
}

?>
<HTML>
<HEAD>
<meta name="keywords" content="<?=keyword?>">
<meta name="title" content="<?=$title?>">
<meta name="description" content="<?=$description?>">
<meta name="author" content="<?=$author?>">
<meta http-equiv="revisit-after" content="<?=$days?>" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$titleatas?></title>
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
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
</HEAD>

<BODY LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 onLoad="MM_preloadImages('images/tambah_artikel_over.gif','images/tambah_report_over.gif','images/back_over.gif')">
<!-- ImageReady Slices (web.psd) -->
<TABLE WIDTH=800 BORDER=0 align="center" CELLPADDING=0 CELLSPACING=0>
  <!--DWLayoutTable-->
  <TR>
    <TD COLSPAN=3 ROWSPAN=3><IMG SRC="../images/web_01.gif" WIDTH=117 HEIGHT=158 ALT=""></TD>
    <TD COLSPAN=4><IMG SRC="../images/web_02.gif" WIDTH=683 HEIGHT=45 ALT=""></TD>
  </TR>
  <TR>
    <TD height="19" COLSPAN=3><IMG SRC="../images/web_03.gif" WIDTH=672 HEIGHT=19 ALT=""></TD>
    <TD width="11" ROWSPAN=4 valign="top"><!--DWLayoutEmptyCell-->&nbsp;</TD>
  </TR>
  <TR>
    <TD width="311" height="94"><IMG SRC="../images/web_05.gif" WIDTH=311 HEIGHT=94 ALT=""></TD>
    <TD width="336" ROWSPAN=2><IMG SRC="../images/web_06.gif" WIDTH=336 HEIGHT=117 ALT=""></TD>
    <TD width="25" ROWSPAN=3 valign="top" background="../images/web_07.gif"><!--DWLayoutEmptyCell-->&nbsp;</TD>
  </TR>
  <TR>
    <TD height="23" COLSPAN=4><IMG SRC="../images/web_08.gif" WIDTH=428 HEIGHT=23 ALT=""></TD>
  </TR>
  <TR>
    <TD colspan="2" valign="top" background="../images/web_09.gif"><!--DWLayoutEmptyCell-->&nbsp;</TD>
    <TD COLSPAN=3 bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top" background="../images/web_10.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="8%">&nbsp;</td>
            <td width="92%"><? include'kiri.php'; ?></td>
          </tr>

        </table></td>
        <td width="2%">&nbsp;</td>
        <td width="69%" valign="top"><form id="account" name="account" method="post" action="insert.php">
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="baca1">
            <tr>
              <td width="2%" height="25" bgcolor="#FFFFFF">&nbsp;</td>
              <td colspan="2" align="center" bgcolor="#FFFFFF"><?
	$user=mysql_query("SELECT * FROM user WHERE no='$no'");
	$tampil=mysql_fetch_array($user);
	
	?></td>
            </tr>
            <tr>
              <td height="25" colspan="3" align="center" bgcolor="#EFEFDE"><strong>TAMBAH USER </strong></td>
            </tr>
            <tr>
              <td height="25">&nbsp;</td>
              <td width="35%" align="right">&nbsp;</td>
              <td width="63%"><input name="id" type="hidden" id="id" value="user" /></td>
            </tr>
            <tr>
              <td height="31">&nbsp;</td>
              <td align="right">User ID  : </td>
              <td>&nbsp;
                <input name="user_id" type="text" class="baca" id="user_id" value="<?=$tampil[user_id];?>" size="40" /></td>
            </tr>
            <tr>
              <td height="27">&nbsp;</td>
              <td align="right">Password : </td>
              <td>&nbsp;
                <input name="password" type="password" class="baca" id="password" size="40" /></td>
            </tr>
            <tr>
              <td height="27">&nbsp;</td>
              <td align="right">Nama : </td>
              <td>&nbsp;
                <input name="nama" type="text" class="baca" id="nama" size="40" /></td>
            </tr>
            <tr>
              <td height="27">&nbsp;</td>
              <td align="right">Alamat : </td>
              <td>&nbsp;
                  <input name="alamat" type="text" class="baca" id="alamat" size="60" />              </td>
            </tr>
            <tr>
              <td height="31">&nbsp;</td>
              <td align="right">Jenis Kelamin : </td>
              <td>&nbsp;
                <select name="jenis_kelamin" class="baca" id="jenis_kelamin">
                  <option value="laki-laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                </select></td>
            </tr>
            <tr>
              <td height="31">&nbsp;</td>
              <td align="right">Status : </td>
              <td>&nbsp;
                <select name="status" class="baca" id="status">
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                                </select></td>
            </tr>
            <tr>
              <td height="29">&nbsp;</td>
              <td align="right">TTL : </td>
              <td>&nbsp;<span class="yregbelowfield">
                <input name="tanggal" type="text" class="baca" size="2"  maxlength="2" autocomplete="off" />
                &nbsp;
                <select name="bulan" class="baca" id="bulan">
                  <option value="Januari">Januari</option>
                  <option value="Februari">Februari</option>
                  <option value="Maret">Maret</option>
                  <option value="April">April</option>
                  <option value="Mei">Mei</option>
                  <option value="Juni">Juni</option>
                  <option value="Juli">Juli</option>
                  <option value="Agustus">Agustus</option>
                  <option value="September">September</option>
                  <option value="Oktober">Oktober</option>
                  <option value="November">November</option>
                  <option value="Desember">Desember</option>
                </select>
                &nbsp;
                <input name="tahun" type="text" class="baca" id="tahun" size="4" maxlength="4" autocomplete="off" />
              </span><span class="berita">Tanggal / Bulan / Tahun </span></td>
            </tr>
            <tr>
              <td height="31">&nbsp;</td>
              <td align="right">Telp / HP :</td>
              <td>&nbsp;
                  <input name="telp_hp" type="text" class="baca" id="telp_hp" size="40" /></td>
            </tr>
            <tr>
              <td height="31">&nbsp;</td>
              <td align="right">E-Mail :</td>
              <td>&nbsp;
                  <input name="email" type="text" class="baca" id="email" size="40" /></td>
            </tr>
            <tr>
              <td height="26" colspan="3" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td height="25" colspan="3" align="center" valign="middle" bgcolor="#EFEFDE"><a onload="MM_preloadImages('images/kirim_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('kirim','','images/kirim_over.gif',1)">
                <input name="Submit" type="image" value="Submit" src="images/kirim.gif" name="kirim" width="70" height="25" border="0" id="kirim">
                <img src="images/garis.gif" /> <a href="javascript:history.back(1)" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('back','','images/back_over.gif',1)"><img src="images/back.gif" name="back" width="70" height="25" border="0" id="back" /></a></a></td>
            </tr>
            <tr>
              <td height="25" colspan="3" align="center" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          </table>
        </form>
          <br>
          <br></td><td width="5%">&nbsp;</td>
      </tr>

    </table></TD>
  </TR>
  
  <TR>
    <TD height="25" COLSPAN=7 valign="top"><IMG SRC="../images/web_13.gif" WIDTH=800 HEIGHT=25 ALT=""></TD>
  </TR>
  <TR>
    <TD width="22" rowspan="2" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</TD>
    <TD width="14" height="2"></TD>
    <TD width="81"></TD>
    <TD></TD>
    <TD></TD>
    <TD></TD>
    <TD></TD>
  </TR>
  <TR>
    <TD height="37" colspan="4"><a class="bawah">
	<?=$titlebawah?></a></TD>
    <TD></TD>
    <TD></TD>
  </TR>
</TABLE>
<!-- End ImageReady Slices -->
</BODY>
</HTML>