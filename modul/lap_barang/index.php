<script type="text/javascript" src="modul/lap_barang/ajax.js"></script>
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
		<td class='judul' colspan='2'>LAPORAN DATA BARANG</td>
	</tr>
	</table>
	<table id='InputTable' width='100%'>
	<tr>
		<td class='label'><input type='radio' value='semua' name='radio' checked='checked' class='pilih'>Semua</td>
		<td></td>
	</tr>
	<tr>
		<td class='label'><input type='radio' value='kode' name='radio' class='pilih'>Kode Barang</td>
		<td>:&nbsp;
		<select name='cbo_kode1' id='cbo_kode1'>
		<option value='' selected>-Pilih-</option>";
		$sql	= mysql_query("SELECT * FROM barang");
		while($rows=mysql_fetch_array($sql)){
			echo "<option value='$rows[kode_barang]'>$rows[kode_barang] - $rows[nama_barang]</option>";
		}
		echo "</select>
		&nbsp; s/d &nbsp;
		<select name='cbo_kode2' id='cbo_kode2'>
		<option value='' selected>-Pilih-</option>";
		$sql	= mysql_query("SELECT * FROM barang");
		while($rows=mysql_fetch_array($sql)){
			echo "<option value='$rows[kode_barang]'>$rows[kode_barang] - $rows[nama_barang]</option>";
		}
		echo "</select>
		&nbsp;</td>
	</tr>
	<tr>
		<td class='label'><input type='radio' value='satuan' name='radio' class='pilih'>Satuan</td>
		<td>:&nbsp;
		<select name='cbo_satuan' id='cbo_satuan'>
		<option value='' selected>-Pilih-</option>";
		$sql	= mysql_query("SELECT satuan FROM barang GROUP BY satuan");
		while($rows=mysql_fetch_array($sql)){
			echo "<option value='$rows[satuan]'>$rows[satuan]</option>";
		}
		echo "</select>
		</td>
	</tr>
	<tr>
		<td class='label'><input type='radio' value='namabarang' name='radio' class='pilih'>Nama Barang</td>
		<td>:&nbsp;
		<input type='text' id='namabarang' size='30' maxlength='50'>
		</td>
	</tr>
	<tr>
		<td class='label' align='center'>Urut Berdasarkan</td>
		<td>:&nbsp;
		<select name='cbo_urut' id='cbo_urut'>";
		$sql	= mysql_query("show columns from barang");
		while($rows=mysql_fetch_array($sql)){
			echo "<option value='$rows[Field]'>$rows[Field]</option>";
		}
		echo "</select>
		</td>
	</tr>

	</table>
	<div id='tombol' align='center'>
		<button type='button' id='lihat' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-search'\">Lihat</button>
		<button type='button' id='cetak' class=\"easyui-linkbutton\" data-options=\"iconCls:'icon-print'\">Cetak</button>
	</div>
</div>";
echo "<div id='tampil_data' align='center'></div>";
echo "<div id='paging_button' align='left'></div>";
?>