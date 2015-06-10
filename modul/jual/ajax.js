// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#kodebarang").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	
	
	$("#tgl").datepicker({
		dateFormat      : "dd/mm/yy"
	});
	
	$("#jml").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});
	$("#harga").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
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
			url		: "modul/jual/cari_anggota.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#namaanggota").val(data.nama);
			}
		});
	}
	$("#bayar").keyup(function(){
			kembalian();
	});
	function kembalian(){
		var bayar	= $("#bayar").val();
		var gtot	= $("#gtot").val();
		if (bayar.length!=0){
			var kembalian = parseInt(bayar)-parseInt(gtot);
			$("#kembalian").val(kembalian);
		}else{
			$("#kembalian").val(0);
		}
	}
	
	/*
	$("#kodebarang").autocomplete("modul/jual/list_barang.php", {
				width:100,
				max: 10,
				scroll:false,
	});
	*/
	$("#kodebarang").keyup(function(){
		cariBarang();
	});
	$("#kodebarang").change(function(){
		cariBarang();
	});
	$("#kodebarang").focus(function(){
		cariBarang();
	});
	function cariBarang(){
		var kode = $('#kodebarang').val();
		$.ajax({
			type	: "POST",
			url		: "modul/jual/cari_barang.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#barcode").val(data.barcode);
				$("#namabarang").val(data.nama);
				$("#satuan").val(data.satuan);
				$("#harga").val(data.harga);
			}
		});
	}
	
	$("#barcode").keyup(function(){
		cariBarcode();
	});
	$("#barcode").change(function(){
		cariBarcode();
	});
	$("#barcode").focus(function(){
		cariBarcode();
	});
	function cariBarcode(){
		var kode = $('#barcode').val();
		$.ajax({
			type	: "POST",
			url		: "modul/jual/cari_barcode.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#kodebarang").val(data.kodebarang);
				$("#namabarang").val(data.nama);
				$("#satuan").val(data.satuan);
				$("#harga").val(data.harga);
			}
		});
	}

	/*--Setting FlexiGrid--*/
	$(".data").flexigrid({
		  url : 'modul/jual/post-json.php',
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'},
					  {display : 'Kode',name : 'kodejual',width : 100,sortable : true,align : 'center'}, 
					  {display : 'Tanggal',name : 'tgljual',width : 100,sortable : true,align : 'center'}, 
					   {display : 'No Anggota',name : 'no_anggota',width : 50,sortable : true,align : 'center'},
					   {display : 'Nama Anggota',name : 'nama',width : 120,sortable : true,align : 'center'},
					   {display : 'Item',name : 'jml',width : 50,sortable : true,align : 'center'},
					   {display : 'Total',name : 'total',width : 120,sortable : true,align : 'right'},
					  {display : 'Users',name : 'user_id',width : 100,sortable : true,align : 'left'}
		  ],
		  buttons : [{name : 'Add',bclass : 'add',onpress : test}, 
					 {name : 'Edit',bclass : 'edit',onpress : test}, 
					 {name : 'Delete',bclass : 'delete',onpress : test}, 
					 {separator : true} ,
					 {name : 'Refresh',bclass : 'refresh',onpress : test}
		  ],
		  searchitems : [ 
			  {display : 'Kode Penjualan',name : 'kodejual',isdefault : true}, 
			  {display : 'No Angggota',name : 'h_jual.no_anggota'} ,
			  {display : 'Tanggal',name : 'tgljual'	} ,
			  {display : 'Users',name : 'user_id'	} 
		  ],
		  sortname : "kodejual",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Penjualan Barang',
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
			  window.location.replace('media.php?module=jurnal');
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
		DataDetail();
		CariNomor();
		//return false;
	}
	//kode penjualan otomatis
	function CariNomor(){
		var id	= 1;
		$.ajax({
			type	: "POST",
			url		: "modul/jual/cari_nomor.php",
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
			url		: "modul/jual/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(id);
				$("#tgl").val(data.tgl);
			
				$('#tampil_data').hide();
				$('#form_input').show();
				DataDetail();
			}
		});
	}
	
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/jual/hapus.php",
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
	$("#jml").keyup(function(){
		total();
	});
	//Menghitung total harga
	function total(){
		var jml = $("#jml").val();
		var harga = $("#harga").val();
		if (jml.length!=0){
			var total = parseInt(jml)*parseInt(harga);
			$("#total").val(total);
		}else{
			$("#total").val(0);
		}
			
	}
	/*
	$("$bayar").keyup(function(){
			kembali();
	});
	function kembali(){
		var bayar	= $("#bayar").val();
		var kembali	= $("#kembali").val();
			var kembali = parseInt(
	*/
	$("#simpan").click(function(){
		simpan();
	});
	function simpan(){
		var barcode		= $("#barcode").val();
		var kode		= $("#kode").val();
		var tgl			= $("#tgl").val();
		var kodeanggota	= $("#kodeanggota").val();
		var namaanggota	= $("#namaanggota").val();
		var kodebrg		= $("#kodebarang").val();
		var jml			= $("#jml").val();
		var harga		= $("#harga").val();

		if(barcode.length==0){
			alert('Maaf, Barcode tidak boleh kosong');
			$("#barcode").focus();
			return false();
		}
		if(kode.length==0){
			alert('Maaf, Kode tidak boleh kosong');
			$("#kode").focus();
			return false();
		}
		if(tgl.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("#tgl").focus();
			return false();
		}
		if(kodebrg.length==0){
			alert('Maaf, Kode Barang tidak boleh kosong');
			$("#kodebarang").focus();
			return false();
		}
		/*
		if(kodeanggota.length==0){
			alert('Maaf, No Anggota tidak boleh kosong');
			$("#kodeanggota").focus();
			return false();
		}
		
		if(namaanggota.length==0){
			alert('Maaf, No Anggota tidak boleh kosong');
			$("#namaanggota").focus();
			return false();
		}
		*/
		if(jml.length==0){
			alert('Maaf, Jumlah tidak boleh kosong');
			$("#jml").focus();
			return false();
		}
		if(harga.length==0){
			alert('Maaf, Harga tidak boleh kosong');
			$("#harga").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/jual/simpan.php",
			data	: "barcode="+barcode+"&kode="+kode+"&tgl="+tgl+
					"&kodebrg="+kodebrg+"&jml="+jml+"&kodeanggota="+kodeanggota+"&namaanggota="+namaanggota+"&harga="+harga,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data, //'Password Tidak Boleh Kosong.',
					timeout:2000,
					showType:'slide'
				});
				DataDetail();
			}
		});
	}
	
	
	$("#new").click(function(){
		$(".detail").val('');
		$("#kodebarang").focus();
	});
	$("#tambah_data").click(function(){
		$(".easyui-validatebox").val('');
		$(".input1").val('');
		$(".detail").val('');
		$("#kodebarang").focus();
		CariNomor();
	});
	$("#cariBarang").click(function(){
			$('#form_cari_barang').load('modul/jual/cari_barang/index.php');
			$('#form_cari_barang').dialog('open');
	});
	
	$("#cetak").click(function(){
		var kode 	= $('#kode').val();
	
		window.open('modul/laporan/cetak-jual.php?kode='+kode);	
		return false();
	});
	
	$("#kembali").click(function(){
		window.location.replace('media.php?module=jual');	
	});
	
});