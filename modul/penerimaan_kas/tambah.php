<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	
	$("#nobukti").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	
	$("#keterangan").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	
	$("#tgl").datepicker({
		dateFormat      : "dd/mm/yy"
	});

	$('#form_input').hide();
	$('#tampil_data').show();
	
	$("#kodeakun").keyup(function(){
		cariRekening();
	});
	$("#kodeakun").change(function(){
		cariRekening();
	});
	$("#kodeakun").focus(function(){
		cariRekening();
	});
	function cariRekening(){
		var kode = $('#kodeakun').val();
		$.ajax({
			type	: "POST",
			url		: "modul/jurnal/cari_rekening.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#namaakun").val(data.nama);
			}
		});
	}
	
	$("#cariAkun").click(function(){
			$('#form_cari_akun').load('modul/jurnal/cari_jurnal/index.php');
			$('#form_cari_akun').dialog('open');
	});
	/*
	$('#satuan').combo({
			editable:false
	});
	*/
	
	  function test(com, grid) {
		  if (com == 'Delete') {
			  //confirm('Delete ' + $('.trSelected', grid).length + ' items?')
			  if ($('.trSelected',grid).length == 1) { 
				$('.trSelected',grid).each(function() {
				 var id = $(this).attr('id');
				 id = id.substring(id.lastIndexOf('row')+3);  // ambil data kolom id       
				 	var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
					if (pilih==true) {
						HapusData(id);
					}
				});    
			   } else {
				alert('Silahkan pilih salah satu baris yang ingin di Hapus');
				return false;
			   }
		  } else if (com == 'Add') {
			  //alert('Add New Item');
			  Tambah();
			  
		  }else if (com == 'Edit') {
			  //alert('Add New Item');
			  if ($('.trSelected',grid).length == 1) { 
				$('.trSelected',grid).each(function() {
				 var id = $(this).attr('id');
				 id = id.substring(id.lastIndexOf('row')+3);  // ambil data kolom id       
				 	EditData(id);
					//window.location.replace('media.php?module=edit_jurnal');
					
				});    
			   } else {
				alert('Silahkan pilih salah satu baris yang ingin di edit');
				return false;
			   }
		  }else if (com == 'Refresh') {
			  window.location.replace('media.php?module=jurnal');
		  }
	  }
	
	function Tambah(){
		$(".easyui-validatebox").val('');
		$(".input").val('');
		$(".easyui-numberbox").val('');
		$('#form_input').show();
		$('#tampil_data').hide();
		DataDetail();
		CariNomor();
		//return false;
	}
	
	function CariNomor(){
		var id	= 1;
		$.ajax({
			type	: "POST",
			url		: "modul/jurnal/cari_nomor.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(data.kode);
				DataDetail();
			}
		});
	}
	
	function DataDetail(){
		var cari	= $("#kode").val();
		$.ajax({
			type	: "POST",
			url		: "modul/jual/tampil_data.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data_detail").html(data);
			}
		});
	}
	
	function EditData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/jurnal/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(id);
				//$("#nobukti").val(data.nobukti);
				$("#tgl").val(data.tgl);
				$("#keterangan").val(data.keterangan);
				$("#kodeakun").val(data.kodeakun);
				$("#namaakun").val(data.namaakun);
				$("#debetkredit").val(data.debetkredit);
				$("#jml").val(data.jml);
				
				$('#form_input').show();
				$('#tampil_data').hide();
				//$("#kode").attr("disabled",true);
				//$('#form_input').dialog('open');
				//$('.data').flexReload();
				//return false;
			}
		});
	}
	
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/jurnal/hapus.php",

			data	: "id="+id,			  
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, //'Password Tidak Boleh Kosong.',
					timeout:2000,
					showType:'slide'
				});
				$('.data').flexReload();
			}
		});
	}
	
	$("#simpan").click(function(){
		simpan();
	});
	
	function simpan(){
		var kode		= $("#kode").val();
		//var nobukti		= $("#nobukti").val();
		var tgl			= $("#tgl").val();
		var keterangan	= $("#keterangan").val();
		var kodeakun	= $("#kodeakun").val();
		var namaakun	= $("#namaakun").val();
		var debetkredit	= $("#debetkredit").val();
		var jml			= $("#jml").val();
		//var kredit		= $("#kredit").val();

		if(kode.length==0){
			alert('Maaf, Kode Jurnal tidak boleh kosong');
			$("#kode").focus();
			return false();
		}
		
		if(tgl.length==0){
			alert('Maaf, Anda belum mengisi Tanggal');
			$("#tgl").focus();
			return false();
		}		
		if(keterangan.length==0){
			alert('Maaf, Anda belum mengisi Keterangan');
			$("#keterangan").focus();
			return false();
		}
		if(kodeakun.length==0){
			alert('Maaf, Anda belum mengisi Kode akun');
			$("#kodeakun").focus();
			return false();
		}
		if(namaakun.length==0){
			alert('Maaf, Anda belum mengisi Nama akun');
			$("#namaakun").focus();
			return false();
		}
		if(jml.length==0){
			alert('Maaf, Anda belum mengisi Jumlah akun');
			$("#jml").focus();
			return false();
		}
		/*
		if(debetkredit.length==0){
			alert('Maaf, Anda belum mengisi Debet atau Berikan angka 0');
			$("#debetkredit").focus();
			return false();
		}
		
		if(kredit.length==0){
			alert('Maaf, Anda belum mengisi Debet atau Berikan angka 0');
			$("#kredit").focus();
			return false();
		}
		*/
		$.ajax({
			type	: "POST",
			url		: "modul/jurnal/simpan.php",
			data	: "kode="+kode+"&tgl="+tgl+"&keterangan="+keterangan+"&kodeakun="+kodeakun+"&namaakun="+namaakun+"&debetkredit="+debetkredit+"&jml="+jml,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, //'Password Tidak Boleh Kosong.',
					timeout:2000,
					showType:'slide'
				});
				$('.data').flexReload();
			}
		});
	}
	$("#tambah_data").click(function(){
		//$(".easyui-validatebox").val('');
		//$("#keterangan").val('');
		$("#kodeakun").val('');
		$("#namaakun").val('');
		$(".input").val('');
		$(".detail").val('');
		$("#tgl").focus();
		CariNomor();
	});
	
	$("#kembali").click(function(){
		window.location.replace('media.php?module=jurnal');	
	});
	
});
</script>

<?php

echo "<div id='form'>
	<table width='100%'>
	<tr>
		<td colspan='2'><h3>FORM INPUT JURNAL UMUM</h3></td>
	</tr>	
	</table>
		<br>
	
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
</div><br><br>
	<a href='?module=jurnal'>Lihat Jurnal Yang sudah di input</a>";
	
	
echo "<div id=\"form_cari_akun\" class=\"easyui-dialog\" title=\"Cari Data Barang\" style=\"padding:5px;width:800px;height:480px;\"
	data-options=\"closed:true,modal:true,buttons:'#dlg-buttons',resizable:false\"></div>";
?>