<script type="text/javascript" src="modul/penerimaan_kas/ajax.js"></script>
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
echo "<div id='dalam_content'>
<div id='tampil_data'>
<table class=\"data\" id=\"data\" style=\"display: none\"></table>
</div>";

echo "<div id=\"form_input\">
	<table id='judul' width='100%'>
	<tr>
		<td class='judul' colspan='2'>FORM INPUT PENERIMAAN KAS</td>
	</tr>
	</table>
	<table id='theList' width='100%'>
	<tr>
		<td class='label'>Kode Jurnal</td>
		<td>:&nbsp;<input type='text' name='kode' id='kode' size='20' maxlength='20' disabled></td>
	</tr>
	
	<tr>
		<td class='label'>Tanggal </td>
		<td>:&nbsp;<input type='text' name='tgl' id='tgl' size='15' maxlength='15'
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>
	</tr>
	<tr>
		<td class='label'>Keterangan</td>
		<td>:&nbsp;<input type='text' name='keterangan' id='keterangan' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>
	</tr>
	<tr>
		<td class='label'>Kode Akun</td>
		<td>:&nbsp;<input type='text' name='kodeakun' id='kodeakun' size='15' maxlength='15'
		class=\"easyui-validatebox\" data-options=\"required:true\">
		<a href=\"#\" id='cariAkun' title='Cari Kode Akun' class=\"easyui-linkbutton\" data-options=\"plain:true,iconCls:'icon-search'\"></a>
		</td>
	</tr>
	<tr>
		<td class='label'>Nama Akun</td>
		<td>:&nbsp;<input type='text' name='namaakun' id='namaakun' size='50' maxlength='50'
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
		<td>:&nbsp;<input type='text' name='jml' id='jml' size='20' maxlength='20'
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>
	</tr>
	</table>
	
	<div id='tombol' align='center'>
		<button type='button' id='simpan' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-save'\">Simpan</button>
		<button type='button' id='tambah_data' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\">Tambah</button>
		<button type='button' id='kembali' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-undo'\">Kembali</button>
	</div>
	
</div>";

echo "</div>";
echo "<div id=\"form_cari_akun\" class=\"easyui-dialog\" title=\"Cari Data Barang\" style=\"padding:5px;width:800px;height:480px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\"></div>";
?>