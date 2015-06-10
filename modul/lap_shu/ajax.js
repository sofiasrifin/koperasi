// JavaScript Document
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
	
	$("#tgl1").datepicker({
		dateFormat      : "dd/mm/yy",        
	  	showOn          : "button",
	  	buttonImage     : "images/calendar.gif",
	  	buttonImageOnly : true				
	});
	$("#tgl2").datepicker({
		dateFormat      : "dd/mm/yy",        
	  	showOn          : "button",
	  	buttonImage     : "images/calendar.gif",
	  	buttonImageOnly : true				
	});
	
	mati();
	
	$(".pilih").click(function(){
		mati();
	});
	
	function mati(){
		var	pilih	= $(".pilih:checked").val();
		if(pilih=='semua'){
			$("#tgl1").attr("disabled",true);
			$("#tgl2").attr("disabled",true);
			$("#cbo_field").attr("disabled",true);
			$("#text").attr("disabled",true);
		}else if(pilih=='tgl'){
			$("#tgl1").attr("disabled",false);
			$("#tgl2").attr("disabled",false);
			$("#cbo_field").attr("disabled",true);
			$("#text").attr("disabled",true);
		}else if(pilih=='costum'){
			$("#tgl1").attr("disabled",true);
			$("#tgl2").attr("disabled",true);
			$("#cbo_field").attr("disabled",false);
			$("#text").attr("disabled",false);
		}

	}
	$("#lihat").click(function(){
		//lihat(1);
		var win = $.messager.progress({
			title:'Please waiting',
			msg:'Loading data...'
		});
		setTimeout(function(){
			$.messager.progress('close');
			//show1();
			lihat(1);
		},3200)
	});
	
	function lihat(e){
		var tgl1 	= $('#tgl1').val();
		var tgl2 	= $('#tgl2').val();
		var field 	= $('#cbo_field').val();
		var text 	= $('#text').val();
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
			url		: "modul/lap_shu/tampil_data.php",
			data	: "tgl1="+tgl1+"&tgl2="+tgl2+"&field="+field+"&text="+text+"&urut="+urut+"&pilih="+pilih+"&page="+e,
			success	: function(data){
				$("#tampil_data").html(data);
				/*$("#paging_button").load("modul/lap_neraca/paging.php?tgl1="+tgl1+"&tgl2="+tgl2+
										 "&field="+field+"&text="+text+"&urut="+urut+"&pilih="+pilih+"&page="+e);
				*/
			}
		});		
	}
	
	$("#cetak").click(function(){
		var tgl1 	= $('#tgl1').val();
		var tgl2 	= $('#tgl2').val();
		var field 	= $('#cbo_field').val();
		var text 	= $('#text').val();
		var	pilih	= $(".pilih:checked").val();
		var jml_pilih = $(".pilih:checked");
		var urut	= $('#cbo_urut').val();
		
		if(jml_pilih.length == 0){
           var error = true;
           alert("Maaf, Anda belum memilih");
		   //$("#txt_user").focus();
		   return (false);
         }
	
		window.open("modul/laporan/lap-shu.php?tgl1="+tgl1+"&tgl2="+tgl2+
										 "&field="+field+"&text="+text+"&urut="+urut+"&pilih="+pilih);	
		return false();
	});
	
});