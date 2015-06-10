<?php
include'../include/conf.php'; 
include'../include/db.php';

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



<script type="text/javascript" src="jquery.min.js"></script>

<script src="getxl.js"></script>
<script src="getxl1.js"></script>

<script type="text/JavaScript">
<!--
<!--

//-->

			setTimeout(function() {cektemplate();}, 10000);

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
//-->
</script>

		
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <!--DWLayoutTable-->
            <tr>
              <td valign="middle" class="nama"><input name="radiobutton" type="radio" onClick="showUser(this.value)" value="0" checked="checked"/>
              include isi SMS (<a href="include_isi_sms.xls">lihat contoh</a>)  
                <input name="radiobutton" type="radio" value="1" onClick="showUser1(this.value)"/>

      Tulis sendiri isi sms (<a href="tulis_isi_sms.xls">lihat contoh</a>)</td>
              <td height="41" align="right" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
            </tr>
            <tr>
              <td height="26" colspan="2">
                <div id="txtHint">
                  <div id="cekinbox">
                    <p>
                      <?php

   echo"<center><table width=100% class='adminlist'>";
   echo "<tr>
    </tr>";

echo "<tr class='row0'><td class='normal'align='left'>";
?>
                    </p>
                    <p class="nama">&nbsp;</p>
                    <p class="nama"><br />
                      <span class="warkecil">Mohon dilihat terlebih dahulu contoh format yang akan dikirimkan. Untuk mengurangi kesalahan </span></p>
                    <form method="post" enctype="multipart/form-data" action="process.php">
                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="23%" height="30"><span class="nama">Pilih Modem </span></td>
                          <td width="2%">:</td>
                          <td width="75%"><font size="1"><span class="tulisan">
                            <?php include'list_modem.php'; ?>
                          </span></font></td>
                        </tr>
                        <tr>
                          <td height="34"><span class="nama">Silakan Pilih File Excel</span></td>
                          <td>:</td>
                          <td><span class="nama">
                            <input name="userfile" type="file" class="teman" size="50" />
                            <input name="upload" type="submit" class="teman" value="Kirim &gt;&gt;" />
                          </span></td>
                        </tr>
                      </table>
                      <p>&nbsp;</p>
                      <p><br />
                      </p>
                      <p>
                        <input name="id" type="hidden" id="id" value="include_isi" />
                      </p>
                      <p>&nbsp;</p>
                    </form>
                <p></td></tr></table></p>
                    <p>&nbsp;</p>
                    <p> 
                  </div>
                      </div>

              </p></td>
            </tr>
          </table>
    </td>
  </tr>
</table>
