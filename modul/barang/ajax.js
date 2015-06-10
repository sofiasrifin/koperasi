// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#namabarang").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#hargabeli").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#hargajual").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#stok").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	/*
	$("#kode").keypress(function(){
		cariBarang();
	});
	
	$("#kode").change(function(){
		cariBarang();
	});
	/*
	$("#kode").focus(function(){
		cariBarang();
	});
	*/
	function cariBarang(){
		var kode = $('#kode').val();
		$.ajax({
			type	: "POST",
			url		: "modul/barang/cari_barang.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#barcode").val(data.barcode);
				$("#namabarang").val(data.nama);
				$("#kategori").val(data.kategori);
				$("#satuan").val(data.satuan);
				$("#gudang").val(data.gudang);
				$("#stok").val(data.stok);
				$("#hargabeli").val(data.hargabeli);
				$("#hargajual").val(data.hargajual);
			}
		});
	}

	/*
	$("#barcode").change(function(){
		cariBarcode();
	});
	
	$("#barcode").keyup(function(){
		cariBarcode();
	});
	$("#barcode").focus(function(){
		cariBarcode();
	});
	*/
	function cariBarcode(){
		var kode = $('#barcode').val();
		$.ajax({
			type	: "POST",
			url		: "modul/barang/cari_barcode.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(data.kode);
				$("#namabarang").val(data.nama);
				$("#kategori").val(data.kategori);
				$("#satuan").val(data.satuan);
				$("#gudang").val(data.gudang);
				$("#stok").val(data.stok);
				$("#hargabeli").val(data.hargabeli);
				$("#hargajual").val(data.hargajual);
			}
		});
	}

	/*
	$('#satuan').combo({
			editable:false
	});
	*/
	//Menampilkan data menggunakan flexigrid
	$(".data").flexigrid({
		  url : 'modul/barang/post-json.php',	//Mengambil data yang akan ditampilkan pada grid dengan format JSON
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'},
					  {display : 'Barcode',name : 'barcode',width : 90,sortable : true,align : 'center'}, 
					  {display : 'Kode',name : 'kode_barang',width : 50,sortable : true,align : 'center'}, 
					  {display : 'Nama Barang',name : 'nama_barang',width : 200,sortable : true,align : 'left'}, 
					  {display : 'Supplier',name : 'kode_supplier',width : 90,sortable : true,align : 'center'},
					  {display : 'Kategori',name : 'kid',width : 100,sortable : true,align : 'center'}, 
					  {display : 'Satuan',name : 'pbsid',width : 50,sortable : true,align : 'center'}, 	   
					  {display : 'Harga Beli',name : 'harga_beli',width : 60,sortable : true,align : 'right'},
					  {display : 'Harga Jual',name : 'harga_jual',width : 60,sortable : true,align : 'right'},
					  {display : 'Gudang',name : 'gudang',width : 40,sortable : true,align : 'center'},
					  {display : 'Display',name : 'stok_awal',width : 40,sortable : true,align : 'center'},
					  {display : 'Total',name : 'gudang+stok_awal',width : 40,sortable : true,align : 'center'}
		  ],
		  buttons : [{name : 'Add',bclass : 'add',onpress : test}, 
					 {name : 'Edit',bclass : 'edit',onpress : test}, 
					 {name : 'Delete',bclass : 'delete',onpress : test}, 
					 //{name : 'Stok Opname',bclass : 'stok_opname',onpress : test},
					 {separator : true} ,
					 {name : 'Refresh',bclass : 'refresh',onpress : test},
					 
		  ],
		  searchitems : [ {display : 'Kode',name : 'kode_barang',isdefault : true}, 
				  {display : 'Barcode',name : 'barcode'	} ,
				  {display : 'Nama Barang',name : 'nama_barang'	},
				  {display : 'Nama Supplier',name : 'nama_supplier'	} 
		  ],
		  sortname : "kode_barang",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Barang',
		  useRp : true,
		  rp : 10, //untuk menampilkan data yang di inginkan jumlahnya berapa
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
			  window.location.replace('media.php?module=barang');
		  }else if (com == 'Stok'){
			  StokOpname(id);
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
				$("#barcode").focus();
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
		$(".easyui-combobox").val('');
		$(".input").val('');
		$("#barcode").attr("disabled",false);
		$("#barcode").focus();
		$('#form_input').dialog('open');
		return false;
	}
	
	function EditData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/barang/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(id);
				$("#barcode").val(data.barcode);
				$("#namabarang").val(data.namabarang);
				$("#supplier").val(data.supplier);
				$("#kategori").val(data.kategori);
				$("#satuan").val(data.satuan);
				$("#hargajual").val(data.hargajual);
				$("#hargabeli").val(data.hargabeli);
				$("#gudang").val(data.gudang);
				$("#stok").val(data.stok);
				
				//$("#kode").attr("disabled",true);
				$('#form_input').dialog('open');
				//$('.data').flexReload();
				//return false;
			}
		});
	}
	
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/barang/hapus.php",
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

	function StokOpname(e){
		var id = e;
		$.ajax({
			type	: "POST",
			url		: "modul/barang/stokopname.php",
			data	: "id="+id,
			succes	: function(data){
				$.messager.show({
					title:'Info',
					msg:data,
					timeout:2000,
					showType:'slide'
				});
				$('.data').flexReload();
			}
		});
	}
		
	function simpan(){
		var barcode		= $("#barcode").val();
		var kode		= $("#kode").val();
		var namabarang	= $("#namabarang").val();
		var supplier	= $("#supplier").val();
		var kategori	= $("#kategori").val();
		var satuan		= $("#satuan").val();
		var hargabeli	= $("#hargabeli").val();
		var hargajual	= $("#hargajual").val();
		var gudang		= $("#gudang").val();
		var stok		= $("#stok").val();

		if(barcode.length==0){
			alert('Maaf, Barcode Barang tidak boleh kosong');
			$("#barcode").focus();
			return false();
		}
		if(kode.length==0){
			alert('Maaf, Kode Barang tidak boleh kosong');
			$("#kode").focus();
			return false();
		}
		if(namabarang.length==0){
			alert('Maaf, Nama Barang tidak boleh kosong');
			$("#namabarang").focus();
			return false();
		}
		if(hargabeli.length==0){
			alert('Maaf, Anda belum mengisi Harga Beli');
			$("#hargabeli").focus();
			return false();
		}		
		if(hargajual.length==0){
			alert('Maaf, Anda belum mengisi Harga Jual');
			$("#hargajual").focus();
			return false();
		}
		if(stok.length==0){
			alert('Maaf, Anda belum mengisi Stok atau berikan angka 0');
			$("#stok").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/barang/simpan.php",
			data	: "barcode="+barcode+"&kode="+kode+"&namabarang="+namabarang+"&supplier="+supplier+"&kategori="+kategori+"&satuan="+satuan+"&hargabeli="+hargabeli+"&hargajual="+hargajual+"&gudang="+gudang+"&stok="+stok,
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