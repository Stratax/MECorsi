<!-- ------------------------------------------
*            *StrDev* -> Manejo Especial 	  +
* Wed Design by Adrián Alberto López Calderón +
*         Project Started On June 2023        +
*		      Use only for CORSI			  +
------------------------------------------- -->
<?php
	session_start();
	if($_SESSION['UCategory'] != 2 AND $_SESSION['UCategory'] != 1){
		session_destroy();
		header("Location: index.php");
	}

?>
<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="JS/jquery-3.7.1.min.js"></script>
		<script type="text/javascript" src="JS/menu.js"></script>
		<script type="text/javascript" src="JS/functions.js"></script>
		<script type="text/javascript" src="JS/trans.js"></script>
		<link rel="stylesheet" href="Style/styleClient.css" />
		<title>Dirección</title>
	</head>
	
	<body>
		
		<header>
			<div class="rowcnt" id="titleBar">
				<div class="col-2" id="logo">
					<img class="" src="IMG/Logo_Corsi.png" width="112" height ="40">
				</div>	
				<div class="col-8" id="title">
					TEXTO
				</div>
				<div class="col-2" id="titleMenu">
					<img id="userIcon" src="IMG/user.png" width="25" height ="25">
				</div>
			</div>
		</header>

		<div id="userDiv">
			<?php
				echo '<br>Area: Admin';	?>
				<hr>
				<a href="logout.php">Cerrar Sesión</a>
		</div>
		
		<section class="rowcnt">
			<nav class="col-2">
				<ul id="mainMenu">
					<li id="m_Home">Inicio</li>
					<li id="m_User">Usuarios</li>
					<li id="m_Trans">Transportes</li>
					<li id="m_Select">Boleta de Selección</li>
				</ul>						
			</nav>
			
			<div class="col-2">&nbsp</div>
			<section class="col-10">
				<div class="panel" id="menu1">
					Inicio
				</div>

				<!-- **** USUARIOS ****-->
				<div class="panel" id="menu2"> 
					<div class="userPanel rowcnt">
						<div class="addUserPanel col-3">
							<h2>Agregar Usuario</h2>
							<input type="text" id="nameUser" placeholder="Nombre"/>
							<input type="password" id="passUser" placeholder="Clave"/>
							<select id="categoryUser">
								<option value="1" selected>Administrador</option>
								<option value="2">Dirección</option>
								<option value="3">Comercial</option>
								<option value="4">Operaciones</option>
								<option value="5">SSA</option>
							</select>
							<input type="submit" id ="saveUser" value = "Guardar"/>
						</div>
						<div class="col-1">&nbsp</div>
						<div class="addUserPanel col-8">
							<h2>Usuarios</h2>
							<div class="rowcnt hTable">
								<div class="col-2">&nbsp</div>
								<div class="col-3">Usuarios</div>
								<div class="col-3">Area</div>
								<div class="col-3">Opciones</div>
							</div>
							<div id="userHolder">
								
							</div>
							
						</div>
						<div class="col-12">
						</div>
					</div>
				</div>
				
				<!-- **** TRANSPORTADORA ****-->
				<div class="panel" id="menu3">
					
					<div class="rowcnt">
						<div class="col-6">
							
							<div id ="titleTransLista" class="col-12">
								<p class="col-9">Transportadora</p> 
								<div id ="buttonTransTNuevo" class="col-3 buttonTransNuevo">Nueva</div>
							</div>
							
							<div id ="showLista" class="col-12 transHolder"></div>
						</div>


						<div class="col-1" style="height: 500px"></div>
						<div class="col-5">
							<div id ="titleTransLista" class="col-12">
								<p class="col-9 ht">Operadores</p> 
								<div id ="buttonTransONuevo" class="col-3 buttonTransNuevo">Nuevo</div>
							</div>
							<div id ="showListaOp" class="col-12 operadorHolder"></div>
						</div>
						
						<div class="col-5">
							<div id ="titleTransLista" class="col-12">
								<p class="col-9 ht">Unidades</p> 
								<div id ="buttonTransUNuevo" class="col-3 buttonTransNuevo">Nueva</div>
							</div>
							<div id ="showListaUn" class="col-12 unidadHolder"></div>
						</div>
						
						
					</div>
					
				</div>
				<div class="panel" id="menu4">
					<h2>Boleta de Selección</h2>
					
				</div>

			</section> 
		</section>
		<footer>
			<p>Design by STRDEV &copy</p>
		</footer>
		
		
	</body>
	
</html>

