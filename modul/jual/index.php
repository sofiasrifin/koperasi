<script type="text/javascript" src="modul/jual/ajax.js"></script>
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
		<td class='judul' colspan='2'>FORM INPUT / EDIT PENJUALAN</td>
	</tr>
	</table>
	
	<table id='InputTable' width='100%'>
	<tr>
		<td class='label'>Kode Jual</td>
		<td>:&nbsp;<input type='text' name='kode' id='kode' size='20' disabled></td>
		<td class='label'>No Anggota</td>
		<td>:&nbsp;<input type='text' name='kodeanggota' id='kodeanggota' size='15' maxlength='15' 
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>
	</tr>
	<tr>
		<td class='label'>Tanggal </td>
		<td>:&nbsp;<input type='text' name='tgl' id='tgl' size='12' maxlength='12' onkeypress=\"return Pindahtext(this, event)\" 
		class=\"input\" data-options=\"required:true\"></td>
		<td class='label'>Nama Anggota</td>
		<td>:&nbsp;<input type='text' id='namaanggota' size='50' class=\"input1\" disabled></td>
	</tr>
	<tr>
		<td class='label'>Barcode</td>
		<td>:&nbsp;<input type='text' name='barcode' id='barcode' size='15' maxlength='15' onkeypress=\"return Pindahtext(this, event)\" 
		class=\"easyui-validatebox\" data-options=\"required:true\"></td>	
	</tr>
	</table>
	
	<table id='InputTable' width='100%'>
	<tr>
		<th >Kode Barang</th>
		<th >Nama Barang</th>
<!--	<th>Satuan</th>		-->
		<th>Jumlah</th>
		<th>Harga Jual</th>
		<th>Total</th>
		<th>Aksi</th>
	</tr>
	<tr>
		<th><input type='text' name='kodebarang' id='kodebarang' size='15' class=\"easyui-validatebox detail\" data-options=\"required:true\">
		<a href=\"#\" id='cariBarang' title='Cari Kode Barang' class=\"easyui-linkbutton\" data-options=\"plain:true,iconCls:'icon-search'\"></a>
		</th>
		<th><input type='text' name='namabarang' id='namabarang' size='25' class='detail' disabled></th>
<!--	<th><input type='text' name='satuan' id='satuan' size='15' class='detail' disabled></th>	-->
		<th><input type='text' name='jml' id='jml' size='5' onkeypress=\"return Pindahtext(this, event)\" class=\"easyui-validatebox detail\" data-options=\"required:true\"></th>
		<th><input type='text' name='harga' id='harga' size='10' class=\"easyui-validatebox detail\" data-options=\"required:true\" disabled></th>
		<th><input type='text' name='total' id='total' size='15' class='detail' disabled></th>
		<th>
		<a href=\"#\" title='Simpan' id='simpan' class=\"easyui-linkbutton\" data-options=\"plain:true,iconCls:'icon-save'\"></a>
		<a href=\"#\" title='New' id='new' class=\"easyui-linkbutton\" data-options=\"plain:true,iconCls:'icon-new'\"></a>
		</th>
	</tr>
	</table>
	
	<div id='tampil_data_detail'></div>
	<table id='InputTable' width='100%'>
		<tr>
			<td class=label>Bayar</td>
			<td>:&nbsp;<input type='text' name='bayar' id='bayar' size='15' maxlength='15'
			class=\"easyui-validatebox\" data-options=\"required:true\"> </td>
		</tr>
		<tr>
			<td class=label>Kembali</td>
			<td>:&nbsp;<input type='text' name='kembalian' id='kembalian' size='15' maxlength='15'
			class=\"easyui-validatebox\" data-options=\"required:true\"> </td>
		</tr>
	</table>
	<div id='tombol' align='center'>
		<button type='button' id='tambah_data' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-add'\">Tambah Transaksi</button>
		<button type='button' id='cetak' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-print'\">Cetak</button>
		<button type='button' id='kembali' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-undo'\">Kembali</button>
	</div>
</div>";
echo "</div>";
echo "<div id=\"form_cari_barang\" class=\"easyui-dialog\" title=\"Cari Data Barang\" style=\"padding:5px;width:800px;height:480px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\"></div>";
?>





