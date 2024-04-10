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
					<li id="m_InMan">Manifiesto de Entrada</li>
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
                					<div class="col2-4">Razón social</div>
                					<div class="col2-2">RFC</div>
                					<div class="col2-2">NRA</div>
									<div class="col2-5">Domicilio</div>
                					<div class="col2-3">Contacto</div>
                					<div class="col2-2">Tel</div>
                					<div class="col2-4">Email</div>
        						</div>
								<div id ="showLista" class="col-12">

								</div>
							</div>
						</div>
					</div>
				</div>

<!--**********************************************************-->
<!-------      **** Manifiesto Entrada ****             -------->
<!--**********************************************************-->
				<div class="panel" id="menu3">
					<div class="rowcnt">
						<div class="col-12">
							<div class = "titlePanel col-12">
								Manifiesto de Entrada 
								<input type="submit" id ="btnAddIncomeManifest" value="Nueva" class="buttonManifiestoNuevo">
							</div>

							<div class="fullHolder col-12"  style="overflow-y:auto">
								<div class="rowcnt headerTableList">
									<div class="col2-2">Manifiesto</div>
                					<div class="col2-5">Cliente</div>
                					<div class="col2-5">Transportista</div>
                					<div class="col2-5">Destino</div>
									<div class="col2-2">Solicitud</div>
									<div class="col2-3">Estatus</div>
									<div class="col2-2">Docs</div>
        						</div>
								<div id ="showService" class="col-12" ></div>
							</div>
						</div>
					</div>	
				</div>
			</section> 
		</section>

		<footer>
			<p>Design by STRDEV &copy</p>
		</footer>



<!--**********************************************************-->
<!-------           **** Modal Windows ****             -------->
<!--**********************************************************-->
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

		<div class = "modalPanel" id = editClient>
			<div class = "modalInnerPanel" id = "formEditClient">
				
				<h1>Cliente <p id = "idClientLbl"></p> </h1>
				<fieldset class="rowcnt">
					<legend>Cliente</legend>
					<input class="formEditClient" type="text" id="razonSocialE" placeholder="Razon Social">
					<input class="formEditClient" type="text" id="rfcE" placeholder="R.F.C.">
					<input class="formEditClient" type="text" id="nraE" placeholder="NRA">
					
				</fieldset>	
				<fieldset class="rowcnt">
					<legend>Domicilio</legend>
					<input class="formEditClient" type="text"id="calleE" placeholder="Calle">
					<input class="formEditClient" type="text" id="nExtE" placeholder="Número">
					<input class="formEditClient" type="text" id="coloniaE" placeholder="Colonia">
					<input class="formEditClient" type="text"  id="delMunE" placeholder="Del/Mun">
					<input class="formEditClient" type="text"  id="cpE" placeholder="C.P.">
					<input class="formEditClient" type="text"  id="estadoE" placeholder="Estado">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Domicilio Fiscal</legend>
					<input class="formEditClient" type="text"id="calleFE" placeholder="Calle">
					<input class="formEditClient" type="text" id="nExtFE" placeholder="Número">
					<input class="formEditClient" type="text" id="coloniaFE" placeholder="Colonia">
					<input class="formEditClient" type="text"  id="delMunFE" placeholder="Del/Mun">
					<input class="formEditClient" type="text"  id="cpFE" placeholder="C.P.">
					<input class="formEditClient" type="text"  id="estadoFE" placeholder="Estado">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="formEditClient" type="text" id="contactoE" placeholder="Responsable">
					<input class="formEditClient" type="text" id="tel1E" placeholder="Tel 1">
					<input class="formEditClient" type="text" id="tel2E" placeholder="Tel 2">
					<input class="formEditClient" type="text" id="emailE" placeholder="E-mail">
				</fieldset>
				
				<div class="saveCloseBtnContainer">
					<input class="btnGreen" type="button" value="Guardar" id="btnSaveEditClient">
					<input class="btnYellow" type="button" value="Eliminar" id="btnDeleteEditClient">
					<input class="btnRed" type="button" value="Cerrar" id="btnCloseEditClient">
				</div>
			</div>
		</div>

		<div class = "modalPanel" id = addIncomeManifest>
			<div class = "modalInnerPanel" id = "formAddIncomeManifest">
				
				<div class = "consecutivoOS col-6">
					Manifiestos de Entrada: 
					<div id="idManifest" style = "color:red"></div>
				</div>
				<div class = "askDate col-6">
					Fecha de Solicitud<br> <input id = 'dateInMan' type= "date">
				</div>
				
				<fieldset class="rowcnt">
					<legend>Generador</legend>
					<div class = "col2-8 gatherDate">
						Recolección: <input id = 'dateInManGather' type="date">
					</div>
					<select id="clientInMan">
						<option value="-1" selected>Cliente</option>
						<?php
							require("../php/dbcon.php");
							$sql = "SELECT IdCliente, RazonSocial FROM Cliente";
							$stmt = sqlsrv_query($conn,$sql);
							while($row = sqlsrv_fetch_array($stmt)){
								$idCliente = $row['IdCliente'];
								$razonSocial = $row['RazonSocial'];
								echo '<option value="'.$idCliente.'">'.$razonSocial.'</option>';
							}
							sqlsrv_close($conn);
						?>
					</select>
					<div id="datosCliente" class="col2-24">_<br>_</div>					
				</fieldset>	
				<fieldset class="rowcnt">
					<legend>Transportista</legend>
						<select id="transportInMan">
							<option value = "-1" selected>Transportadora</option>
					
								<?php
									require("../php/dbcon.php");
									$sql = "SELECT IdTransportadora, RazonSocial FROM Transportadora";
									$stmt = sqlsrv_query($conn,$sql);
									
									while($row = sqlsrv_fetch_array($stmt)){
										$idTransportadora = $row['IdTransportadora'];
										$razonSocial = $row['RazonSocial'];
										echo '<option value="'.$idTransportadora.'">'.$razonSocial.'</option>';
									}
									sqlsrv_close($conn);
								?>
						</select>

					<select id="operatorMan">
						<option value="-1">Operador</option>
					</select>

					<select id="unitMan1">
						<option value="-1">Unidad 1</option>
					</select>
					<select id="unitMan2">
						<option value="-1">Unidad 2</option>
					</select>
					<div id="datosTransportadora" class="rowcnt">_<br>_</div>

				</fieldset>
				<fieldset class="rowcnt">
					<legend>Destino</legend>
					<div class = "col2-8 gatherDate">
						Recepción: <input id = 'dateInManDestiny' type="date">
					</div>
					<select id="destinyMan">
						<option value = "-1" sele1cted>Destino</option>
						<?php
							require("../php/dbcon.php");
							$sql = "SELECT IdEmpresa, RazonSocial FROM Empresa";
							$stmt = sqlsrv_query($conn,$sql);
							while($row = sqlsrv_fetch_array($stmt)){
								$idEmpresa = $row['IdEmpresa'];
								$razonSocial = $row['RazonSocial'];
								echo '<option value="'.$idEmpresa.'">'.$razonSocial.'</option>';
							}
							sqlsrv_close($conn);
						?>
					</select>
					<div id="datosDestino" class="rowcnt">_<br>_</div>
				</fieldset>
				<div class="saveCloseBtnContainer">
					<input class="btnGreen" type="button" value="Guardar" id="btnSaveAddMan">
					<input class="btnRed" type="button" value="Cerrar" id="btnCloseAddMan">
				</div>
		</div>
				
	
		
	</body>
	
</html>

