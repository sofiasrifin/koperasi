// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#anggota").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#tempat").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#alamat").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#tgl").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	
	$(".data").flexigrid({
		  url : 'modul/anggota/post-json.php',
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'},
					  {display : 'Reg',name : 'reg',width : 60,sortable : true,align : 'center'},
					  {display : 'Anggota',name : 'no_anggota',width : 40,sortable : true,align : 'left'},
					  {display : 'Nama Anggota',name : 'nama',width : 150,sortable : true,align : 'left'},
					  {display : 'Tempat Lahir',name : 'templahir',width : 60,sortable : true,align : 'left'},
					  {display : 'Tanggal Lahir',name : 'tgllahir',width : 60,sortable : true,align : 'left'},
					  {display : 'Fakjur',name : 'fakjur',width : 130,sortable : true,align : 'left'},
					  {display : 'Agama',name : 'agama',width : 40,sortable : true,align : 'left'},
					  {display : 'JK',name : 'jk',width : 20,sortable : true,align : 'left'},
					  {display : 'Alamat',name : 'alamat',width : 250,sortable : true,align : 'left'},
					  {display : 'Hp',name : 'telp',width : 70,sortable : true,align : 'left'}
		  ],
		  buttons : [{name : 'Add',bclass : 'add',onpress : test}, 
					 {name : 'Edit',bclass : 'edit',onpress : test}, 
					 {name : 'Delete',bclass : 'delete',onpress : test}, 
					 {separator : true} ,
					 {name : 'Refresh',bclass : 'refresh',onpress : test}
		  ],
		  searchitems : [ 
					{display : 'No Anggota',name : 'no_anggota',isdefault : true},
					  {display : 'Reg',name : 'reg'},
					  {display : 'Nama Anggota',name : 'nama'},
					  {display : 'Tempat Lahir',name : 'templahir'}, 
					  {display : 'Tanggal Lahir',name : 'tgllahir'},
					  {display : 'Fakjur',name : 'fakjur'},
					  {display : 'Agama',name : 'agama'}
		  ],
		  sortname : "reg",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Anggota',
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
			  window.location.replace('media.php?module=anggota');
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
				$("#reg").focus();
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
		$("#reg").attr("disabled",false);
		$("#reg").focus();
		$('#form_input').dialog('open');
		return false;
	}
	
	function EditData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/anggota/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){	
				$("#reg").val(id);
				$("#nomor").val(data.nomor);
				$("#anggota").val(data.anggota);
				$("#tempat").val(data.tempat);
				$("#tgl").val(data.tgl);
				$("#fakjur").val(data.fakjur);
				$("#agama").val(data.agama);
				$("#jk").val(data.jk);
				$("#alamat").val(data.alamat);
				$("#hp").val(data.hp);
				
				$("#reg").attr("disabled",true);
				$('#form_input').dialog('open');
			}
		});
	}
	
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/anggota/hapus.php",
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
		var reg			= $("#reg").val();
		var nomor		= $("#nomor").val();
		var anggota		= $("#anggota").val();
		var tempat		= $("#tempat").val();
		var tgl			= $("#tgl").val();
		var fakjur		= $("#fakjur").val();
		var agama		= $("#agama").val();
		var jk			= $("#jk").val();
		var alamat		= $("#alamat").val();
		var hp			= $("#hp").val();
		var pwd			= $("#pwd").val();


		if(reg.length==0){
			alert('Maaf, No Registrasi  tidak boleh kosong');
			$("#reg").focus();
			return false();
		}
		if(nomor.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#nomor").focus();
			return false();
		}
		if(anggota.length==0){
			alert('Maaf, Nama  tidak boleh kosong');
			$("#anggota").focus();
			return false();
		}
		if(alamat.length==0){
			alert('Maaf, Anda belum mengisi alamat');
			$("#alamat").focus();
			return false();
		}
		if(hp.length==0){
			alert('Maaf, no telp harus di isi');
			$("#hp").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/anggota/simpan.php",
			data	: "reg="+reg+"&nomor="+nomor+"&anggota="+anggota+"&tempat="+tempat+"&tgl="+tgl+"&fakjur="+fakjur+"&agama="+agama+"&jk="+jk+"&alamat="+alamat+"&hp="+hp+"&pwd="+pwd,
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