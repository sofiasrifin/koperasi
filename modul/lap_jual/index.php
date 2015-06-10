<script type="text/javascript" src="modul/lap_jual/ajax.js"></script>
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
echo "<div id=\"form_input\">
	<table id='judul' width='100%'>
	<tr>
		<td class='judul' colspan='2'>LAPORAN PENJUALAN</td>
	</tr>
	</table>
	<table id='InputTable' width='100%'>
	<tr>
		<td class='label' width='30%'><input type='radio' value='semua' name='radio' checked='checked' class='pilih'>Semua</td>
		<td></td>
	</tr>
	<tr>
		<td class='label'><input type='radio' value='tgl' name='radio' class='pilih'>Tanggal</td>
		<td>:&nbsp;
		<input type='text' id='tgl1' size='10'>
		&nbsp; s/d &nbsp;
		<input type='text' id='tgl2' size='10'>
		&nbsp;</td>
	</tr>
	<tr>
		<td class='label'><input type='radio' value='costum' name='radio' class='pilih'>Berdasarkan &nbsp;
		<select name='cbo_field' id='cbo_field'>";
		$sql	= mysql_query("show columns from h_jual");
		while($rows=mysql_fetch_array($sql)){
			echo "<option value='$rows[Field]'>$rows[Field]</option>";
		}
		echo "
		<option value='kode_barang'>kode_barang</option>
		</select>
		</td>
		<td>:&nbsp; <input id='text' size='35'>
		</td>
	</tr>
	<tr>
		<td class='label' align='center'>Urut Berdasarkan</td>
		<td>:&nbsp;
		<select name='cbo_urut' id='cbo_urut'>";
		$sql	= mysql_query("show columns from h_jual");
		while($rows=mysql_fetch_array($sql)){
			echo "<option value='$rows[Field]'>$rows[Field]</option>";
		}
		echo "
		<option value='kode_barang'>kode_barang</option>
		</select>
		</td>
	</tr>

	</table>
	<div id='tombol' align='center'>
		<button type='button' id='lihat' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-search'\">Lihat</button>
		<button type='button' id='cetak' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-print'\">Cetak PDF</button>
	</div>
</div>";
echo "<div id='tampil_data' align='center'></div>";
echo "<div id='paging_button' align='left'></div>";
?>