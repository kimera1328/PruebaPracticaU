<?php  
include("../conexion/conexion.php");
include("../Modelo/generalModelo.php");
if (isset($_GET["accion"])) {
	$accion = $_GET["accion"];
	if ($accion == "updateCiudad") {
		$idCiudad = $_GET["idCiudad"];
		$nombreCiudad = $_GET["nombreCiudad"];
		 $update = modeloGeneral::mdlActualizaCiudad($idCiudad,$nombreCiudad);
		if ($update ==1) {
			echo '<script>
					ok("Ciudad Actualizada Correctamente");
					function ok(mensaje){
								alertify.success(mensaje); 
								return false;
				    }					
				</script>';
		}else{
			echo '<script>	
					error("Error al Actualizar");
					function error(mensaje){
								alertify.error(mensaje); 
								return false; 
					}					
				</script>';			
		}
	}else if($accion == 'updatePersona'){
		$txtDocumento = $_GET["txtDocumento"];
		$txtIdPersona = $_GET["txtIdPersona"];
		$txtNombre = $_GET["txtNombre"];
		$txtApellido = $_GET["txtApellido"];
		$txtTpDocumento = $_GET["txtTpDocumento"];
		$txtCiudad = $_GET["txtCiudad"];
	    $updatePersona = modeloGeneral::mdlActualizaPersona($txtDocumento,$txtIdPersona,$txtNombre,$txtApellido,$txtTpDocumento,$txtCiudad);
		if ($updatePersona ==1) {
			echo '<script>
					ok("Persona Actualizada Correctamente");
					function ok(mensaje){
								alertify.success(mensaje); 
								return false;
				    }					
				</script>';
		}else{
			echo '<script>	
					error("Error al Actualizar Persona");
					function error(mensaje){
								alertify.error(mensaje); 
								return false; 
					}					
				</script>';			
		}		 
	}else if($accion == 'deletePersona'){
		$idPersona = $_GET['idPersona'];
		$fila = $_GET['fila'];
		$deletePersona =  modeloGeneral::mdlEliminaPersona($idPersona);
		if ($deletePersona ==1) {
			echo '<script>
					$("#fila_'.$fila.'").remove();
					ok("ok Persona EliminadaCorrectamente");
					function ok(mensaje){
								alertify.success(mensaje); 
								return false;
				    }					
				</script>';
		}else{
			echo '<script>	
					error("Error al Eliminar");
					function error(mensaje){
								alertify.error(mensaje); 
								return false; 
					}					
				</script>';			
		}		
	}else if($accion == 'insertaPersona'){
		$txtDocumento = $_GET["txtDocumento"];
		$txtNombre = $_GET["txtNombre"];
		$txtApellido = $_GET["txtApellido"];
		$txtTpDocumento = $_GET["txtTpDocumento"];
		$txtCiudad = $_GET["txtCiudad"];
		$insertPersona =  modeloGeneral::mdlInsertPersona($txtDocumento,$txtNombre,$txtApellido,$txtTpDocumento,$txtCiudad);
		if ($insertPersona ==1) {
			echo '<script>
					
					ok("ok Persona Registrada Correctamente");
					function ok(mensaje){
								alertify.success(mensaje); 
								return false;
				    }					
				</script>';
		}else{
			echo '<script>	
					error("Error al Agregar");
					function error(mensaje){
								alertify.error(mensaje); 
								return false; 
					}					
				</script>';			
		}	
	}else if($accion == "eliminaCiudad"){
		$idCiudad = $_GET["idCiudad"];
		$eliminaCiudadPersona =  modeloGeneral::mdlEliminaCiudadPersonas($idCiudad);
		if ($eliminaCiudadPersona>0) {
			$elimina =  modeloGeneral::mdlEliminaCiudad($idCiudad);
			if ($elimina ==1) {
				echo '<script>
						ok("ok Ciudad Eliminada Correctamente");
						function ok(mensaje){
									alertify.success(mensaje); 
									return false;
					    }					
					</script>';
			}else{
				echo '<script>	
						error("Error al Eliminar");
						function error(mensaje){
									alertify.error(mensaje); 
									return false; 
						}					
					</script>';			
			}	
		}	
	}else if($accion == "insertCiudad"){
		$nombreCiudad = $_GET["nombreCiudad"];
		$idDepartamento = $_GET["idDepartamento"];
		$insertaCiudad =  modeloGeneral::mdlInserCiudad($nombreCiudad,$idDepartamento);
			if ($insertaCiudad ==1) {
				echo '<script>
						ok("Registrado Correctamente");
						function ok(mensaje){
									alertify.success(mensaje); 
									return false;
					    }					
					</script>';
			}else{
				echo '<script>	
						error("Error al Registrar");
						function error(mensaje){
									alertify.error(mensaje); 
									return false; 
						}					
					</script>';			
			}		
	}
}
?>
