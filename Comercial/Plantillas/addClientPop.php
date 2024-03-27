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
						<div class="saveCloseBtn"><input class="form1" type="button" value="Guardar" id="btnSave">
				<input class="form1" type="button" value="Cerrar" id="btnClose"></div>
        	</div>
    	</section>
	</body>
</html>