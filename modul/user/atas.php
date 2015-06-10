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

<script type="text/javascript">

			function Ajaxs()
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
							document.getElementById('okdah').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 10000);
						}
					};
					$http.open('GET', 'cek_inbox.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}

			}


		</script>

		<script type="text/javascript">
			setTimeout(function() {Ajaxs();}, 10000);
		</script>
<style type="text/css">
<!--
.style2 {font-size: 11px}
.style3 {
	font-size: 14px;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>

	</body>
</html>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="67%">&nbsp;</td>
    <td width="12%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="style2"><img src="images/atas.png" height="62"></td>
    <td valign="top" class="style3">
	<?php
	$ver=mysql_query("select * from versi");
	$tver=mysql_fetch_array($ver);
	echo"$tver[versi]";
	?>
	</td>
    <td align="left"><table width="594" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%">&nbsp;</td>
        <td width="11%" align="left"><a href="index.php?id=beranda">beranda</a></td>
        <td width="13%" align="left"><a href="inbox.php?id=kotak_masuk">kotak masuk</a></td>
        <td width="6%" align="left"><div id="okdah">
          (<?php echo"$jumunread";?>) 
        </div></td>
        <td width="14%" align="left"> <a href="tulis_sms.php?id=kotak_masuk">tulis SMS</a> </td>
        <td width="17%" align="left"> <a href="data_pelanggan.php?id=data_pelanggan">buku telepon</a> </td>
        <td width="15%" align="left"><a href="seting_autorespond.php?id=autorespond">autorespond</a> </td>
        <td width="20%" align="left"><a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'versi.php', 'Tentang Program Ini', 'width=330px,height=280px,center=1,resize=0,scrolling=0', 'recal')">tentang kami </a></td>
      </tr>
    </table>    </td>
    <td align="right"><span class="style2">
      <?php 
				echo" <b>$row[nama]</b>";
				?>
      <br>
      <a href="my_account.php?id=beranda">profile</a> | <a href="logout.php">logout</a> </span></td>
  </tr>
</table>
