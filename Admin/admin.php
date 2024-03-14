<!-- ------------------------------------------
*            *StrDev* -> Manejo Especial 	  +
* Wed Design by Adrián Alberto López Calderón +
*         Project Started On June 2023        +
*		      Use only for CORSI			  +
------------------------------------------- -->
<?php
	session_start();
	if($_SESSION['UCategory'] != 'Administrador'){
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
		<script type="text/javascript" src="JS/admin.js"></script>
		
		<link rel="stylesheet" href="../Style/global.css" />
		<link rel="stylesheet" href="../Style/modal.css" />
		<link rel="stylesheet" href="../Style/forms.css" />
		<link rel="stylesheet" href=" Style/styleAdmin.css" />
		
		<link rel="shortcut icon" href="../IMG/CORSI.ico" />
		
		<title>Administrador de Sistema - MECORSI</title>
	</head>
	
	<body>
		<header>
			<div class="rowcnt" id="titleBar">
				<div class="col-2" id="logo">
					<img class="" src="../IMG/Logo_Corsi.png" width="112" height ="40">
				</div>	
				<div class="col-8" id="title"></div>

				<div class="col-2" id="titleMenu"><!-- Full fill with more options-->
					<img id="userIcon" src="../IMG/user.png" width="25" height ="25">
				</div>
			</div>
		</header>

		<div id="userDiv">
			<?php
				echo '<br>Usuario: ' . $_SESSION['UCategory'];	
			?>
				<hr>
				<a href="../php/logout.php" id="closeSession">Cerrar Sesión</a>
		</div>
		
		<section class="rowcnt">
			<nav class="col-2">
				<ul id="mainMenu">
					<li id="m_Home">Inicio</li>
					<li id="m_User">Usuarios</li>
					<li id="m_Modulos">Módulos</li>
				</ul>						
			</nav>
			
			<div class="col-2">&nbsp</div>
			<section class="col-10">
				<!-- **** Submodulo Inicio **** -->
				<div class="panel" id="menu1">
					Inicio
				</div>

				<!-- **** USUARIOS ****-->
				<div class="panel" id="menu2"> 
					<div class="rowcnt">
						<div class="fullPanel col-5" style="margin-right:15px;">
							<form>
								<input type="text" id="nameUser" placeholder="Nombre" required>
								<br><input type="password" id="passUser" placeholder="Clave" required>
								<br><select id="categoryUser">
									<option value="Administrador" selected>Administrador</option>
									<option value="Dirección">Dirección</option>
									<option value="Comercial">Comercial</option>
									<option value="Operaciones">Operaciones</option>
									<option value="SSA">SSA</option>
								</select>
								<br><input type="submit" id ="saveUser" value = "Agregar Usuario"/>
							</form>
							
						</div>
						<div class="fullPanel col-6">
							<div class="rowcnt headerTableList">
								<div class="col-3">Usuario</div>
								<div class="col-3">Categoría</div>
								<div class="col-3">Administrar</div>
								<div class="col-3">Conexión</div>
							</div>
							<div id="userHolder">
								
							</div>
							
						</div>

						
					</div>
				</div>

				<div class="panel" id="menu3">
					<div class="rowcnt">
						<div class="col-6 modulos">
							<div class="col-3">&nbsp</div>
							
							<div class="col-6 modulos"><a href="../Direccion/direccion.php">
								<img src="../IMG/world.png" width="100" height="100"><br>Dirección
							</a></div>
							
						</div>
						<div class="col-6 modulos">
							<a href="../Comercial/comercial.php"><img src="../IMG/world.png" width="100" height="100"><br>Comercial</a>		
						</div>
						<div class="col-6 modulos">
							<a href="../Operaciones/operacion.php"><img src="../IMG/world.png" width="100" height="100"><br>Operaciones</a>		
						</div>
						<div class="col-6 modulos">
							<a href="../SSA/ssa.php"><img src="../IMG/world.png" width="100" height="100"><br>S.S.A.</a>		
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

