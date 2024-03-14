<?php
	require("../../php/dbcon.php");
	$sql ="SELECT Valor FROM Consecutivo WHERE Tabla ='ManifiestosEntrada'";
	$stmt = sqlsrv_query($conn,$sql);
	$row = sqlsrv_fetch_array($stmt);
	$consecutivo = $row['Valor'] + 1;
	$sql2 = "UPDATE Consecutivo SET Valor = {$consecutivo} WHERE Tabla = 'ManifiestosEntrada'";
	$stmt = sqlsrv_query($conn,$sql2);
	sqlsrv_close($conn);
?>

<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="../../JS/jquery-3.7.1.min.js"></script>
		<link rel="stylesheet" href="../../Style/forms.css" />
		
		<title>Nuevo Manifiesto</title>
		
		<script type="text/javascript">
			$(document).ready(function(){
				
				$("#clienteMan").on('change',function(){
					$("#datosCliente").load("../php/datosCliente.php",{cliente: this.value})
				});
				
				$("#transportadoraMan").on('change', function(){
					$("#unidadMan1").load("../php/selectUnidad.php",{transportadora: this.value,nUnidad: ' 1'});
					$("#operadorMan").load("../php/selectOperador.php",{transportadora: this.value});
					$("#unidadMan2").load("../php/selectUnidad.php",{transportadora: this.value,nUnidad: ' 2'});
					$("#datosTransportadora").load("../php/datosTransportadora.php",{transportadora: this.value});					
				});
				
				$("#destinoMan").on('change',function(){
					$("#datosDestino").load("../php/datosDestino.php",{destino: this.value})	
				});

				$("#btnSave").click(
					function(){
						$.post(
							"../php/addManifiestoEntrada.php",
							{
								idManifiesto: $("#idManifiestoMan").text(),
								idCliente: $("#clienteMan").find("option:selected").val(),
								IdTransportadora: $("#transportadoraMan").find("option:selected").val(),
								idUnidad: $("#unidadMan1").find("option:selected").val(),
								idUnidad2: $("#unidadMan2").find("option:selected").val(),
								idOperador: $("#operadorMan").find("option:selected").val(),
								idEmpresa: $("#destinoMan").find("option:selected").val(),
								fechaDestino: $("#fechaDestino").val(),
								
							},
							function(data,status){
								alert(data+status);
							}
						);
						$('.form1[type="text"]').val("");
						//window.close();
					}
				);
				
				$("#btnClose").click(function(){window.close();});
			});
		</script>
	</head>
	
	<body>				
		<section>
			<div id ="showNuevo">
				<h1>Manifiesto: 
					
						<?php

							$idManifiesto = 'E'.str_pad($consecutivo,4,"0",STR_PAD_LEFT)."/".Date('y');
							echo '<div id="idManifiestoMan" value='.$idManifiesto.'>'.$idManifiesto.'</div>';
							
						?>
					
				</h1>
				<fieldset class="rowcnt">
					<legend>Cliente</legend>
					<select id="clienteMan" class="col-18">
						<option value="-1" selected>Cliente</option>
						<?php
							require("../../php/dbcon.php");
							$sql = "SELECT IdCliente, RazonSocial FROM Cliente";
							$stmt = sqlsrv_query($conn,$sql);
							while($row = sqlsrv_fetch_array($stmt)){
								$idCliente = $row['IdCliente'];
								$razonSocial = $row['RazonSocial'];
								echo '<option value="'.$idCliente.'">'.$razonSocial.'</option>';
							}
							sqlsrv_close($conn);
						?>
					</select>
					<div id="datosCliente" class="rowcnt"></div>
					
				</fieldset>	
				<fieldset class="rowcnt">
					<legend>Transportadora</legend>
					<?php
						require("../../php/dbcon.php");
						$sql = "SELECT IdTransportadora, RazonSocial FROM Transportadora";
						$stmt = sqlsrv_query($conn,$sql);
						echo '<select id="transportadoraMan" class="col-18">
								<option value = "-1" selected>Transportadora</option>';
					
						while($row = sqlsrv_fetch_array($stmt)){
							$idTransportadora = $row['IdTransportadora'];
							$razonSocial = $row['RazonSocial'];
							echo '<option value="'.$idTransportadora.'">'.$razonSocial.'</option>';
						}
						echo '</select>';
						sqlsrv_close($conn);
					?>
					<select id="operadorMan" class="col-18">
						<option value="-1">Operador</option>
					</select>
					<select id="unidadMan1" class="col-9">
						<option value="-1">Unidad 1</option>
					</select>
					<select id="unidadMan2" class="col-9">
						<option value="-1">Unidad 2</option>
					</select>
					<div id="datosTransportadora" class="rowcnt"></div>

				</fieldset>
				<fieldset class="rowcnt">
					<legend>Destino</legend>
					<select id="destinoMan" class="col-18">
						<option value = "-1" selected>Destino</option>
						<?php
							require("../../php/dbcon.php");
							$sql = "SELECT IdEmpresa, RazonSocial FROM Empresa";
							$stmt = sqlsrv_query($conn,$sql);
							while($row = sqlsrv_fetch_array($stmt)){
								$idEmpresa = $row['IdEmpresa'];
								$razonSocial = $row['RazonSocial'];
								echo '<option value="'.$idEmpresa.'">'.$razonSocial.'</option>';
							}
							sqlsrv_close($conn);
						?>
					</select>
					<div id="datosDestino" class="rowcnt"></div>
				</fieldset>
				<fieldset>
					<legend>Fecha de recepción</legend>
					<input  type="date" id="fechaDestino">
				</fieldset>
				<div class="saveCloseBtn"><input class="form1" type="button" value="Guardar" id="btnSave">
				<input class="form1" type="button" value="Cerrar" id="btnClose"></div>
        	</div>
    	</section>
	</body>
</html>

<!-- *** Don't lost the track **** -->
<!-- 
	Save the data gather in the form
	and pass the consecutive as a data to increase iit 
	in the database.
-->