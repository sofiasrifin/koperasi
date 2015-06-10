<script type="text/javascript" src="modul/rekening/ajax.js"></script>
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
</div>
</div>";
echo "<div id=\"form_input\" class=\"easyui-dialog\" title=\"Input Data\" style=\"padding:5px;width:520px;height:350px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\">
	<table id='theList' width='100%'>
	<tr>
		<td>Kode Rekening</td>
		<td>:&nbsp;<input type='text' name='kode' id='kode' size='20' maxlength='20' 
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\" >
		<a href=\"#\" id='cariAkun' title='Cari Kode Akun' class=\"easyui-linkbutton\" data-options=\"plain:true,iconCls:'icon-search'\"></a>
		</td>
	</tr>
	<tr>
		<td>Nama Rekening </td>
		<td>:&nbsp;<input type='text' name='nama' id='nama' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,35]'\"></td>
	</tr>
	<tr>
		<td>Saldo Awal</td>
		<td>:&nbsp;<input type='text' name='saldo' id='saldo' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	
	</table>
</div>";
echo "<div id=\"form_cari_akun\" class=\"easyui-dialog\" title=\"Cari Data Barang\" style=\"padding:5px;width:800px;height:480px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\"></div>";
?>
