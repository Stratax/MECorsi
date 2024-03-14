<!-- ------------------------------------------
*            *StrDev* -> Manejo Especial 	  +
* Wed Design by Adrián Alberto López Calderón +
*         Project Started On June 2023        +
*		      Use only for CORSI			  +
------------------------------------------- -->
<?php
	session_start();
	if($_SESSION['UCategory'] != 'Comercial' AND $_SESSION['UCategory'] != 'Administrador'){
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
		<script type="text/javascript" src="JS/comercial.js"></script>
		<link rel="stylesheet" href="../Style/global.css" />
		<link rel="stylesheet" href=" Style/styleComer.css" />
		<link rel="shortcut icon" href="../IMG/CORSI.ico" />
		<title>Comercial</title>
	</head>
	
	<body>
		
		<header>
			<div class="rowcnt" id="titleBar">
				<div class="col-2" id="logo">
					<img class="" src="../IMG/Logo_Corsi.png" width="112" height ="40">
				</div>	
				<div class="col-8" id="title">
					
				</div>
				<div class="col-2" id="titleMenu"><!-- Full fill with more options-->
					<img id="userIcon" src="../IMG/user.png" width="25" height ="25">
				</div>
			</div>
		</header>

		<div id="userDiv">
			<?php
				echo '<br>Area: Comercial';	?>
				<hr>
				<a href="../logout.php">Cerrar Sesión</a>
		</div>
		
		<section class="rowcnt">
			<nav class="col-2">
				<ul id="mainMenu">
					<li id="m_Home">Inicio</li>
					<li id="m_Cliente">Clientes</li>
					<li id="m_ManEnt">Manifiestos de Entrada</li>
				</ul>						
			</nav>
			
			<div class="col-2">&nbsp</div>
			<section class="col-10">
				<!-- **** Submodulo Inicio **** -->
				<div class="panel" id="menu1">
					Inicio
				</div>

				<!-- **** CLIENTES ****-->
				<div class="panel" id="menu2"> 
					<div class="rowcnt">
						<div class ="col-6">
							<div id="titleClienteLista" class = "col-12">
								Clientes 
								<input type="button" id ="buttonClienteNuevo" value="Nuevo" class="buttonClienteNuevo">
							</div>
							<div class="clienteHolder col-12">
								<div class="col-12 hTListCliente">
									<div class="col-1">Id</div>
                					<div class="col-6">Razón social</div>
                					<div class="col-3">NRA</div>
                					<div class="col-2">Options</div>
        						</div>
								<div id ="showLista" class="col-12"></div>
							</div>
						</div>
						<div class="col-1" style="height: 500px"></div>
						<div class ="col-5">
							<div id="titleClienteLista" class = "col-12">
								Detalle del Cliente: 
							</div>
							<div class="clienteHolder col-12">
								<div id ="showListaDetalle" class="col-12"></div>
							</div>
						</div>
					</div>
				</div>

				<!-- ***** MANIFIESTO ENTRADA*****-->
				<div class="panel" id="menu3">
					<div class="rowcnt">
						<div class="col-6">
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
						<div class="col-1" style="height: 500px"></div>
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
			</section> 
		</section>

		<footer>
			<p>Design by STRDEV &copy</p>
		</footer>
		
		
	</body>
	
</html>

