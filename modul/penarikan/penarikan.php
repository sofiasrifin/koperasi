<script language="javascript" src="modul/penarikan/ajax.js"></script>
<style type="text/css">
button {
	margin: 2px; 
	position: relative; 
	padding: 4px 8px 4px 4px; 
	cursor: pointer;   
	list-style: none;
}
button span.ui-icon {
	float: left; 
	margin: 0 4px;
}
#menu-tombol {
	padding-bottom:10px;
	padding:5px 5px 5px 5px;
	margin-bottom:20px;
}
#tombol-tambah{
	float:left;
	width:250px;
}
#tombol-cari{
	float:right;
	width:500px;
	text-align:right;
}
#tampil_data2,#tampil_data3{
	margin-top:30px;
}
/*
#info_anggota{
	position:absolute;
	padding:5px 5px 5px 5px;
	background-color:#FFF;
	width:450px;
	border:3px solid #5c9fe9;
	-moz-border-radius: 5px 5px 5px 5px; 
	-webkit-border-radius: 5px 5px 5px 5px; 
	border-radius: 5px 5px 5px 5px; 
	-moz-box-shadow:0px 0px 20px #aaa;
    -webkit-box-shadow:0px 0px 20px #aaa;
    box-shadow:0px 0px 20spx #aaa;
	z-index:200px;
	float:right;
	left:350px;
}
*/
</style>
<?php
echo "<div id='dalam_content'>
<h2>PENGAMBILAN SIMPANAN ANGGOTA</h2>
<div class=\"easyui-tabs\" style=\"width:auto;height:auto\">
<div title=\"Simpanan\" style=\"padding:10px\">
	<div class=\"easyui-tabs\" style=\"width:380px;height:auto;float:right;\">
	<div id='info_anggota' title=\"Info Anggota\" style=\"padding:5px\">
	</div>
	</div>	
	<div id=\"p\" class=\"easyui-panel\" title=\"Anggota\" style=\"float:left;width:550px;padding:5px;margin-buttom:10px;\">
	<table width='100%'>
	<tr>
	<td width='25%'>ID</td>
	<td width='2%'>:</td>
	<td><input type='text' id='id' size='5' value='AUTO' readonly></td>
	</tr>
	<td width='15%'>Nomor Anggota</td>
	<td width='2%'>:</td>
	<td><input type='text' id='nomor' size='15' class='input'>
	<input type='hidden' id='saldo' size='15' class='input'>
	</td>
	</tr>
	<tr>
	<td width='15%'>Tanggal</td>
	<td width='2%'>:</td>
	<td><input type='tgl' id='tgl' size='12' class='input'></td>
	</tr>
	<tr>
	<td width='15%'>Jenis Simpanan</td>
	<td width='2%'>:</td>
	<td><select name='jenis' id='jenis' class='input'>
	<option value=''>-Pilih-</option>";
	$sql = "SELECT * FROM jenis_simpan";
	$query = mysql_query($sql);
	while($rows=mysql_fetch_array($query)){
	echo "<option value='$rows[id_jenis]'>$rows[id_jenis] - $rows[jenis_simpanan]</option>";
	}
	echo "</select>
	</td>
	</tr>
	<tr>
	<td width='15%'>Jumlah</td>
	<td width='2%'>:</td>
	<td><input type='text' name='jml' id='jml' size='15' class='input'></td>
	</tr>
	<tr>
	<td colspan='3' align='center'>
	<button class='ui-state-default ui-corner-all' id='simpan'>
	<span class='ui-icon ui-icon-disk'></span>Simpan
	</button>
	<button class='ui-state-default ui-corner-all' id='cetak'>
	<span class='ui-icon ui-icon-print'></span>Cetak
	</button>
	<button class='ui-state-default ui-corner-all' id='baru'>
	<span class='ui-icon ui-icon-document'></span>Baru
	</button>
	</td>
	</tr>
	</table>
	</div>
	<div id='tampil_data1'></div>
	</div>

<div title=\"Pertanggal\" style=\"padding:10px\">
	<div id='menu-tombol'>
	<div id='tombol-cari'>
	Tanggal <input type='text' id='tgl1' size='12'> s/d <input type='text' id='tgl2' size='12'>
	<button class='ui-state-default ui-corner-all' id='cari2'>
	<span class='ui-icon ui-icon-search'></span>Cari
	</button>
	</div>
	</div>
	<div id='tampil_data2'></div>
</div>


<div title=\"Daftar Penarikan\" style=\"padding:10px\">
	<div id='menu-tombol'>
	<div id='tombol-cari'>
	<input type='text' id='txt_cari' size='30'>
	<button class='ui-state-default ui-corner-all' id='cari3'>
	<span class='ui-icon ui-icon-search'></span>Cari
	</button>
	</div>
	</div>
	<div id='tampil_data3'></div>
	</div>
</div>
</div>";
?>