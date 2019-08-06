<?php 
 $resultaDepto = principalControlador::ctrDepartamentosCiudad();
 $resultaPersonas = principalControlador::ctrPersonasCiudad();
 $resultaCiudad = principalControlador::ctrCiudad();
 $resultaTipoDocumento = principalControlador::ctrTipoDocumento();
 $cantidadPersonasAsociadasTpDocumento = principalControlador::ctrCantidadPersonasAsociadas();
 $cantidadtioposDocumentosSinAsociar = principalControlador::ctrCantidaTpSinAsociar();
 $resultadoDeptos = principalControlador::ctrDepartamentos();
?>
<div class="container">
	<div><h1><?php echo $_SESSION['nombrePersona']; ?></h1></div>
	<div class="row">
		<div class="card col-md-4 col-md-offset-2" style="width: 18rem;">
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item"><strong>Cantidad De personas Asociadas a un Tipo de documento</strong></li>
		  	<?php foreach ($cantidadPersonasAsociadasTpDocumento as $key => $value0) {?>
				 <li class="list-group-item"><?php echo $value0["decripcionTipo"].": ".$value0["cantPersonas"];  ?></li>
		  	<?php } ?>
		  </ul>
		</div>	
		<div class="card col-md-2 col-md-offset-2" style="width: 18rem;">
		  <ul class="list-group list-group-flush" style=" float: right;">
		    <li class="list-group-item"><strong>Tipos de Documento sin Asociacion</strong></li>
		  	<?php foreach ($cantidadtioposDocumentosSinAsociar as $key => $value00) {?>
				 <li class="list-group-item"><?php echo $value00["decripcionTipo"];  ?></li>
		  	<?php } ?>
		  </ul>
		</div>
	</div>			
	<div class="row">
		<div class="form-group">
			<div class="col-sm-12">
				<form action="" method="post" class="form-horizontal" id="frmCiudades" hidden="" accept-charset="utf-8">
					<div class="form-group">
						<label for="txtNbCiudad">Ciudad:</label>
						<input type="text" class="form-control" name="txtNbCiudad" id="txtNbCiudad" value="">
						<input type="hidden" class="form-control" name="txtIdCiudad" id="txtIdCiudad" value="">
					</div>
					<div class="form-group">
						<label for="txtDepto">Departamento:</label>
						<select id="txtDepto" class="form-control">
							<option value="">**Seleccion**</option>
							<?php  foreach ($resultadoDeptos as $key => $values) { ?>
								<option value="<?php echo $values["idDepartamento"]; ?>"><?php echo $values["descripcionDepto"]; ?></option>
								
							<?php	} ?>
						</select>

					</div>					
					<div class="form-group">
						<button type="button" class="btn btn-block glyphicon glyphicon-refresh btn-success"  id="actualizaCiudad" hidden=""> Actualizar Ciudades</button>
						<button type="button" class="btn btn-block glyphicon glyphicon-plus-sign btn-info"  id="insertCiudad" hidden=""> Add Ciudades</button>
					</div>
				</form>
			</div>
		
		</div>
	</div>	
	<div class="table-responsive">
			<table class="table table-striped table-hover table-condensed table-bordered">
			<thead>
				<caption><h3>Lista Departamentos y Ciudades</h3></caption>
				<tr class="text-center text-danger">
					<th>#</th>
					<th>Cod Departamento</th>
					<th>Nombre Departamento</th>
					<th>Cod Ciudad</th>
					<th>Nombre Ciudad</th>
					<th>Actualizar</th>
					<th>Eliminar</th>
					<th>Insertar</th>
				</tr>
			</thead>
			<tbody>
