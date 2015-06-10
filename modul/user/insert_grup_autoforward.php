<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>

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
</script>
<body onLoad="MM_preloadImages('images/close_over.gif')"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td><?php
include'../include/conf.php'; 
include'../include/db.php'; 
$p_num=$_POST['p_num'];
$grup=$_POST['grup'];
$pjg_array=count($p_num);
echo"<br><br><br><br><br><br><a class='style1'>Data group autoforward sudah ditambahkan ke pengguna dengan nama </a>";
for ($k=0;$k<$pjg_array;$k++)
	{
	$query = mysql_query("INSERT INTO grup_autoforward (nama_grup,no_hp) VALUES 
	('$grup','$p_num[$k]')");
	$hp=substr($p_num[$k], 1);
	$nam=mysql_query("SELECT nama from data_pelanggan where no_hp='$hp'");
	$t_nam=mysql_fetch_array($nam);
	echo"<a class='style1'>$t_nam[nama], </a>";
	
	}
?>

<br><br><br><br>  
</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><a href="#" onClick="parent.agreewin.hide()" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('close','','images/close_over.gif',1)"><img src="images/close.gif" name="close" width="70" height="25" border="0" id="close" /></a></td>
    <td>&nbsp;</td>
  </tr>
</table>
