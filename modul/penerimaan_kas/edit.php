
<?php
echo "<div id='dalam_content'>
<div id='tampil_data'>
<table class=\"data\" id=\"data\" style=\"display: none\"></table>
</div>";

if ($_GET[id]<>'' || (isset($_POST['save'])) || (isset($_POST['cancel'])))
	//$kode=$_GET[edit];
	$id	= $_GET[id];
	$q_esupp=mysql_query("SELECT c.no_jurnal, c.tgl, c.uraian, b.kode_akun, b.nama_akun, debet, kredit
							FROM d_jurnal AS a
							JOIN akun AS b
							JOIN jurnal AS c ON a.kode_akun = b.kode_akun
							AND a.no_jurnal = c.no_jurnal
							WHERE a.no_jurnal='$id'")or die(mysql_error());	
	$q_esp=mysql_fetch_array($q_esupp);
?>

<?php
		if (isset($_POST['save'])){
	
		$id				=str_replace("'","\'",$_POST[id]);
		$tgl			=jin_date_sql($_POST[tgl]);
		$keterangan		=str_replace("'","\'",$_POST[keterangan]);
		$kodeakun		=str_replace("'","\'",$_POST[kodeakun]);
		$namaakun		=str_replace("'","\'",$_POST[namaakun]);
		$debetkredit	=str_replace("'","\'",$_POST[debetkredit]);
		$jml			=str_replace("'","\'",$_POST[jml]);
		
		if($debetkredit=='debet'){
		$inputD = " UPDATE $tableD SET
					debet		= '$jml',
					kredit		= '0'
					WHERE no_jurnal='$id'";	
		mysql_query($inputD);		
		}elseif($debetkredit=='kredit'){
		$inputD = "UPDATE $tableD SET
					kredit		= '$jml',
					debet		= '0'
					WHERE no_jurnal='$id'";	
		mysql_query($inputD);
		$mssg='Perubahan disimpan! ';
	?>
		<script language="javascript">
 			setTimeout('self.location.href ="?module=jurnal"',500);
		</script>
<?php
		}
	 }else if (isset($_POST['cancel'])){
		echo "<p><b>Tambah Berita Dibatalkan</b></p>";
?>
		<script language="javascript">
			setTimeout('self.location.href ="?module=jurnal"',500);
        </script>
<?php		
	}
?>


<form action="?module=edit_jurnal" method="post">
<?php
echo "<div id=\"form_input\">
	<table id='judul' width='100%'>
	<tr>
		<td class='judul' colspan='2'>FORM INPUT JURNAL UMUM</td>
	</tr>
	</table>";
?>
	<table id='theList' width='100%'>
	<tr>
		<td class='label'>Kode Jurnal</td>
		<td>:&nbsp;<input type='text' name='kode' id='kode' size='20' value='<?php $q_esp['no_jurnal'] ?>' maxlength='20' disabled></td>
	</tr>
	
	<tr>
		<td class='label'>Tanggal </td>
		<td>:&nbsp;<input type='text' name='tgl' id='tgl' value='<?php $q_esp['tgl'] ?>' size='15' maxlength='15'
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>
	</tr>
	<tr>
		<td class='label'>Keterangan</td>
		<td>:&nbsp;<input type='text' name='keterangan' value='<?php $q_esp['uraian'] ?>' id='keterangan' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>
	</tr>
	<tr>
		<td class='label'>Kode Akun</td>
		<td>:&nbsp;<input type='text' name='kodeakun' id='kodeakun' value='<?php $q_esp['kode_akun'] ?>' size='15' maxlength='15'
		class=\"easyui-validatebox\" data-options=\"required:true\">
		<?php
        echo "<a href=\"#\" id='cariAkun' title='Cari Kode Akun' class=\"easyui-linkbutton\" data-options=\"plain:true,iconCls:'icon-search'\"></a>";
		?>
		</td>
	</tr>
	<tr>
		<td class='label'>Nama Akun</td>
		<td>:&nbsp;<input type='text' name='namaakun' value='<?php $q_esp['nama_akun'] ?>' id='namaakun' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true\" disabled></td>
	</tr>
	<tr>
		<td class='label'>Debet</td>
		<td>:&nbsp;<select name='debetkredit' id='debetkredit' class=\"easyui-validatebox\" data-options=\"required:true\">
							<option value='debet'>Debet</option>
							<option value='kredit'>Kredit</option>
					</select>			
		</td>
	</tr>
	<tr>
		<td class='label'>Jumlah</td>
		<td>:&nbsp;<input type='text' name='jml' id='jml' value='<?php $q_esp['jml'] ?>' size='20' maxlength='20'
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>
	</tr>
	</table>
	
	<div id='tombol' align='center'>
		<button name='simpan' id='simpan' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-save'\">Simpan</button>
	<!-- <button type='button' id='tambah_data' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\">Tambah</button>	-->
		<button name='cancel' id='kembali' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-undo'\">Kembali</button>
	</div>
	
</div>
</form>

<?php	

echo "</div>";
echo "<div id=\"form_cari_akun\" class=\"easyui-dialog\" title=\"Cari Data Barang\" style=\"padding:5px;width:800px;height:480px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\"></div>";
?>