// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#namasie").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$(".data").flexigrid({
		  url : 'modul/sie/post-json.php',
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'},
					  {display : 'Id Sie',name : 'id_sie',width : 30,sortable : true,align : 'left'},
					  {display : 'Nama Sie',name : 'nama_sie',width : 200,sortable : true,align : 'left'}, 
					  {display : 'Poin',name : 'poin',width : 50,sortable : true,align : 'left'}
		  ],
		  buttons : [{name : 'Add',bclass : 'add',onpress : test}, 
					 {name : 'Edit',bclass : 'edit',onpress : test}, 
					 {name : 'Delete',bclass : 'delete',onpress : test}, 
					 {separator : true} ,
					 {name : 'Refresh',bclass : 'refresh',onpress : test}
		  ],
		  searchitems : [ 
			  {display : 'Nama',name : 'nama_sie',isdefault : true}
		  ],
		  sortname : "id_sie",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Sie Kegiatan',
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
			  window.location.replace('media.php?module=sie');
		  }
	  }

	$('#form_input').dialog({
		buttons:[{
			text:'Simpan',
			iconCls:'icon-save',
			handler:function(){
				//alert('ok');
				simpan();
				$('.data').flexReload();
			}
		},{
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
	
	function EditData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/sie/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(id);
				$("#namasie").val(data.nama);
				$("#poin").val(data.poin);
				
				$("#kode").attr("disabled",true);
				$('#form_input').dialog('open');
			}
		});
	}
	
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/sie/hapus.php",
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
		
	function simpan(){
		var kode		= $("#kode").val();
		var nama		= $("#namasie").val();
		var poin		= $("#poin").val();

		if(kode.length==0){
			alert('Maaf, Kode  tidak boleh kosong');
			$("#kode").focus();
			return false();
		}
		if(nama.length==0){
			alert('Maaf, Nama  tidak boleh kosong');
			$("#namasie").focus();
			return false();
		}
		if(poin.length==0){
			alert('Maaf, Anda belum mengisi alamat');
			$("#poin").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/sie/simpan.php",
			data	: "kode="+kode+"&nama="+nama+"&poin="+poin,
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