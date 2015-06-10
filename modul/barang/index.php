<script type="text/javascript" src="modul/barang/ajax.js"></script>
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
error_reporting(E_ALL & ~E_NOTICE);
include "inc.koneksi.php";
echo "<div id='dalam_content'>
<div id='tampil_data'>
<table class=\"data\" id=\"data\" style=\"display: none\"></table>
</div>
</div>";

echo "<div id=\"form_input\" class=\"easyui-dialog\" title=\"Input Data\" style=\"padding:5px;width:520px;height:370px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\">
	
	<table id='InputTable' width='100%'>
	
	<tr>
		<td>Barcode</td>
		<td>:&nbsp;<input type='text' name='barcode' id='barcode' size='30' maxlength='30' 
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,50]'\" ></td>
	</tr>
	<tr>
		<td>Kode Barang</td>
		<td>:&nbsp;<input type='text' name='kode' id='kode' size='20' maxlength='20' 
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\" ></td>
	</tr>
	
	<tr>
		<td>Nama Barang</td>
		<td>:&nbsp;<input type='text' name='namabarang' id='namabarang' size='50' maxlength='50'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	<tr>
		<td>Kategori Barang</td>
		<td>:&nbsp;<select name='kategori' id='kategori' class=\"input\" data-options=\"required:true\">
		<option value=''></option>";
		$q_stock=mysql_query("select * from kategori");		  
				//if (mysql_num_rows($q_stock)>0) {
					while ($row=mysql_fetch_array($q_stock)){
					echo "<option value='$row[kid]'>$row[knama]</option>";
						//echo '<option value=$row[kid]>$row[knama]</option>';
						//print '<option value="'.$row['kid'].'">'.$row['knama'].'</option>';
						//print '<option value="'.$row['kid'].'">'.$row['knama'].'</option>';
					}
				//}
		echo "</select>
		</td>
	</tr>
	<tr>
		<td>Supplier</td>
		<td>:&nbsp;<select name='supplier' id='supplier' class=\"input\" data-options=\"required:true\">
		<option value=''></option>";
		$q_stock=mysql_query("select * from supplier");		  
				//if (mysql_num_rows($q_stock)>0) {
					while ($row=mysql_fetch_array($q_stock)){
					echo "<option value='$row[kode_supplier]'>$row[nama_supplier]</option>";
						//echo '<option value=$row[kid]>$row[knama]</option>';
						//print '<option value="'.$row['kid'].'">'.$row['knama'].'</option>';
						//print '<option value="'.$row['kid'].'">'.$row['knama'].'</option>';
					}
				//}
		echo "</select>
		</td>
	</tr>
	<tr>
		<td>Satuan</td>
		<td>:&nbsp;<select name='satuan' id='satuan' class=\"input\" data-options=\"required:true\">
		<option value=''></option>";
		$q_stock=mysql_query("select * from satuan");		  
				//if (mysql_num_rows($q_stock)>0) {
					while ($row=mysql_fetch_array($q_stock)){
					echo "<option value='$row[pbsid]'>$row[pbsnama]</option>";
				}
		
		echo "</select>
		</td>
	</tr>
	<tr>
		<td>Stok Gudang</td>
		<td>:&nbsp;<input type='text' name='gudang' id='gudang' size='5' maxlength='5'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	<tr>
		<td>Stok Display</td>
		<td>:&nbsp;<input type='text' name='stok' id='stok' size='5' maxlength='5'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	<tr>
		<td>Harga Beli</td>
		<td>:&nbsp;<input  id='hargabeli' size='10' maxlength='10'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></input></td>
	</tr>
	<tr>
		<td>Harga Jual</td>
		<td>:&nbsp;<input type='text' name='hargajual' id='hargajual' size='10' maxlength='10'
		class=\"easyui-validatebox\" data-options=\"required:true,validType:'length[1,20]'\"></td>
	</tr>
	
	</table>
</div>";
?>
