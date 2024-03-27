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
		<link rel="stylesheet" href="../Style/modal.css" />
		<link rel="stylesheet" href="../Style/forms.css" />
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

<!--**********************************************************-->
<!-------              **** INICIO ****         -------->
<!--**********************************************************-->			
				<div class="panel" id="menu1">
					Inicio
				</div>

<!--**********************************************************-->
<!-------                **** CLIENTES ****             -------->
<!--**********************************************************-->
				
				<div class="panel" id="menu2"> 
					<div class="rowcnt">
						<div class ="col-12" style="margin-right:15px;">
							<div class = "titlePanel col-12">
								Clientes 
								<input type="button" id ="btnAddClient" value="Nuevo" class="buttonClienteNuevo">
							</div>

							<div class="fullHolder col-12">
								<div class="rowcnt headerTableList">
									<div class="col2-1">Id</div>
                					<div class="col2-6">Razón social</div>
                					<div class="col2-3">NRA</div>
                					<div class="col2-2">Options</div>
        						</div>
								<div id ="showLista" class="col-12">

								</div>
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



		<!-- Modal Windows-->
		<div class = "modalPanel" id = addClient>
			<div class = "modalInnerPanel" id = "formAddClient">
				
				<h1>Nuevo Cliente</h1>
				<fieldset class="rowcnt">
					<legend>Cliente</legend>
					<input class="formAddClient" type="text" id="razonSocial" placeholder="Razon Social">
					<input class="formAddClient" type="text" id="rfc" placeholder="R.F.C.">
					<input class="formAddClient" type="text" id="nra" placeholder="NRA">
					
				</fieldset>	
				<fieldset class="rowcnt">
					<legend>Domicilio</legend>
					<input class="formAddClient" type="text"id="calle" placeholder="Calle">
					<input class="formAddClient" type="text" id="nExt" placeholder="Número">
					<input class="formAddClient" type="text" id="colonia" placeholder="Colonia">
					<input class="formAddClient" type="text"  id="delMun" placeholder="Del/Mun">
					<input class="formAddClient" type="text"  id="cp" placeholder="C.P.">
					<input class="formAddClient" type="text"  id="estado" placeholder="Estado">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Domicilio Fiscal</legend>
					<input class="formAddClient" type="text"id="calleF" placeholder="Calle">
					<input class="formAddClient" type="text" id="nExtF" placeholder="Número">
					<input class="formAddClient" type="text" id="coloniaF" placeholder="Colonia">
					<input class="formAddClient" type="text"  id="delMunF" placeholder="Del/Mun">
					<input class="formAddClient" type="text"  id="cpF" placeholder="C.P.">
					<input class="formAddClient" type="text"  id="estadoF" placeholder="Estado">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="formAddClient" type="text" id="contacto" placeholder="Responsable">
					<input class="formAddClient" type="text" id="tel1" placeholder="Tel 1">
					<input class="formAddClient" type="text" id="tel2" placeholder="Tel 2">
					<input class="formAddClient" type="text" id="email" placeholder="E-mail">
				</fieldset>
				
				<div class="saveCloseBtnContainer">
					<input class="btnGreen" type="button" value="Guardar" id="btnSaveAddClient">
					<input class="btnRed" type="button" value="Cerrar" id="btnCloseAddClient">
				</div>
			</div>
		</div>

		
		
	</body>
	
</html>

