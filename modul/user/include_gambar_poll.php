<?php
include'../include/conf.php'; 
include'../include/db.php';
$id_poll=$_GET['id_poll'];
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

			function cekinbox()
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
							document.getElementById('cekinbox').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 5000);
						}
					};
					$http.open('GET', 'include_gbr_poll1.php' + '?id_poll=<?php echo $id_poll;?>', true);
					$http.send(null);
				}

			}

  </script>


		<script type="text/javascript">
			setTimeout(function() {cekinbox();}, 5000);
		</script>

<script type="text/javascript" src="jquery.min.js"></script>


<script type="text/JavaScript">
<!--



<!--

//-->

			setTimeout(function() {cektemplate();}, 10000);//-->
</script>
		
          <div id="cekinbox">
            <table width="100%" class='adminlist'>
<?php
$warnaGenap = "#E0E0E0";   // warna abu-abu
$warnaGanjil = "#F5F5F5";  // warna putih
$counter = 1;
$foto=mysql_query("select jawaban,foto,jumlah from poll where id_poll='$id_poll'");
while($tfoto=mysql_fetch_array($foto))
{
if ($counter % 2 == 0) $warna = $warnaGenap;
else $warna = $warnaGanjil;
?>
              <tr bgcolor='<?php echo $warna;?>' class='baca1'>
                <td width="41%"><a href='#' onClick="agreewin=dhtmlmodal.open('agreebox', 'iframe', 'ganti_gambar_poll.php?jawaban=<?php echo $tfoto[jawaban];?>&foto=<?php echo $tfoto[foto];?>', 'Ganti Gambar Polling', 'width=320px,height=200px,center=1,resize=0,scrolling=0', 'recal')"><?php echo"<img src='$tfoto[foto]' width='32px' height='40'></a>"; ?></td>
                <td width="59%" align="center" bgcolor="<?php echo $warna;?>"><?php echo"$tfoto[jawaban]<br><strong>$tfoto[jumlah]</strong>"; ?></td>
              </tr>
<?php
$counter++;
}
?>
            </table>
          </div>
          <p><br />
            *  
            Klik gambar untuk mengganti gambar </p>
          