<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="../../JS/jquery-3.7.1.min.js"></script>
		<link rel="stylesheet" href="../../Style/forms.css" />
		<title>Nuevo Operador</title>
		<script type="text/javascript">
			$(document).ready(function(){
			$("#btnSave").click(
				function(){
					$.post(
						"../php/addOperator.php",
						{
							nombre: $("#nombre").val(),
							apellidoP: $("#apellidoP").val(),
							apellidoM: $("#apellidoM").val(),
							tel1: $("#tel1").val(),
							tel2: $("#tel2").val(),
							noLicencia: $("#noLicencia").val(),
							vigenciaLicencia: $("#vigenciaLicencia").val(),
							transSel: $("#transSel").find("option:selected").val()						
						},
						function(data,status){
							//alert(data + status);
						}
					);
					$('.form1[type="text"]').val("");
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
			<h1> Nuevo Operador</h1>
			<div id ="showNuevo">
				<fieldset class="rowcnt">
					<legend>Información Personal</legend>
					<input class="form1 col-18" type="text" placeholder="Nombre(s) " id="nombre">
					<input class="form1 col-9" type="text"id="apellidoP" placeholder="Apellido Paterno">
					<input class="form1 col-9" type="text" id="apellidoM" placeholder="Apellido Materno">
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
					<legend>Contacto</legend>
					<input class="form1 col-9" type="text" id="tel1" placeholder="Teléfono">
					<input class="form1 col-9" type="text" id="tel2" placeholder="Teléfono(2)">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Permiso y vigencia</legend>
					<input class="form1 col-10" type="text"  id="noLicencia" placeholder="No de licencia">
					<input class="form1 col-7" type="date"  id="vigenciaLicencia">
				</field>
				
				<div class="saveCloseBtn">
				<input class="form1" type="button" value="Guardar" id="btnSave">
				<input class="form1" type="button" value="Cerrar" id="btnClose"></div>
				
            </div>
        

					
						
		</section>
		
		
	</body>
	
</html>