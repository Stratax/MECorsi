<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="../../JS/jquery-3.7.1.min.js"></script>
		<link rel="stylesheet" href="../../Style/forms.css" />
		
		<title>Nueva Empresa</title>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#btnSave").click(
					function(){
						$.post(
							"../php/addEmpresa.php",
							{
								razonSocial: $("#razonSocial").val(),
								semarnat: $("#semarnat").val(),
								capacidad: $("#capacidad").val(),
								calle: $("#calle").val(),
								nExt: $("#nExt").val(),
								nInt: $("#nInt").val(),
								colonia: $("#colonia").val(),
								delMun: $("#delMun").val(),
								cp: $("#cp").val(),
								estado: $("#estado").val(),
								responsable: $("#responsable").val(),
								tel1: $("#tel1").val(),
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
				<h1>Nueva Empresa</h1>
				<fieldset class="rowcnt">
					<legend>Empresa</legend>
					<input class="form1 col-19" type="text" id="razonSocial" placeholder="Razon Social">
					<input class="form1 col-9" type="text" id="semarnat" placeholder="SEMARNAT">
                    <input class="form1 col-9" type="text" pattern="[0-9]*[.,]?[0-9]*" id="capacidad" placeholder="Cap. de Almacen KG.">
					
					
				</fieldset>	
				<fieldset class="rowcnt">
					<legend>Domicilio</legend>
					<input class="form1 col-12" type="text"id="calle" placeholder="Calle">
					<input class="form1 col-3" type="text" id="nExt" placeholder="N. Ext">
					<input class="form1 col-3" type="text" id="nInt" placeholder="N. Int">
                    <input class="form1 col-7" type="text" id="colonia" placeholder="Colonia">
					<input class="form1 col-7" type="text"  id="delMun" placeholder="Del/Mun">
					<input class="form1 col-3" type="text"  id="cp" placeholder="C.P.">
					<input class="form1 col-10" type="text"  id="estado" placeholder="Estado">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="form1 col-8" type="text" id="responsable" placeholder="Responsable">
					<input class="form1 col-8" type="text" id="tel1" placeholder="Teléfono">
					<input class="form1 col-8" type="text" id="email" placeholder="E-mail">
				</fieldset>
				<div class="saveCloseBtn"><input class="form1" type="button" value="Guardar" id="btnSave">
				<input class="form1" type="button" value="Cerrar" id="btnClose"></div>
        	</div>
    	</section>
	</body>
</html>