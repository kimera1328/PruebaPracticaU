<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Test Univensidad El bosque</title>
	<link rel="ico" href="Img/ico/image001.ico">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="FrameWorks/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="FrameWorks/dataTables/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="FrameWorks/alertify/alertify.core.css">
	<link rel="stylesheet" href="FrameWorks/alertify/alertify.default.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
		<div class="container">
			<?php 

			if(isset($_POST['txtPersona']) && ($_POST['txtPersona']<>'')){
				$usuario = $_POST['txtPersona'];
				$_SESSION['nombrePersona'] = $usuario;	
				include("vista/modulos/crudPersonas.php");
			}else{
				require_once('vista/modulos/inicioLogueo.php');
			}
			?>
		</div>
	<script type="text/javascript" src="FrameWorks/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="FrameWorks/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="FrameWorks/dataTables/datatables.net/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="FrameWorks/dataTables/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="FrameWorks/alertify/alertify.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>