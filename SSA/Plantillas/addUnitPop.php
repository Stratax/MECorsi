<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="../../JS/jquery-3.7.1.min.js"></script>
		<link rel="stylesheet" href="../../Style/forms.css" />

		<title>Nueva Unidad</title>
		
		<script type="text/javascript">
			$(document).ready(function(){
				
			$("#btnSave").click(
				function(){
					$.post(
						"../php/addUnit.php",
						{
							marca: $("#marca").val(),
							placas: $("#placas").val(),
							tipo: $("#tipo").find("option:selected").val(),
							sct: $("#sct").val(),
							semarnat: $("#semarnat").val(),
							vigSemarnat: $("#vigSemarnat").val(),
							noPoliza: $("#noPoliza").val(),
							vigPoliza: $("#vigPoliza").val(),
							manejoEspecial: $("#manejoEspecial").val(),
							estado: $("#activo").is(":checked"),
							transSel: $("#transSel").find("option:selected").val(),
							operatorSel: $("#operatorSel").find("option:selected").val()
							
						},
						function(data,status){
							//alert(data + status);		
						}
					);
					$('.form1[type="text"]').val("");
					$('.form1[type="date"]').val("");
					//window.close();
				}
			);

			$("#btnClose").click(
				function(){
					window.close();
				}
			);
		});
	</script>
	</head>
	
	<body>
		
		
		<section>
			<div id ="showNuevo">
				<h1>Nueva Unidad</h1>
			<fieldset class="rowcnt">
				<legend>Datos de la unidad</legend>
				<input class="form1 col-10" type="text" id="marca" placeholder="Marca">
				<input class="form1 col-7" type="text"id="placas" placeholder="Placas">
				<select class="col-10" id="tipo">
					<option value="No Definido" selected>Tipo de Unidad...</option>
					<option value="CAJA">CAJA</option>
					<option value="CAJA CERRADA">CAJA CERRADA</option>
					<option value="CAJA REFRIGERADA">CAJA REFRIGERADA</option>
					<option value="CAJA SECA">CAJA SECA</option>
					<option value="CAJA SECA/RABON">CAJA SECA/RABON</option>
					<option value="CAMION CAJA">CAMION CAJA</option>
					<option value="CAMIONETA REDILAS">CAMIONETA REDILLAS</option>
					<option value="CHASIS CONTENEDOR">CHASIS CONTENEDOR</option>
					<option value="EQUIPO ESPECIAL">EQUIPO ESPECIAL</option>
					<option value="PLATAFORMA">PLATAFORMA</option>
					<option value="RABON">RABON</option>
					<option value="REDILAS">REDILAS</option>
					<option value="REMOLQUE">REMOLQUE</option>
					<option value="ROLL OFF">ROLL OFF</option>
					<option value="T 3">T 3</option>
					<option value="TANQUE">TANQUE</option>
					<option value="TORTHON">TORTHON</option>
					<option value="TRACTO CAMIÓN">TRACTO CAMIÓN</option>
					<option value="TRACTOR">TRACTOR</option>
					<option value="VOLTEO">VOLTEO</option>
				</select>
				<input class="form1 col-7" type="text"  id="sct" placeholder="Registro SCT">
				<select id="transSel" class="col-9">
					<option value="-1" selected>Transportadora...</option>
					<?php
						require("../../php/dbcon.php");

						$sql ="SELECT IdTransportadora, RazonSocial FROM Transportadora";
						$stmt = sqlsrv_query($conn,$sql);
						while($row = sqlsrv_fetch_array($stmt)){
							$k = $row['IdTransportadora'];
							$q = $row['RazonSocial'];
							echo '<option value="'.$k.'">'.$q.'</option>';
					
						}
						sqlsrv_close($conn);
					?>
				</select>
				
			</fieldset>
			<fieldset class="rowcnt">
				<legend>Permisos y Vigencias</legend>
				<input class="form1 col-10" type="text"  id="semarnat" placeholder="Semarnat">
				<input class="form1 col-7" type="date"   id="vigSemarnat">
				<input class="form1 col-10" type="text" id="noPoliza" placeholder="Poliza">
				<input class="form1 col-7" type="date" id="vigPoliza">
				<input class="form1 col-10" type="text" id="manejoEspecial" placeholder="Manejo Especial">
				<label class="col-7">Activo: <input class="form1" id="activo" type="checkbox" value="Activo"></label>
				
			</fieldset>
			<div class="saveCloseBtn">
				<input class="form1" type="button" value="Guardar" id="btnSave">
				<input class="form1" type="button" value="Cerrar" id="btnClose">
			</div>

        </div>		
		</section>
	</body>
</html>