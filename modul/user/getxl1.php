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
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="38"><span class="nama">Pilih Modem </span> </td>
                          <td>:</td>
                          <td><span class="nama">
                            <?php include'list_modem.php'; ?>
                          </span></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="25%" height="38"><span class="nama">Silakan Pilih File Excel</span></td>
                          <td width="2%">:</td>
                          <td width="67%"><span class="nama">
                            <input name="userfile" type="file" class="teman" size="50" />
                          </span></td>
                          <td width="6%">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="31"><span class="nama">Isi SMS &nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                          <td>:</td>
                          <td><textarea name="isi" cols="30" rows="4" id="isi"></textarea></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="32">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td><span class="nama">
                            <input name="upload" type="submit" class="teman" value="Kirim &gt;&gt;" />
                          </span></td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                      <p>&nbsp;</p>
                      <p>
                        <input name="id" type="hidden" id="id" value="tulis_isi" />
                      </p>
                      <p>&nbsp;</p>
                    </form>
                <p></td></tr></table></p>
                    <p> 