<p>
<?php
include'../include/db.php'; 

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