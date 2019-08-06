<?php 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///clase conexion MySQLi
class DbMySqli{  
 //propiedades 
  	private $conexion; 
	//metodos
	public function MySqli($base_datos){  
		if(!isset($this->conexion)){  
			$this->conexion = new mysqli("localhost", "root", "", $base_datos);  			
			if ($this->conexion->connect_errno or $this->conexion->connect_error) {
    				echo "Fallo al conectar a MySQLi: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
				exit();
			}			
			/* cambiar el conjunto de caracteres a utf8 */
			if (!$this->conexion->set_charset("utf8")) {
    				printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
    				exit();
			} 			
		}				
	} 

	public function selectMySqli($sentencia){//Para SELECT
		$this->conexion->autocommit(FALSE);//Activa o desactiva las modificaciones de la base de datos autoconsignadas
		$this->conexion->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);//Inicia una transacción		
		if($resultado = $this->conexion->query($sentencia)){//Realiza una consulta a la base de datos
			if($this->conexion->commit()){// Consigna la transacción actual
			}else{
				echo "Error en el Commit:".$sentencia;
			}
		}else{
			echo "Error en la consulta: ".$sentencia;
		}		  		
		$resultado = $this->conexion->query($sentencia);
		return $resultado;   	
    	$resultado->close(); //liberar el conjunto de resultados 
		$this->conexion->close();// cerrar la conexión 
	}    	   
	
	public function iudMysqli($sentencia){//Para INSERT, UPDATE, DELETE		
		$this->conexion->autocommit(FALSE);//Activa o desactiva las modificaciones de la base de datos autoconsignadas
		/*
		MYSQLI_TRANS_START_READ_ONLY: Inicia la transacción como "START TRANSACTION READ ONLY".
		MYSQLI_TRANS_START_READ_WRITE: Inicia la transacción como "START TRANSACTION READ WRITE".
		MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT: Inicia como"START TRANSACTION WITH CONSISTENT SNAPSHOT".
		*/
		$this->conexion->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);//Inicia una transacción		
		if($resultado = $this->conexion->query($sentencia)){//Realiza una consulta a la base de datos
			if($this->conexion->commit()){// Consigna la transacción actual
			}else{
				echo "Error en el Commit:".$sentencia;
			}
		}else{
			echo "Error en la consulta: ".$sentencia;
		}
		$resultado = $this->conexion->query($sentencia);
		return $this->conexion->affected_rows; //Retorna numero de filas afectadas: 
		//-1: genero error... 
		//0:  no afecto filas
		//mayor a 0, es el numero de filas afectadas
    	$resultado->close(); //Liberar el conjunto de resultados 
		$this->conexion->close();// cerrar la conexión 
	}

	public function iudMysqliMysqliInsertId($sentencia){//Para INSERT, UPDATE, DELETE		
		$this->conexion->autocommit(FALSE);//Activa o desactiva las modificaciones de la base de datos autoconsignadas
		/*
		MYSQLI_TRANS_START_READ_ONLY: Inicia la transacción como "START TRANSACTION READ ONLY".
		MYSQLI_TRANS_START_READ_WRITE: Inicia la transacción como "START TRANSACTION READ WRITE".
		MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT: Inicia como"START TRANSACTION WITH CONSISTENT SNAPSHOT".
		*/
		$this->conexion->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);//Inicia una transacción		
		if($resultado = $this->conexion->query($sentencia)){//Realiza una consulta a la base de datos
			$resultado = mysqli_insert_id($this->conexion);	
			if($this->conexion->commit()){// Consigna la transacción actual				
			}else{
				echo "Error en el Commit:".$sentencia;
			}
		}else{
			echo "Error en la consulta: ".$sentencia;
		}
		
		
		return $resultado;	//$this->conexion->affected_rows; //Retorna numero de filas afectadas: 
		//-1: genero error... 
		//0:  no afecto filas
		//mayor a 0, es el numero de filas afectadas
    	$resultado->close(); //Liberar el conjunto de resultados 
		$this->conexion->close();// cerrar la conexión 
	}    	   
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*==========================================
=            clase conexion pdo            =
==========================================*/

class conexionPDO{

	static public function conectar($base){
		
		$usuario="root";
		$contraseña="";	
		$dbName=$base;	
		try {
			$bd = new PDO('mysql:host=localhost;port=3306;dbname='.$dbName, $usuario, $contraseña);
			$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$bd ->exec("set names utf8");//cartabetres, Ñ tildes, se puedan recibir sin problemas			
			return $bd;
		} catch(PDOException $e) {
		  echo 'Error conectando con la base de datos: ' . $e->getMessage();
		}
	}	

	static public function conectarIpActiva(){		//realiza la conexion al hosting del dominion: www.mediqboy.com	

		$usuario="mediqboy_Economi";
		$contraseña="789123oc";	
		$dbName="mediqboy_oclaeconomia";
		$host=	"192.185.174.237";
		try {
			$bd = new PDO('mysql:host='.$host.';dbname='.$dbName, $usuario, $contraseña);
			$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$bd ->exec("set names utf8");//cartabetres, Ñ tildes, se puedan recibir sin problemas
			return $bd;
		} catch(PDOException $e) {
		  echo "Error conexion de BD....";		  
		}
	}
	
}


/*=====  End of clase conexion pdo  ======*/

?>