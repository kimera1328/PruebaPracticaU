<?php 
include("../conexion/conexion.php");
include("../Modelo/generalModelo.php");
$documento = $_GET["documento"];
print_r($cns = modeloGeneral::mdlDeptoFuncionario($documento));

$departamento = $cns[0]["departamento"];
echo '<script type="text/javascript">
			$("#alertaDepto").text("Departamento de: '.$departamento.'");
			$("#alertaDepto").show();
	  </script>';
?>

