<?php
$id_poll=$_GET['id_poll'];
include'../include/db.php';
$cek=mysql_query("SELECT * FROM ket_poll where id_poll='$id_poll'");
$tcek=mysql_fetch_array($cek);
$wak=$tcek['autorefresh']/1000;
?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>

<script type="text/JavaScript">
<!--
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
//-->
</script>
<form action="insert.php" method="post" name="form1" onsubmit="MM_validateForm('autorefresh','','R');return document.MM_returnValue">
  <table width="351" border="0" cellpadding="0" cellspacing="0" class="style1">
    <tr>
      <td width="2%">&nbsp;</td>
      <td width="33%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td width="61%">&nbsp;</td>
    </tr>
    <tr>
      <td height="36">&nbsp;</td>
      <td>ID Polling </td>
      <td>:</td>
      <td><?=$id_poll;?>&nbsp;
      <input name="id" type="hidden" id="id" value="edit_graph" />
      <input name="id_poll" type="hidden" id="id_poll" value="<?=$id_poll;?>" /></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Judul Grafik </td>
      <td>:</td>
      <td><input name="judul_grafik" type="text" id="judul_grafik" value="<?php echo $tcek['judul_grafik'];?>" size="30" /></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Jenis Grafik </td>
      <td>:</td>
      <td><select name="jenis_grafik" id="jenis_grafik">
        <option value="glass_bar">bar glass</option>
        <option value="sketch">sketch</option>
        <option value="fade">fade</option>
        <option value="bar">bar</option>
      </select></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td>Autorefresh</td>
      <td>:</td>
      <td><input name="autorefresh" type="text" id="autorefresh" value="<?php echo $wak;?>" size="5" />      
      dalam second </td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td>Ket Poling </td>
      <td>:</td>
      <td><textarea name="ket_poll" cols="26" rows="4" id="ket_poll"><?=$tcek['ket_poll'];?>
      </textarea></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="  kirim  " onclick="parent.agreewin.hide()"/></td>
    </tr>
  </table>
  <p class="style1">&nbsp;</p>
</form>
