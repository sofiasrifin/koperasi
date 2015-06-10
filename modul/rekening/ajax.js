// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#cariAkun").click(function(){
			$('#form_cari_akun').load('modul/rekening/cari_jurnal/index.php');
			$('#form_cari_akun').dialog('open');
	});
	
	$("#nama").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	
	$("#kode").keyup(function(){
		cariRekening();
	});
	$("#kode").change(function(){
		cariRekening();
	});
	$("#kode").focus(function(){
		cariRekening();
	});
	function cariRekening(){
		var kode = $('#kode').val();
		$.ajax({
			type	: "POST",
			url		: "modul/rekening/cari_rekening.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#nama").val(data.nama);
				$("#saldo").val(data.saldo);
			}
		});
	}
	
	$(".data").flexigrid({
		  url : 'modul/rekening/post-json.php',
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'},
					  {display : 'Kode Akun',name : 'kode_akun',width : 80,sortable : true,align : 'center'}, 
					  {display : 'Nama Akun',name : 'nama_akun',width : 230,sortable : true,align : 'left'}, 
					  {display : 'Saldo Awal',name : 'saldo_awal',width : 120,sortable : true,align : 'left'}
		  ],
		  buttons : [{name : 'Add',bclass : 'add',onpress : test}, 
					 {name : 'Edit',bclass : 'edit',onpress : test}, 
					 {name : 'Delete',bclass : 'delete',onpress : test}, 
					 {separator : true} ,
					 {name : 'Refresh',bclass : 'refresh',onpress : test}
		  ],
		  searchitems : [ 
			  {display : 'Kode Akun',name : 'kode_akun',isdefault : true}, 
			  {display : 'Nama Akun',name : 'nama_akun'	} 
		  ],
		  sortname : "kode_akun",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Rekening',
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
			  window.location.replace('media.php?module=rekening');
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
			url		: "modul/rekening/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(id);
				$("#nama").val(data.nama);
				$("#saldo").val(data.saldo);
				
				$("#kode").attr("disabled",false);
				$('#form_input').dialog('open');
			}
		});
	}
	//ketika tombol hapus dipilih maka data akan dihapus
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/rekening/hapus.php",
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
		var nama		= $("#nama").val();
		var saldo		= $("#saldo").val();

		if(kode.length==0){
			alert('Maaf, Kode  tidak boleh kosong');
			$("#kode").focus();
			return false();
		}
		if(nama.length==0){
			alert('Maaf, Nama  tidak boleh kosong');
			$("#nama").focus();
			return false();
		}
		if(saldo.length==0){
			alert('Maaf, Saldo harus di isi 0');
			$("#saldo").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/rekening/simpan.php",
			data	: "kode="+kode+"&nama="+nama+"&saldo="+saldo,
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