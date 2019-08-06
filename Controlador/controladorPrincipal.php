<?php 
class principalControlador{
	static public function ctrPrincipal(){
		require_once('Vista/plantilla.php');
	}
	static public function ctrDepartamentosCiudad(){
		$resulDepto = modeloGeneral::mdlDeptoCiudad();
		return $resulDepto;
	}
	static public function ctrPersonasCiudad(){
		$resulCiudad = modeloGeneral::mdlPersonasCiudad();
		return $resulCiudad;
	}
	static public function ctrCiudad(){
		$resulCiudad = modeloGeneral::mdlCiudad();
		return $resulCiudad;
	}	
	static public function ctrTipoDocumento(){
		$resulTpDocumento = modeloGeneral::mdlTipoDocumento();
		return $resulTpDocumento;
	}	
	static public function ctrCantidadPersonasAsociadas(){
		$result = modeloGeneral::mdlCantidadPersonasAsociadasTpDocumento();
		return $result;
	}
	static public function ctrCantidaTpSinAsociar(){
		$result = modeloGeneral::mdlTpDocumentoSinAsociar();
		return $result;
	}
	static public function ctrDepartamentos(){
		$result = modeloGeneral::mdlDeptos();
		return $result;
	}							
	

}

?>