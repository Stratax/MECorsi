<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="../../JS/jquery-3.7.1.min.js"></script>
		<link rel="stylesheet" href="../../Style/forms.css" />
		
		<title>Nuevo Cliente</title>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#btnSave").click(
					function(){
						$.post(
							"../php/addClienteComer.php",
							{
								razonSocial: $("#razonSocial").val(),
								rfc: $("#rfc").val(),
								nra: $("#nra").val(),
								calle: $("#calle").val(),
								nExt: $("#nExt").val(),
								colonia: $("#colonia").val(),
								delMun: $("#delMun").val(),
								cp: $("#cp").val(),
								estado: $("#estado").val(),
								calleF: $("#calleF").val(),
								nExtF: $("#nExtF").val(),
								coloniaF: $("#coloniaF").val(),
								delMunF: $("#delMunF").val(),
								cpF: $("#cpF").val(),
								estadoF: $("#estadoF").val(),
								contacto: $("#contacto").val(),
								tel1: $("#tel1").val(),
								tel2: $("#tel2").val(),	
								email: $("#email").val()
							},
							function(data,status){
								//alert(data+status);
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
				<h1>Nuevo Cliente</h1>
				<fieldset class="rowcnt">
					<legend>Cliente</legend>
					<input class="form1 col-10" type="text" id="razonSocial" placeholder="Razon Social">
					<input class="form1 col-4" type="text" id="rfc" placeholder="R.F.C.">
					<input class="form1 col-4" type="text" id="nra" placeholder="NRA">
					
				</fieldset>	
				<fieldset class="rowcnt">
					<legend>Domicilio</legend>
					<input class="form1 col-10" type="text"id="calle" placeholder="Calle">
					<input class="form1 col-2" type="text" id="nExt" placeholder="Número">
					<input class="form1 col-6" type="text" id="colonia" placeholder="Colonia">
					<input class="form1 col-6" type="text"  id="delMun" placeholder="Del/Mun">
					<input class="form1 col-2" type="text"  id="cp" placeholder="C.P.">
					<input class="form1 col-8" type="text"  id="estado" placeholder="Estado">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Domicilio Fiscal</legend>
					<input class="form1 col-10" type="text"id="calleF" placeholder="Calle">
					<input class="form1 col-2" type="text" id="nExtF" placeholder="Número">
					<input class="form1 col-6" type="text" id="coloniaF" placeholder="Colonia">
					<input class="form1 col-6" type="text"  id="delMunF" placeholder="Del/Mun">
					<input class="form1 col-2" type="text"  id="cpF" placeholder="C.P.">
					<input class="form1 col-8" type="text"  id="estadoF" placeholder="Estado">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="form1 col-6" type="text" id="contacto" placeholder="Responsable">
					<input class="form1 col-3" type="text" id="tel1" placeholder="Tel 1">
					<input class="form1 col-3" type="text" id="tel2" placeholder="Tel 2">
					<input class="form1 col-6" type="text" id="email" placeholder="E-mail">
				</fieldset>
				<div class="saveCloseBtn"><input class="form1" type="button" value="Guardar" id="btnSave">
				<input class="form1" type="button" value="Cerrar" id="btnClose"></div>
        	</div>
    	</section>
	</body>
</html>