<script type="text/javascript" src="modul/kategori/ajax.js"></script>
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
		<td>Id Kategori</td>
		<td>:&nbsp;<input type='text' name='kode' id='kode' size='20' maxlength='20' 
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\" ></td>
	</tr>
	<tr>
		<td>Jenis Kategori </td>
		<td>:&nbsp;<input type='text' name='namakategori' id='namakategori' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,50]'\"></td>
	</tr>
	
	</table>
</div>";
?>
