// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#tgl").datepicker({
		dateFormat      : "dd/mm/yy"
	});
	
	$("#jml").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          return false;
		}	
	});

	$('#form_input').hide();
	$('#tampil_data').show();
	//fungsi pencarian anggota dg keyup
	$("#kodeanggota").keyup(function(){
		cariAnggota();
	});
	$("#kodeanggota").change(function(){
		cariAnggota();
	});
	$("#kodeanggota").focus(function(){
		cariAnggota();
	});
	function cariAnggota(){
		var kode = $('#kodeanggota').val();
		$.ajax({
			type	: "POST",
			url		: "modul/poin_acara/cari_anggota.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#namaanggota").val(data.nama);
			}
		});
	}
	
	/*
	$("#kodebarang").autocomplete("modul/jual/list_barang.php", {
				width:100,
				max: 10,
				scroll:false,
	});
	*/

	/*--Setting FlexiGrid--*/
	$(".data").flexigrid({
		  url : 'modul/poin_acara/post-json.php',
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'}, 
					  {display : 'Id Poin',name : 'no_anggota',width : 90,sortable : true,align : 'center'},
					   {display : 'No Anggota',name : 'no_anggota',width : 70,sortable : true,align : 'center'},
					   {display : 'Nama Anggota',name : 'nama',width : 150,sortable : true,align : 'center'},
					   {display : 'Tanggal',name : 'tgl',width : 80,sortable : true,align : 'center'},
					   {display : 'Nama Acara',name : 'id_acara',width : 150,sortable : true,align : 'center'},
					   {display : 'Sie Acara',name : 'id_sie',width : 120,sortable : true,align : 'center'},
					  {display : 'Jumlah Poin',name : 'jumlahpoin',width : 70,sortable : true,align : 'center'}
		  ],
		  buttons : [{name : 'Add',bclass : 'add',onpress : test}, 
					 //{name : 'Edit',bclass : 'edit',onpress : test}, 
					 {name : 'Delete',bclass : 'delete',onpress : test}, 
					 {separator : true} ,
					 {name : 'Refresh',bclass : 'refresh',onpress : test}
		  ],
		  searchitems : [ 
			  {display : 'No Anggota',name : 'poin_acara.no_anggota',isdefault : true}, 
			  {display : 'Nama Angggota',name : 'nama'} ,
			  {display : 'Tanggal',name : 'tgl'	}
		  ],
		  sortname : "id_poin",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Poin Anggota',
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
			  window.location.replace('media.php?module=poin_acara');
		  }
	  }
	/*---akhir---*/
	function Tambah(){
		$(".easyui-validatebox").val('');
		$(".input").val('');
		$(".easyui-numberbox").val('');
		//$("#kode").attr("disabled",false);
		//$("#tgl").focus();
		//$('#form_input').dialog('open');
		$('#form_input').show();
		$('#tampil_data').hide();
		//DataDetail();
		CariNomor();
		//return false;
	}
	//kode penjualan otomatis
	function CariNomor(){
		var id	= 1;
		$.ajax({
			type	: "POST",
			url		: "modul/poin_acara/cari_nomor.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(data.kode);
				DataDetail();
			}
		});
	}
/*	
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
*/
	function EditData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/poin_acara/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(id);
				$("#tgl").val(data.tgl);
			
				//$('#tampil_data').hide();
				$('#form_input').show();
				DataDetail();
			}
		});
	}
	
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/poin_acara/hapus.php",
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
		var kodeanggota	= $("#kodeanggota").val();
		var namaanggota	= $("#namaanggota").val();
		var tgl			= $("#tgl").val();
		var idacara		= $("#acara").val();
		var idsie		= $("#sieacara").val();
		var jml			= $("#jml").val();


		if(kode.length==0){
			alert('Maaf, id input poin tidak boleh kosong');
			$("#kode").focus();
			return false();
		}
		if(kodeanggota.length==0){
			alert('Maaf, No Anggota tidak boleh kosong');
			$("#kodeanggota").focus();
			return false();
		}
		/*
		if(namaanggota.length==0){
			alert('Maaf, No Anggota tidak boleh kosong');
			$("#namaanggota").focus();
			return false();
		}
		*/
		if(tgl.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("#tgl").focus();
			return false();
		}	
		/*
		if(idacara.length==0){
			alert('Maaf, Nama Acara tidak boleh kosong');
			$("#acara").focus();
			return false();
		}		
		if(idsie.length==0){
			alert('Maaf, Nama Acara tidak boleh kosong');
			$("#sieacara").focus();
			return false();
		}		
		*/
		if(jml.length==0){
			alert('Maaf, Jumlah tidak boleh kosong');
			$("#jml").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/poin_acara/simpan.php",
			data	: "kode="+kode+"&kodeanggota="+kodeanggota+
					"&namaanggota="+namaanggota+"&tgl="+tgl+"&idacara="+idacara+"&idsie="+idsie+"&jml="+jml,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, //'Password Tidak Boleh Kosong.',
					timeout:2000,
					showType:'slide'
				});
				//DataDetail();
			}
		});
	}
	
	$("#sieacara").change(function(){
		var cari = $("#sieacara").val();
		cariSieacara(cari);
	})
	
	function cariSieacara(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/poin_acara/cari_sieacara.php",
			data	: "cari="+cari,
			dataType: "json",
			success	: function(data){
				$("#jml").val(data.jml);
			}
		});
	}
	
	$("#tambah_data").click(function(){
		$(".easyui-validatebox").val('');
		$(".input").val('');
		$(".detail").val('');
		$("#kodeanggota").focus();
		CariNomor();
	});
	
	$("#kembali").click(function(){
		window.location.replace('media.php?module=poin_acara');	
	});
	
});