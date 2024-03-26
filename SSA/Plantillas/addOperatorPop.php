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
			

					
						
		</section>
		
		
	</body>
	
</html>