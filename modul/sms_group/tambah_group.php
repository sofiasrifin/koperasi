<h3> Tambah Group </h3>
<br />
<table>
	<tr>
    	<td><?php print $msg ?></td>
    </tr>
</table>

<br />
<form name="formku" method="post" action="?module=tambahgroup">
ID Group <input type="text" name="idgroup" size="5"> Nama Group (tanpa spasi) : <input type="text" name="group"> 
<button name="save" style="border: 1px solid #666; background-color:#fff" tabindex=6>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
<button name="cancel" style="border: 1px solid #666; background-color:#fff" tabindex=7>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></td>
<!--
<input type="submit" name="submit" value="Simpan Group" class='tombolku'>
<input type="submit" name="submit" value="Simpan Group" class='tombolku'>
-->
<br><br>
<b>Keterangan:</b><br><br>
Masukkan nomor ID group berupa angka misalnya: 1, 2, atau 3 dst. <br>Nomor ID Group harus unik (tidak boleh sama dengan group lain)
</form>
<?php
	include 'inc.koneksi.php';
	
	if(isset($_POST['save'])){
		$group = $_POST['group'];
   		$idgroup = $_POST['idgroup'];
	
   	$insert = mysql_query ("INSERT INTO sms_group(`group`, idgroup) VALUES ('$group', '$idgroup')");
		if($insert){
			echo "<p><b>Group Berhasil Disimpan</b></p>";
		?>
        <script language="javascript">
			setTimeout('self.location.href="?module=phonebook"',1000);
        </script>
	<?php
		}
	} else if (isset($_POST['cancel'])){
		echo "<p><b>Tambah Group Dibatalkan</b></p>";
?>
		<script language="javascript">
			setTimeout('self.location.href ="?module=phonebook"',500);
        </script>
<?php		
	}
?>
</body>
</html>