<script type="text/javascript" src="modul/poin_acara/ajax.js"></script>
<style type="text/css">
.flexigrid div.fbutton .add {
	background: url(images/add.png) no-repeat center left;
}
.flexigrid div.fbutton .edit {
	background: url(images/edit.png) no-repeat center left;
}
.flexigrid div.fbutton .cmdedit {
	background: url(images/edit.png) no-repeat center left;
}

.flexigrid div.fbutton .delete {
	background: url(images/close.png) no-repeat center left;
}
.flexigrid div.fbutton .refresh {
	background: url(images/refresh.png) no-repeat center left;
}
.hilite{
   background-color: #FFF000;
}
</style>
<?php
include "inc.koneksi.php";
echo "<div id='dalam_content'>
<div id='tampil_data'>
<table class=\"data\" id=\"data\" style=\"display: none\"></table>
</div>";

echo "<div id=\"form_input\">
	<table id='judul' width='100%'>
	<tr>
		<td class='judul' colspan='2'>FORM INPUT POIN KEGIATAN</td>
	</tr>
	</table>
	<table id='InputTable' width='100%'>
	<tr>
		<td class='label'>Id Poin</td>
		<td>:&nbsp;<input type='text' name='kode' id='kode' size='20'  disabled></td>
	</tr>
	<tr>
		<td class='label'>No Anggota</td>
		<td>:&nbsp;<input type='text' name='kodeanggota' id='kodeanggota' size='15' maxlength='15'
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>
		<td class='label'>Nama Anggota</td>
		<td>:&nbsp;<input type='text' id='namaanggota' size='50' class=\"input\" disabled></td>
	</tr>
	<tr>
		<td class='label'>Tanggal </td>
		<td>:&nbsp;<input type='text' name='tgl' id='tgl' size='12' maxlength='12' class=\"input\" data-options=\"required:true\">
		</td>
	</tr>
	<tr>
		<td class='label'>Nama Acara</td>
		<td>:&nbsp;<select name='acara' id='acara' class=\"input\" data-options=\"required:true\">
		<option value=''></option>";
		$q_acara=mysql_query("select * from acara");		  
					while ($row=mysql_fetch_array($q_acara)){
					echo "<option value='$row[id_acara]'>$row[nama_acara]</option>";
					}
				//}
		echo "</select>
		</td>
	</tr>
	<tr>
		<td class='label'>Sie acara</td>
		<td>:&nbsp;<select name='sieacara' id='sieacara' class=\"input\" data-options=\"required:true\">
		<option value=''></option>";
		$q_sie=mysql_query("select * from sie");		  
					while ($row=mysql_fetch_array($q_sie)){
					echo "<option value='$row[id_sie]'>$row[nama_sie]</option>";
					}
				
		echo "</select>
		</td>
	</tr>
	<tr>
		<td class='label'>Jumlah Poin </td>
		<td>:&nbsp;<input type='text' name='jml' id='jml' size='5' maxlength='5'
		class=\"input\" data-options=\"required:true\" disabled></td>
	</tr>
	</table>
	
	<div id='tombol' align='center'>
		<button type='button' id='simpan' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-save'\">Simpan</button>
		<button type='button' id='tambah_data' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\">Tambah</button>
		<button type='button' id='kembali' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-undo'\">Kembali</button>
	</div>
</div>";
echo "</div>";
echo "<div id=\"form_cari_barang\" class=\"easyui-dialog\" title=\"Cari Data Barang\" style=\"padding:5px;width:800px;height:480px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\"></div>";
?>