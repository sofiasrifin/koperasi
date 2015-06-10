// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$(".data").flexigrid({
		  url : 'modul/jual/cari_barang/post-json.php',
		  dataType : 'json',
		  colModel : [{display : 'No',name : 'no',width : 20,sortable : false,align : 'center'},
					  {display : 'Kode',name : 'kode_barang',width : 60,sortable : true,align : 'center'}, 
					  {display : 'Nama Barang',name : 'nama_barang',width : 180,sortable : true,align : 'left'}, 
					 /* {display : 'Harga Beli',name : 'harga_beli',width : 60,sortable : true,align : 'right'},	*/
					  {display : 'Harga Jual',name : 'harga_jual',width : 60,sortable : true,align : 'right'},
					  {display : 'Stok',name : 'stok_awal',width : 30,sortable : true,align : 'center'},
				/*	  {display : 'Beli',name : 'jmlbeli',width : 30,sortable : true,align : 'center'},
					  {display : 'Jual',name : 'jmljual',width : 30,sortable : true,align : 'center'},	*/
					  {display : 'Akhir',name : 'stokakhir',width : 30,sortable : true,align : 'center'}	
		  ],
		  buttons : [{name : 'OK',bclass : 'add',onpress : test}
		  ],
		  searchitems : [ 
			  {display : 'Kode',name : 'kode_barang',isdefault : true}, 
			  {display : 'Nama Barang',name : 'nama_barang'	} 
			 
		  ],
		  sortname : "kode_barang",
		  sortorder : "asc",
		  singleSelect : true,
		  usepager : true,
		  title : 'Daftar Barang',
		  useRp : true,
		  rp : 10,
		  showTableToggleBtn : false,
		  height : 300,
		  pagetext: 'Hal ',
		  outof: 's.d'
	  });
	  function test(com, grid) {
		  if (com == 'OK') {
			  //alert('Add New Item');
			  if ($('.trSelected',grid).length == 1) { 
				$('.trSelected',grid).each(function() {
				 var id = $(this).attr('id');
				 id = id.substring(id.lastIndexOf('row')+3);  // ambil data kolom id       
				 	//EditData(id);
					$("#kodebarang").val(id);
					$("#form_cari_barang").dialog('close');
					$("#kodebarang").focus();
					//alert(id);
				});    
			   } else {
				alert('Silahkan pilih salah satu baris yang ingin di edit');
				return false;
			   }
		  }
	  }

});