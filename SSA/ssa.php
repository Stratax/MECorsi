<!-- ------------------------------------------
*            *StrDev* -> Manejo Especial 	  +
* Wed Design by Adrián Alberto López Calderón +
*         Project Started On October 2023     +
*		      Use only for CORSI			  +
------------------------------------------- -->
<?php
	session_start();
	if($_SESSION['UCategory'] != 'SSA' AND $_SESSION['UCategory'] != 'Administrador'){
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
		<script type="text/javascript" src="JS/ssa.js"></script>
		
		<link rel="stylesheet" href="../Style/global.css" />
		<link rel="stylesheet" href="../Style/modal.css" />
		<link rel="stylesheet" href="../Style/forms.css" />
		<link rel="stylesheet" href="../SSA/Style/styleSSA.css" />
		
		<link rel="shortcut icon" href="../IMG/CORSI.ico"/>
		<title>S.S.A.</title>
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
				echo '<br>Area: SSA';	?>
				<hr>
				<a href="../logout.php">Cerrar Sesión</a>
		</div>
		
		<section class="rowcnt">
			<nav class="col-2">
				<ul id="mainMenu">
					<li id="m_Home">Inicio</li>
					<li id="m_Trans">Transportadora</li>
					<li id="m_Empresa">Empresa</li>
				</ul>						
			</nav>
			
			<div class="col-2">&nbsp</div>
			<section class="col-10">
				<!-- **** Inicio **** -->
				<div class="panel" id="menu1">
					
				</div>


				
				<!-- **** TRANSPORTADORA ****-->
				<div class="panel" id="menu2">
					<div class="rowcnt">
						<div class="col-6" style="margin-right:15px;">
							<div id ="titleTransLista" class="col-12">
								Transportadoras 
								<input type="submit" id ="buttonTransTNuevo" value="Nueva" class="buttonTransNuevo">
							</div>
							
							<div class="fullPanel col-12">
								<div class="rowcnt headerTableList">
									<div class="col-1">Id</div>
                					<div class="col-4">Razón social</div>
                					<div class="col-4">Delegación/Municipio</div>
                					<div class="col-3">Administrar</div>
        						</div>
								<div id ="showLista" class="col-12"></div>
							</div>	
						</div>
						
						<div class="col-5">
							<div id ="titleTransLista" class="col-12">
								Unidades 
								<input type="button" id ="buttonTransUNuevo" value="Nueva" class="buttonTransNuevo">
							</div>
							<div class="littleHolder col-12">
								<div class="col-12 headerTableList">
									<div class="col-1">Id</div>
                					<div class="col-3">Marca</div>
                					<div class="col-3">Placas</div>
                					<div class="col-3">Tipo</div>
									<div class="col-1">Estatus</div>
        						</div>
								
								<div id ="showListaUn" class="col-12 unidadHolder"></div>
							</div>
						</div>
						
						<div class="col-5">
							<div id ="titleTransLista" class="col-12">
								Operadores 
								<input type="button" id ="buttonTransONuevo" value="Nuevo">
							</div>
							<div class="littleHolder col-12">
								<div class="col-12 headerTableList">
									<div class="col-1">Id</div>
                					<div class="col-4">Nombre</div>
                					<div class="col-3">Apellido</div>
                					<div class="col-4">Licencia</div>
        						</div>
								<div id ="showListaOp" class="col-12 operadorHolder"></div>

							</div>	
						</div>
						
						
						
						
					</div>
					
					
				</div>

				<!-- **** EMPRESA ****-->
				<div class="panel" id="menu3">
					<div class="rowcnt">
						<div class ="col-6">
							<div id="titleClienteLista" class = "col-12">
								Empresas
								<input type="submit" id ="buttonEmpresaNueva" value="Nueva" class="buttonEmpresaNueva">
							</div>
							<div class="fullPanel col-12">
								<div class="col-12 headerTableList">
									<div class="col-1">Id</div>
                					<div class="col-4">Razón social</div>
                					<div class="col-4">SEMARNAT</div>
                					<div class="col-2">Options</div>
        						</div>
								<div id ="showListaEmpresa" class="col-12"></div>
							</div>
						</div>
						<div class="col-1" style="height: 500px"></div>
						<div class ="col-5">
							<div id="titleClienteLista" class = "col-12">
								Detalle de la empresa: 
							</div>
							<div class="fullPanel col-12">
								<div id ="showListaEmpresaDetalle" class="col-12"></div>
							</div>
						</div>
					</div>
				</div>

				
				

			</section> 
		</section>
		<footer>
			<p>Design by STRDEV &copy</p>
		</footer>
		
		<!-- **** Modal windows **** -->
		<div class="modal" id="modal-addTrans">
			<h1>Nueva transportadora</h1>
				
			<input class="form1 col-19" type="text" id="razonSocial" placeholder="Empresa (Razon Social)">
				
			<fieldset class="rowcnt">
				<legend>Domicilio</legend>
				<input class="form1 col-10" type="text"id="calle" placeholder="Calle">
				<input class="form1 col-4" type="text" id="nExt" placeholder="N. Ext">
				<input class="form1 col-4" type="text" id="nInt" placeholder="N. Int"><br>
				<input class="form1 col-10" type="text" id="colonia" placeholder="Colonia">
				<input class="form1 col-7" type="text"  id="delMun" placeholder="Del/Mun">
				<input class="form1 col-7" type="text"  id="cp" placeholder="C.P.">
				<input class="form1 col-10" type="text"  id="estado" placeholder="Estado">
			</fieldset>
			
			<fieldset class="rowcnt">
				<legend>Contacto</legend>
				<input class="form1 col-10" type="text" id="email" placeholder="E-mail">
				<input class="form1 col-7" type="text" id="tel" placeholder="Tel">
			</fieldset>
			
			<fieldset class="rowcnt">
				<legend>Permisos</legend>
				<input  class="form1 col-10" type="text" id="sct" placeholder="Registro SCT">
				<input class="form1 col-7" type="text" id="semarnat" placeholder="SEMARNAT"><br>
			</fieldset>
			
			<div class="saveCloseBtn">
				<input class="form1" type="button" value="Guardar" id="btnSave">
				<input class="form1" type="button" value="Cerrar" id="btnClose">
			</div>
		</div>
		
	</body>
	
</html>

