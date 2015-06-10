<script type="text/javascript" src="modul/lap_bukubesar/ajax.js"></script>
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
		<td class='judul' colspan='2'>LAPORAN BUKU BESAR</td>
	</tr>
	</table>
	
	<table id='InputTable' width='100%'>
	<tr>
		<td class='label'>Kode Akun</td>
		<td>:&nbsp;
		<select name='cbo_kode1' id='cbo_kode1'>
		<option value='' selected>-Pilih-</option>";
		$sql	= mysql_query("SELECT * FROM akun WHERE kode_akun ORDER BY kode_akun asc");
		while($rows=mysql_fetch_array($sql)){
			echo "<option value='$rows[kode_akun]'>$rows[kode_akun] - $rows[nama_akun]</option>";
		}
		echo "</select>
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