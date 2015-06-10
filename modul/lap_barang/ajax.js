// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#lihat").click(function(){
		lihat(1);
	});
	
	function lihat(e){
		var kode1 	= $('#cbo_kode1').val();
		var kode2 	= $('#cbo_kode2').val();
		var satuan 	= $('#cbo_satuan').val();
		var nama 	= $('#namabarang').val();
		var	pilih	= $(".pilih:checked").val();
		var jml_pilih = $(".pilih:checked");
		var urut	= $('#cbo_urut').val();
		
		if(jml_pilih.length == 0){
           var error = true;
           alert("Maaf, Anda belum memilih");
		   //$("#txt_user").focus();
		   return (false);
         }
		 
		$.ajax({
			type	: "GET",
			url		: "modul/lap_barang/tampil_data.php",
			data	: "kode1="+kode1+"&kode2="+kode2+"&satuan="+satuan+"&pilih="+pilih+"&nama="+nama+"&urut="+urut+"&page="+e,
			success	: function(data){
				$("#tampil_data").html(data);
				$("#paging_button").load('modul/lap_barang/paging.php?kode1='+kode1+'&kode2='+kode2+"&urut="+urut+
										'&satuan='+satuan+'&pilih='+pilih+'&nama='+nama+'&page='+e);
				
			}
		});		
	}
	
	$("#cetak").click(function(){
		var kode1 	= $('#cbo_kode1').val();
		var kode2 	= $('#cbo_kode2').val();
		var satuan 	= $('#cbo_satuan').val();
		var nama 	= $('#namabarang').val();
		var	pilih	= $(".pilih:checked").val();
		var jml_pilih = $(".pilih:checked");
		var urut	= $('#cbo_urut').val();
		
		if(jml_pilih.length == 0){
           var error = true;
           alert("Maaf, Anda belum memilih");
		   //$("#txt_user").focus();
		   return (false);
         }
	
		window.open('modul/laporan/lap-barang.php?kode1='+kode1+'&kode2='+kode2+"&urut="+urut+
										'&satuan='+satuan+'&pilih='+pilih+'&nama='+nama);	
		return false();
	});
	
});



