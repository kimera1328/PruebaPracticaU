<?php
class modeloGeneral{
	static public function mdlDeptoCiudad(){
		$sql="SELECT d.idDepartamento,d.descripcionDepto,c.idCiudad,c.descripcionCiudad
			  FROM departamento d,ciudad c
			  WHERE d.idDepartamento = c.idDepartamento";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> execute();	
		return	$stmt -> fetchAll();			  
	}
	static public function mdlDeptos(){
		$sql="SELECT *
			  FROM departamento";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> execute();	
		return	$stmt -> fetchAll();			  
	}	
	static public function mdlCiudad(){
		$sql="SELECT *
			  FROM ciudad ";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> execute();	
		return	$stmt -> fetchAll();			  
	}	
	static public function mdlTipoDocumento(){
		$sql="SELECT *
			  FROM tipodocumento ";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> execute();	
		return	$stmt -> fetchAll();			  
	}		
	
	static public function mdlPersonasCiudad(){
		$sql="SELECT p.idPersona,p.idCiudad,p.idTipoDocumento,p.numeroDocumento,p.nombre,p.apellido,c.descripcionCiudad,tp.decripcionTipo
			  FROM persona p, ciudad c, tipodocumento tp
			  WHERE p.idCiudad = c.idCiudad AND 
			  		p.idTipoDocumento = tp.idTipoDocumento";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> execute();	
		return	$stmt -> fetchAll();			  
	}
	static public function mdlTpDocumentoSinAsociar(){
		$sql="SELECT tipodocumento.`idTipoDocumento`,tipodocumento.decripcionTipo
				FROM persona
				RIGHT JOIN tipodocumento ON persona.idTipoDocumento=tipodocumento.idTipoDocumento
				WHERE  persona.idTipoDocumento IS NULL";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> execute();	
		return	$stmt -> fetchAll();			  
	}
	static public function mdlCantidadPersonasAsociadasTpDocumento(){
		$sql="
			SELECT COUNT(persona.idPersona) cantPersonas,tipodocumento.decripcionTipo
			FROM persona,tipodocumento
			WHERE persona.`idTipoDocumento` = tipodocumento.`idTipoDocumento` 
			GROUP BY persona.idTipoDocumento,tipodocumento.decripcionTipo";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> execute();	
		return	$stmt -> fetchAll();			  
	}		

	static public function mdlDeptoFuncionario($dc){
		$sql="SELECT p.*,d.descripcionDepto AS departamento
			  FROM persona p,ciudad c, departamento d
			  WHERE p.idCiudad = c.idCiudad AND
			      c.idDepartamento = d.idDepartamento AND
			      p.numeroDocumento = :documento";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> bindParam(":documento",$dc, PDO::PARAM_STR);
		$stmt -> execute();	
		return	$stmt -> fetchAll();			  
	}			
	static public function mdlActualizaCiudad($idCiudad,$nombreCiudad){
		 $sql="UPDATE ciudad SET descripcionCiudad= :nombreCiudad WHERE idCiudad=:codCiudad";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> bindParam(":nombreCiudad",$nombreCiudad, PDO::PARAM_STR);
		$stmt -> bindParam(":codCiudad",$idCiudad, PDO::PARAM_STR);
		try { 			
			$stmt -> execute();
			return 1;
		}catch(Exception $e) { 
			return 'Exception -> '; 
			var_dump($e->getMessage()); 
			//return 0;
		} 	  
	}	
	
	static public function mdlActualizaPersona($txtDocumento,$txtIdPersona,$txtNombre,$txtApellido,$txtTpDocumento,$txtCiudad){
		$sql="UPDATE persona SET idCiudad = :idCiudad,idTipoDocumento= :idTipoDocumento, numeroDocumento = :numeroDocumento, nombre=:nombre,apellido = :apellido
			  WHERE idPersona =:idPersona";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> bindParam(":idPersona",$txtIdPersona, PDO::PARAM_STR);
		$stmt -> bindParam(":idCiudad",$txtCiudad, PDO::PARAM_STR);
		$stmt -> bindParam(":numeroDocumento",$txtDocumento, PDO::PARAM_STR);
		$stmt -> bindParam(":nombre",$txtNombre, PDO::PARAM_STR);
		$stmt -> bindParam(":apellido",$txtApellido, PDO::PARAM_STR);
		$stmt -> bindParam(":idTipoDocumento",$txtTpDocumento, PDO::PARAM_STR);
		try { 			
			$stmt -> execute();
			return 1;
		}catch(Exception $e) { 
			return 'Exception -> '; 
			var_dump($e->getMessage()); 
			//return 0;
		} 	  
	}	
	static public function mdlEliminaPersona($idPersona){
		$sql="DELETE FROM persona WHERE idPersona=:idPersona";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> bindParam(":idPersona",$idPersona, PDO::PARAM_STR);
		try { 			
			$stmt -> execute();
			return 1;
		}catch(Exception $e) { 
			return 'Exception -> '; 
			var_dump($e->getMessage()); 
			//return 0;
		} 	  
	}
	static public function mdlInsertPersona($txtDocumento,$txtNombre,$txtApellido,$txtTpDocumento,$txtCiudad){
		$sql="INSERT INTO persona 
			        (idCiudad,
			        idTipoDocumento,
			        numeroDocumento,
			        nombre,
			        apellido)
			  VALUES( ".$txtCiudad.",
			  	      ".$txtTpDocumento.",
			  	      ".$txtDocumento.",
			  	      '".$txtNombre."',
			  	      '".$txtApellido."')";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		try { 			
			$stmt -> execute();
			return 1;
		}catch(Exception $e) { 
			return 'Exception -> '; 
			var_dump($e->getMessage()); 
			//return 0;
		} 	  
	}		
	static public function mdlEliminaCiudad($idCiudad){
		$sql="DELETE FROM ciudad WHERE idCiudad=:idCiudad";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> bindParam(":idCiudad",$idCiudad, PDO::PARAM_STR);
		
		try { 			
			$stmt -> execute();
			return 1;
		}catch(Exception $e) { 
			return 'Exception -> '; 
			var_dump($e->getMessage()); 
			//return 0;
		} 	  
	}	
	static public function mdlEliminaCiudadPersonas($idCiudad){
		$sql="DELETE FROM persona WHERE idCiudad=:idCiudad";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> bindParam(":idCiudad",$idCiudad, PDO::PARAM_STR);
		try { 			
			$stmt -> execute();
			return 1;
		}catch(Exception $e) { 
			return 'Exception -> '; 
			var_dump($e->getMessage()); 
			//return 0;
		} 	  
	}	
	static public function mdlInserCiudad($nombreCiudad,$idDepartamento){
		$sql="INSERT INTO ciudad (idDepartamento,descripcionCiudad)VALUES(:idDepto,:descripcionCiudad)";
		$stmt = conexionPDO::conectar('universidadbosque')->prepare($sql);
		$stmt -> bindParam(":descripcionCiudad",$nombreCiudad, PDO::PARAM_STR);
		$stmt -> bindParam(":idDepto",$idDepartamento, PDO::PARAM_STR);
		try { 			
			$stmt -> execute();
			return 1;
		}catch(Exception $e) { 
			return 'Exception -> '; 
			var_dump($e->getMessage()); 
			//return 0;
		} 	  
	}

}