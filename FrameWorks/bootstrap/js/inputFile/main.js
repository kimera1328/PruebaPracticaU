$(function(){
	$('.btn-xs').on('click',function(){
		var btn = $(this).attr('id');
			btn = btn.split('_');
			n=btn[1];
		var idSolicitud = $('#idSolicitud_'+n).val();
		url = "controlador/controlCargaMesaUnica.php?accion=mesaUnica&idSolicitud="+idSolicitud;
		$('#modalBody').load(url);


	});
});	