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
	
	
	$("#lihat").click(function(){
		var tgl1	= $("#tgl1").val();
		//var tgl2	= $("#tgl2").val();
		//window.open('modul/grafik/grafik_jual.php?tgl1='+tgl1+'&tgl2='+tgl2);
		window.open('modul/grafik/grafik_jual.php?tgl1='+tgl1);
		return false();
	});
	
});