<?php 	$n=1;
		foreach ($resultaDepto as $key => $value) { ?>				
				<tr>
					<td><?php echo $n; ?></td>
					<td><?php echo $value["idDepartamento"]; ?></td>
					<td><?php echo $value["descripcionDepto"]; ?></td>
					<td id="idCiudad_<?php echo $n; ?>"><?php echo $value["idCiudad"]; ?></td>
					<td id="nombreCiudad_<?php echo $n; ?>"><?php echo $value["descripcionCiudad"]; ?></td>
					<td>
						<button type="button" id="<?php echo $n; ?>" class="btn btn-block glyphicon glyphicon-refresh btn-success updateCiudad"  id="<?php echo $n;?>"></button>
					</td>
					<td>
						<button type="button" id="<?php echo $n; ?>" class="btn btn-block glyphicon glyphicon-floppy-remove btn-danger dEliminaCiudad"  
							id="<?php echo $n;?>"></button>

					</td>
					<td>
						<button type="button" id="<?php echo $n; ?>" class="btn btn-block glyphicon glyphicon-plus-sign btn-info btnInserCiudad"  
							id="<?php echo $n;?>"></button>

					</td>										
				</tr>
<?php   
		$n++;
		} ?>				
			</tbody>
		</table>
	</div>
	<div style="background: #EFEFEF;">
		<form action="" method="post" class="form-horizontal" id="frmPersonas" style="position:relative;width: 90%; left: 5%;" hidden="" accept-charset="utf-8">
			<h3>Formulario Funcionario</h3><hr>
			<div class="form-group">
				<label for="txtDocumento">Documento:</label>
				<input type="number" class="form-control" name="txtDocumento" id="txtDocumento" value="">
				<input type="hidden" class="form-control" name="txtIdPersona" id="txtIdPersona" value="">
			</div>
			<div class="form-group">
				<label for="txtNombre">Nombre:</label>
				<input type="text" class="form-control" name="txtNombre" id="txtNombre" value="">
			</div>	
			<div class="form-group">
				<label for="txtApellido">Apellido:</label>
				<input type="text" class="form-control" name="txtApellido" id="txtApellido" value="">
			</div>	
			<div class="form-group">
				<label for="txtTpDocumento">Tipo Documento:</label>
				<select id="txtTpDocumento" class="form-control">
					<option value=""></option>
					<?php 
					foreach ($resultaTipoDocumento as $key => $value) {
					?>
					<option value="<?php echo $value["idTipoDocumento"]; ?>"><?php echo $value["decripcionTipo"]; ?></option>
						
					<?php	
					}
					?>
				</select>
				<!--<input type="text" class="form-control" name="txtTpDocumento" id="txtTpDocumento" value="">-->
			</div>	
			<div class="form-group">
				<label for="txtCiudad">Ciudad</label>
				<select id="txtCiudad" class="form-control">
					<option value=""></option>
					<?php 
					foreach ($resultaCiudad as $key => $value) {
					?>
					<option value="<?php echo $value["idCiudad"]; ?>"><?php echo $value["descripcionCiudad"]; ?></option>
						
					<?php	
					}
					?>
				</select>				
				<!--<input type="text" class="form-control" name="txtCiudad" id="txtCiudad" value="">-->
			</div>																				
			<button type="button" class="btn btn-block btn-success glyphicon glyphicon-refresh " id="updatePersona"> Actualizar Personas</button>
			<button type="button" class="btn btn-block btn-info glyphicon glyphicon-plus-sign " id="insertarPersona" hidden="" disabled=""> Add Personas</button>		
		</form>

	</div>		
	<div class="table-responsive">
		<table class="table table-striped table-hover table-condensed table-bordered">
			<caption><h3>Cantidad de Personas por Ciudad</h3></caption>
			<thead>
				<tr>
					<th>#</th>
					<th>Numero Documento</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Tipo Documento</th>
					<th>Ciudad</th>
					<th>Departamento</th>
					<th>Actualizar</th>
					<th>Eliminar</th>
					<th>Insertar</th>
				</tr>
			</thead>
			<tbody>
<?php
	 $i=1;
	 foreach ($resultaPersonas as $key => $value1) { ?>				
				<tr id="fila_<?php echo $i; ?>">
					<td><?php echo $i; ?></td>
					<td id="documento_<?php echo $i; ?>"><?php echo $value1["numeroDocumento"]; ?></td>
					<td id="nombre_<?php echo $i; ?>"><?php echo $value1["nombre"]; ?></td>
					<td id="apellido_<?php echo $i; ?>"><?php echo $value1["apellido"]; ?></td>					
					<td id=""><?php echo $value1["decripcionTipo"]; ?></td>
					<td id="descripcionCiudad_<?php echo $i; ?>"><?php echo $value1["descripcionCiudad"]; ?></td>
					<td class="text-center">
						<button type="button" class="btn  btn-danger glyphicon glyphicon-adjust deptos" id="<?php echo $i; ?>"> </button>
					</td>
					<td class="text-center">
						<input type="hidden" name="" id="idCiudad_<?php echo $i; ?>" value="<?php echo $value1['idCiudad']; ?>">
						<input type="hidden" name="" id="idTipoDocumento_<?php echo $i; ?>" value="<?php echo $value1['idTipoDocumento']; ?>">
						<input type="hidden" name="" id="idPersona_<?php echo $i;?>" value="<?php echo $value1['idPersona']; ?>">
						<button type="button" class="btn  btn-success glyphicon glyphicon-refresh uPersonas" id="<?php echo $i; ?>"> </button>
					</td>
					<td class="text-center">
						<button type="button" class="btn  btn-danger glyphicon glyphicon-floppy-remove dBorrar" id="<?php echo  $i."_".$value1["idPersona"]; ?>"></button>
					</td>	
					<td class="text-center">
						<button type="button" class="btn  btn-info glyphicon glyphicon-plus-sign inSertar" id=""></button>
					</td>																
				</tr>
<?php $i++; } ?>				
			</tbody>
		</table>
		<div class="alert alert-info" id="alertaDepto" hidden="">
			
		</div>
	</div>	

	<div id="cargaDatos"></div>

</div>

