<?php
session_start();
include'../include/conf.php'; 
include'../include/db.php'; 
include'cek_session.php'; 
$sql=mysql_query("SELECT nama,alamat,email,foto FROM user WHERE user_id='$nama'");
$row=mysql_fetch_array($sql);
?>

<html>
<head>
<meta name="keywords" content="<?=keyword?>">
<meta name="title" content="<?=$title?>">
<meta name="description" content="<?=$description?>">
<meta name="author" content="<?=$author?>">
<meta http-equiv="revisit-after" content="<?=$days?>" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$titleatas?></title>
<link href="css/user.css" rel="stylesheet" type="text/css">
<link href="../css.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript">
<!--
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

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/tambah_artikel_over.gif','images/back_over.gif')">
<!-- ImageReady Slices (Untitled-1) -->
<table width="860" height="701" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
	<tr>
		<td colspan="10">
			<img src="test/images/lptm_01.gif" width="859" height="88" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="88" alt=""></td>
	</tr>
	<tr>
		<td rowspan="11">
			<img src="test/images/lptm_02.gif" width="47" height="612" alt=""></td>
		<td>
			<img src="test/images/lptm_03.gif" width="40" height="20" alt=""></td>
		<td rowspan="4" bgcolor="#ECECEC"><? 
				echo" <img src='$row[foto]' width='118px' height='140px'>";
				?></td>
		<td rowspan="5">
			<img src="test/images/lptm_05.gif" width="19" height="169" alt=""></td>
		<td colspan="2" rowspan="2" bgcolor="#ECECEC"><? 
				echo" <a class='baca'><b>$row[nama]</b><br>$row[alamat]<br><i>$row[email]</i>";
				?></td>
		<td colspan="2" rowspan="3">
			<img src="test/images/lptm_07.gif" width="386" height="119" alt=""></td>
		<td rowspan="8" background="test/images/lptm_08.gif">&nbsp;</td>
		<td rowspan="11">
			<img src="test/images/lptm_09.gif" width="32" height="612" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="20" alt=""></td>
	</tr>
	<tr>
		<td rowspan="4">
			<img src="test/images/lptm_10.gif" width="40" height="149" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="39" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="test/images/lptm_11.gif" width="193" height="60" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="60" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2" background="test/images/lptm_12.gif">&nbsp;</td>
		<td colspan="2" rowspan="2" bgcolor="#FFFFFF">&nbsp;</td>
		<td rowspan="5" bgcolor="#FFFFFF">&nbsp;</td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="21" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="test/images/lptm_15.gif" width="118" height="29" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="29" alt=""></td>
	</tr>
	<tr>
		<td rowspan="3" background="test/images/lptm_16.gif">&nbsp;</td>
		<td colspan="5" rowspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="2%" background="images/ground.gif">&nbsp;</td>
            <td width="21%" valign="top" background="images/ground.gif"><? include'kiri.php'; ?></td>
            <td width="5%">&nbsp;</td>
            <td width="71%" valign="top" bgcolor="#FFFFFF"><form action="insert.php" method="post" name="account" id="account" onSubmit="MM_validateForm('password','','R','nama','','R','alamat','','R');return document.MM_returnValue">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="baca1">

                <tr>
                  <td height="25" colspan="3" align="center" bgcolor="#EFEFDE"><strong>Tambah Pelanggan </strong></td>
                </tr>
                <tr>
                  <td width="2%" height="25" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="20%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="78%" bgcolor="#FFFFFF"><input name="id" type="hidden" id="id" value="update_pelanggan" />
                    <?
				  $produk=mysql_query("SELECT * FROM data_pelanggan WHERE id='$id'");
				  $run=mysql_fetch_array($produk);
				  ?>
                    <input name="no" type="hidden" id="no" value="<?=$run[id];?>" /></td>
                </tr>
                <tr>
                  <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
                  <td align="right" bgcolor="#FFFFFF">Nama : </td>
                  <td bgcolor="#FFFFFF">&nbsp;
                      <input name="nama" type="text" class="baca1" id="nama" value="<?=$run[nama];?>" size="40" /></td>
                </tr>
                <tr>
                  <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
                  <td align="right" bgcolor="#FFFFFF">No HP  : </td>
                  <td bgcolor="#FFFFFF">&nbsp;
                      <input name="no_hp" type="text" class="baca1" id="no_hp" value="0<?=$run[no_hp];?>" size="40" /></td>
                </tr>
                <tr>
                  <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
                  <td align="right" bgcolor="#FFFFFF">Alamat : </td>
                  <td bgcolor="#FFFFFF">&nbsp;
                      <input name="alamat" type="text" class="baca1" id="alamat" value="<?=$run[alamat];?>" size="40" />
                  </td>
                </tr>
                <tr>
                  <td height="27" bgcolor="#FFFFFF">&nbsp;</td>
                  <td align="right" bgcolor="#FFFFFF">Group : </td>
                  <td bgcolor="#FFFFFF">&nbsp;
                    <select name="grup" class="bacas" id="grup">
                      <? $sql1=mysql_query("SELECT * from grup");
while ($a1=mysql_fetch_array($sql1))
{
;
?>
                      <option> <? echo"$a1[nama]";
}
?></option>
                    </select>
&nbsp; &nbsp; <a href="tambah_group.php"><strong>tambah group</strong></a></td>
                </tr>
                <tr>
                  <td height="26" colspan="3" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td height="37" colspan="3" align="center" valign="middle" bgcolor="#EFEFDE"><a onload="MM_preloadImages('images/kirim_over.gif')"> <a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('kirim','','images/kirim_over.gif',1)">
                    <input name="Submit" type="image" value="Submit" src="images/kirim.gif" width="70" height="25" border="0" id="kirim">
                    <img src="images/garis.gif" /> <a href="javascript:history.back(1)" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('back','','images/back_over.gif',1)"><img src="images/back.gif" name="back" width="70" height="25" border="0" id="back" /></a></a></a></td>
                </tr>
              </table>
              <strong class="baca"> <br>
                Note :</strong><br>
  <span class="baca">- Contoh format penomeran HP 085649921023 jangan yang lain </span><br>
            </form></td>
          </tr>
        </table>		
		<p>&nbsp;</p>
      </td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="24" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="test/images/spacer.gif" width="1" height="307" alt=""></td>
	</tr>
	<tr>
		<td colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="26" alt=""></td>
	</tr>
	<tr>
		<td colspan="8">
			<img src="test/images/lptm_21.gif" width="780" height="25" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="25" alt=""></td>
	</tr>
	<tr>
		<td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="2%">&nbsp;</td>
            <td width="98%"><a class="bawah">
              <?=$titlebawah?>
            </a></td>
          </tr>
          
        </table></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="45" alt=""></td>
	</tr>
	<tr>
		<td colspan="8">
			<img src="test/images/lptm_23.gif" width="780" height="16" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="1" height="16" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="test/images/spacer.gif" width="47" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="40" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="118" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="19" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="23" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="170" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="351" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="35" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="24" height="1" alt=""></td>
		<td>
			<img src="test/images/spacer.gif" width="32" height="1" alt=""></td>
		<td></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>