<!-- ------------------------------------------
*            *StrDev* -> Manejo Especial 	  +
* Wed Design by Adrián Alberto López Calderón +
*         Project Started On June 2023        +
*		      Use only for CORSI			  +
------------------------------------------- -->
<?php
	session_start();
	if($_SESSION['UCategory'] != 'Operaciones' AND $_SESSION['UCategory'] != 'Administrador'){
		session_destroy();
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<script src="../JS/jquery-3.7.1.min.js"></script>
		<script type="text/javascript" src="JS/operacion.js"></script>
		
		<link rel="stylesheet" href="../Style/global.css"/>
		<link rel="stylesheet" href="../Style/modal.css"/>
		<link rel="stylesheet" href="../Style/forms.css"/>
		<link rel="stylesheet" href="Style/styleOperacion.css"/>
		<title>Operaciones</title>
	</head>
	
	<body>
		
		<header>
			<div class="rowcnt" id="titleBar">
				<div class="col-2" id="logo">
					<img class="" src="../IMG/Logo_Corsi.png" width="112" height ="40">
				</div>	
				<div class="col-8" id="title">

				</div>
				<div class="col-2" id="titleMenu">
					<img id="userIcon" src="../IMG/user.png" width="25" height ="25">
				</div>
			</div>
		</header>

		<div id="userDiv">
			<?php
				echo '<br>Area: Operaciones';	?>
				<hr>
				<a href="../logout.php">Cerrar Sesión</a>
		</div>
		
		<section class="rowcnt">
			<nav class="col-2">
				<ul id="mainMenu">
					<li id="m_Home">Inicio</li>
					<li id="m_ManEn">Manifiesto de Entrada</li>
					<li id="m_ManSa">Manifiesto de Salida</li>
					<li id="m_Traza">Trazabilidad</li>
				</ul>						
			</nav>
			
			<div class="col-2">&nbsp</div>
			<section class="col-10">

<!--**********************************************************-->
<!-------              **** INICIO ****         -------->
<!--**********************************************************-->				
				<div class="panel" id="menu1">
					Inicio
				</div>
<!--**********************************************************-->
<!-------        **** MANIFIESTO DE ENTRADA****         -------->
<!--**********************************************************-->

				<div class="panel" id="menu2"> 
					<div class="rowcnt">
						<div class="col-6" style="margin-right:15px;">
							<div id="titleClienteLista" class = "col-12">
								Manifiesto 
								<input type="submit" id ="buttonManifiestoNuevo" value="Nuevo" class="buttonManifiestoNuevo">
							</div>
							<div class="clienteHolder col-12">
								<div class="col-12 hTListCliente">
									<div class="col-2">Manifiesto</div>
                					<div class="col-4">Cliente</div>
                					<div class="col-4">Destino</div>
                					<div class="col-2">Options</div>
        						</div>
								<div id ="showManifiesto" class="col-12"></div>
							</div>
						</div>
						<div class ="col-5">
							<div id="titleClienteLista" class = "col-12">
								Detalle del Manifiesto: 
							</div>
							<div class="clienteHolder col-12">
								<div id ="showManifiestoDetalle" class="col-12"></div>
							</div>
						</div>
					</div>
				</div>

				<!-- **** MAnifiesto de Salida **** -->
				<div class="panel" id="menu3"> 
					Manifiesto de Salida
				</div>
				
				<!-- **** Trazabilidad **** -->
				<div class="panel" id="menu4">
					Trazabilidad					
				</div>
				

			</section> 
		</section>
		<footer>
			<p>Design by STRDEV &copy</p>
		</footer>
		
		
	</body>
	
</html>

