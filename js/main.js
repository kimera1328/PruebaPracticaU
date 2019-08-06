$(function(){
	$(".deptos").on("click",function(){
		var n = $(this).attr("id");
		var documento = $("#documento_"+n).text();
		url = "Ajax/departamentosAjax.php?documento="+documento;
		$("#cargaDatos").load(url);
		console.log(documento);
	});
	$(".updateCiudad").on("click",function(){
		var n = $(this).attr("id");
		var idCiudad = $("#idCiudad_"+n).text(); 
		var nombreCiudad = $("#nombreCiudad_"+n).text();
		$("#txtNbCiudad").val(nombreCiudad);
		$("#txtIdCiudad").val(idCiudad);
		$("#frmCiudades").show();
		$("#actualizaCiudad").show();
		$("#insertCiudad").hide();
		

	});
	$(".btnInserCiudad").on("click",function(){
		$("#frmCiudades").show();
		$("#actualizaCiudad").hide();
		$("#insertCiudad").show();
	});
	$("#insertCiudad").on('click', function() {
		var nombreCiudad = $("#txtNbCiudad").val();
		var idDepartamento = $("#txtDepto").val();
		if (nombreCiudad!="" && idDepartamento!="") {
			url = "Ajax/actualizadorAjax.php?nombreCiudad="+nombreCiudad+"&idDepartamento="+idDepartamento+"&accion=insertCiudad";
			$("#cargaDatos").load(url);
		}else if(nombreCiudad=="" && idCiudad!=""){
			$("#txtNbCiudad").focus();
		}else if(nombreCiudad!="" && idCiudad==""){
			$("#txtIdCiudad").focus();
		}		
	});
	$("#actualizaCiudad").on("click",function(){
		var idCiudad = $("#txtIdCiudad").val();
		var nombreCiudad = $("#txtNbCiudad").val();
		if (nombreCiudad !=""){
			url = "Ajax/actualizadorAjax.php?idCiudad="+idCiudad+"&nombreCiudad="+nombreCiudad+"&accion=updateCiudad";
			$("#cargaDatos").load(url);
		}else{
			$("#txtNbCiudad").focus();
		}
	});
	

	$(".uPersonas").on('click',function() {
		var n = $(this).attr("id");
		var documento = $("#documento_"+n).text();
		var nombre = $("#nombre_"+n).text();
		var idTpDocumento = $("#idTipoDocumento_"+n).val();
		var idCiudad = $("#idCiudad_"+n).text();
		var apellido = $('#apellido_'+n).text();
		var idPersona = $('#idPersona_'+n).val();
		$("#txtCiudad option[value='"+idCiudad+"']").attr("selected", true);
		$("#txtTpDocumento option[value='"+idTpDocumento+"']").attr("selected", true);
		$("#txtDocumento").val(documento);
		$("#txtNombre").val(nombre);
		$("#txtApellido").val(apellido);
		//$("#txtTpDocumento").val(tpDescripcion);
		$("#txtCiudad").val(idCiudad);
		$("#txtIdPersona").val(idPersona);
		$( "#updatePersona" ).prop("disabled",false);
		$( "#updatePersona" ).show();
		$( "#insertarPersona" ).prop("disabled",true);
		$( "#insertarPersona" ).hide();	
		$( "#frmPersonas" ).show();	
		
	});
	$(".dBorrar").on('click',function() {
		var n = $(this).attr("id");
			n = n.split("_");
		var fila  = n[0];
		var idPersona = n[1];	
		
		var url="Ajax/actualizadorAjax.php?accion=deletePersona&idPersona="+n+"&fila="+fila;
				$("#cargaDatos").load(url);		
		
	});	

	$("#updatePersona").on('click', function() {
	
		var txtDocumento = $("#txtDocumento").val();
		var	txtIdPersona = $("#txtIdPersona").val();
		var	txtNombre = $("#txtNombre").val();
		var	txtApellido = $("#txtApellido").val();
		var	txtTpDocumento = $("#txtTpDocumento").val();
		var	txtCiudad = $("#txtCiudad").val();
		if (txtDocumento!="" && txtIdPersona!="" && txtNombre !="" && txtApellido!="" && txtTpDocumento!="" && txtCiudad!="") {
			var url="Ajax/actualizadorAjax.php?txtDocumento="+txtDocumento+"&txtIdPersona="+txtIdPersona+"&txtNombre="+txtNombre+"&txtApellido="+txtApellido+"&txtTpDocumento="+txtTpDocumento+"&txtCiudad="+txtCiudad+"&accion=updatePersona";
			$("#cargaDatos").load(url);
		}else{
			error("Todos Los campos son requeridos");
		}
	});
	$(".inSertar").on("click",function(){
		$( "#updatePersona" ).prop("disabled",true);
		$( "#updatePersona" ).hide();
		$( "#insertarPersona" ).prop("disabled",false);
		$( "#insertarPersona" ).show();	
		$("#frmPersonas").show();
		
	});

	$("#insertarPersona").on("click",function(){
	
		var txtDocumento = escape($("#txtDocumento").val());
		var	txtNombre = escape($("#txtNombre").val());
		var	txtApellido = escape($("#txtApellido").val());
		var	txtTpDocumento = escape($("#txtTpDocumento").val());
		var	txtCiudad = escape($("#txtCiudad").val());
		var url="Ajax/actualizadorAjax.php?txtDocumento="+txtDocumento+"&txtNombre="+txtNombre+"&txtApellido="+txtApellido+"&txtTpDocumento="+txtTpDocumento+"&txtCiudad="+txtCiudad+"&accion=insertaPersona";
		$("#cargaDatos").load(url);
	});

	$(".dEliminaCiudad").on("click",function(){
		var n = $(this).attr("id");
		var idCiudad = $("#idCiudad_"+n).text();
		var url="Ajax/actualizadorAjax.php?idCiudad="+idCiudad+"&accion=eliminaCiudad";
		$("#cargaDatos").load(url);
		console.log(url);

	});	
	function ok(mensaje){
		alertify.success(mensaje); 
		return false;
					    }
	function error(mensaje){
		alertify.error(mensaje); 
		return false; 
	}	
});