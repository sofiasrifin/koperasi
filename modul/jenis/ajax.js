// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#kode").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$(".data").flexigrid({
		  url : 'modul/jenis/post-json.php',
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'},
					  {display : 'Id Jenis',name : 'id_jenis',width : 60,sortable : true,align : 'center'}, 
					  {display : 'Jenis Simpanan',name : 'jenis_simpanan',width : 180,sortable : true,align : 'left'}, 
					  {display : 'Jumlah',name : 'jumlah',width : 250,sortable : true,align : 'left'}
		  ],
		  buttons : [{name : 'Add',bclass : 'add',onpress : test}, 
					 {name : 'Edit',bclass : 'edit',onpress : test}, 
					 {name : 'Delete',bclass : 'delete',onpress : test}, 
					 {separator : true} ,
					 {name : 'Refresh',bclass : 'refresh',onpress : test}
		  ],
		  searchitems : [ 
			  {display : 'Id Jenis',name : 'id_jenis',isdefault : true}, 
			  {display : 'Jenis Simpanan',name : 'jenis_simpanan'	} ,
			  {display : 'Jumlah',name : 'jumlah'	} 
		  ],
		  sortname : "id_jenis",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Jenis Simpanan',
		  useRp : true,
		  rp : 10,
		  showTableToggleBtn : false,
		  height : 300,
		  pagetext: 'Hal ',
		  outof: 's.d'
	  });
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
				});    
			   } else {
				alert('Silahkan pilih salah satu baris yang ingin di edit');
				return false;
			   }
		  }else if (com == 'Refresh') {
			  window.location.replace('media.php?module=jenis');
		  }
	  }
	//kotak dialog
	$('#form_input').dialog({
		buttons:[{
				 //tombol simpan
			text:'Simpan',
			iconCls:'icon-save',
			handler:function(){
				//alert('ok');
				simpan();
				$('.data').flexReload();
			}
		},{
			//tombol tambah
			text:'Tambah',
			iconCls:'icon-add',
			handler:function(){
				//$('#form_input').dialog('close');
				$(".easyui-validatebox").val('');
				$(".easyui-numberbox").val('');
				$(".input").val('');	
				$("#kode").focus();
			}
		},{
			//tombol kembali
			text:'Kembali',
			iconCls:'icon-back',
			handler:function(){
				$('#form_input').dialog('close');
				//tampilData();
				$('.data').flexReload();
			}
		}]
	});
	
	function Tambah(){
		$(".easyui-validatebox").val('');
		$(".input").val('');
		$(".easyui-numberbox").val('');
		$("#kode").attr("disabled",false);
		$("#kode").focus();
		$('#form_input').dialog('open');
		return false;
	}
	//ketika tombol edit dipilih membuka dialog form edit
	function EditData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/jenis/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(id);
				$("#jenis").val(data.jenis);
				$("#jumlah").val(data.jumlah);
				
				$("#kode").attr("disabled",true);
				$('#form_input').dialog('open');
			}
		});
	}
	//ketika tombol hapus dipilih maka data akan dihapus
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/jenis/hapus.php",
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
		//fungsi untuk menyimpan
	function simpan(){
		var kode		= $("#kode").val();
		var jenis		= $("#jenis").val();
		var jumlah		= $("#jumlah").val();

		if(kode.length==0){
			alert('Maaf, Kode  tidak boleh kosong');
			$("#kode").focus();
			return false();
		}
		if(jenis.length==0){
			alert('Maaf, Nama  tidak boleh kosong');
			$("#jenis").focus();
			return false();
		}
		if(jumlah.length==0){
			alert('Maaf, Anda belum mengisi alamat');
			$("#alamat").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/jenis/simpan.php",
			data	: "kode="+kode+"&jenis="+jenis+"&jumlah="+jumlah,
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
});