// JavaScript Document
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
			url		: "modul/pengeluaran_kas/cari_rekening.php",
			data	: "kode="+kode,
			dataType : "json",				  
			success	: function(data){
				$("#namaakun").val(data.nama);
			}
		});
	}
	
	$("#cariAkun").click(function(){
			$('#form_cari_akun').load('modul/pengeluaran_kas/cari_jurnal/index.php');
			$('#form_cari_akun').dialog('open');
	});
	/*
	$('#satuan').combo({
			editable:false
	});
	*/
	//Menampilkan data menggunakan flexigrid
	$(".data").flexigrid({
		  url : 'modul/pengeluaran_kas/post-json.php',	//Mengambil data yang akan ditampilkan pada grid dengan format JSON
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'},
					  //{display : 'Id Jurnal',name : 'idjurnal',width : 90,sortable : true,align : 'center'},
					  {display : 'Kode Jurnal',name : 'no_jurnal',width : 80,sortable : true,align : 'center'}, 
					  //{display : 'No Bukti',name : 'no_bukti',width : 50,sortable : true,align : 'center'}, 
					  {display : 'Tanggal',name : 'tgl',width : 70,sortable : true,align : 'center'}, 
					  {display : 'Kode Akun',name : 'kode_akun',width : 70,sortable : true,align : 'center'}, 
					  {display : 'Nama Akun',name : 'nama_akun',width : 150,sortable : true,align : 'center'}, 
					  {display : 'Keterangan',name : 'uraian',width : 150,sortable : true,align : 'center'},
					  {display : 'Debet',name : 'debet',width : 70,sortable : true,align : 'center'},
					  {display : 'Kredit',name : 'kredit',width : 70,sortable : true,align : 'center'}
		  ],
		  buttons : [{name : 'Add',bclass : 'add',onpress : test}, 
					 {name : 'Edit',bclass : 'edit',onpress : test}, 
					 {name : 'Delete',bclass : 'delete',onpress : test}, 
					 {separator : true} ,
					 {name : 'Refresh',bclass : 'refresh',onpress : test}
		  ],
		  searchitems : [ {display : 'Kode Akun',name : 'd_jurnal.kode_akun',isdefault : true}, 
				  {display : 'Nama Akun',name : 'd_jurnal.nama_akun'	}
		  ],
		  sortname : "no_jurnal",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Pengeluaran Kas',
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
					//alert('tes');
					
				});    
			   } else {
				alert('Silahkan pilih salah satu baris yang ingin di edit');
				return false;
			   }
		  }else if (com == 'Refresh') {
			  window.location.replace('media.php?module=pengeluaran_kas');
		  }
	  }
	
	function Tambah(){
		$(".easyui-validatebox").val('');
		$(".input").val('');
		$(".easyui-numberbox").val('');
		$('#form_input').show();
		$('#tampil_data').hide();
		CariNomor();
		//return false;
	}
	
	function CariNomor(){
		var id	= 1;
		$.ajax({
			type	: "POST",
			url		: "modul/pengeluaran_kas/cari_nomor.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(data.kode);
				
			}
		});
	}
	
	
	function EditData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/pengeluaran_kas/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#kode").val(id);
				//$("#nobukti").val(data.nobukti);
				$("#tgl").val(data.tgl);
				$("#keterangan").val(data.keterangan);
				$("#kodeakun").val(data.kodeakun);
				$("#namaakun").val(data.namaakun);
				//$("#debetkredit").val(data.debetkredit);
				//$("#jml").val(data.jml);
				
				$('#tampil_data').hide();
				$('#form_input').show();
				
			}
		});
	}
	
	function HapusData(e){
		var id	= e;
		$.ajax({
			type	: "POST",
			url		: "modul/pengeluaran_kas/hapus.php",
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
			url		: "modul/pengeluaran_kas/simpan.php",
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
		$("#keterangan").val('');
		$("#kodeakun").val('');
		$("#namaakun").val('');
		$(".input").val('');
		$(".detail").val('');
		$("#kodeakun").focus();
		CariNomor();
	});
	
	$("#kembali").click(function(){
		window.location.replace('media.php?module=pengeluaran_kas');	
	});
	
});

