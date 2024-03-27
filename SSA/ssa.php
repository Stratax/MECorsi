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
		<link rel="stylesheet" href="Style/styleSSA.css" />
		
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
<!--**********************************************************-->
<!-------              **** INICIO ****         -------->
<!--**********************************************************-->
				<div class="panel" id="menu1">					
				</div>
<!--**********************************************************-->
<!-------              **** TRANSPORTADORA ****         -------->
<!--**********************************************************-->

				<div class="panel" id="menu2">
					<div class="rowcnt">
						<div class="col-6" style="margin-right:15px;">
							<div class="titlePanel col-12">
								Transportadoras 
								<input type="submit" id ="btnShowAddTrans" value="Nueva" class="buttonTransNuevo">
							</div>
							
							<div class="fullHolder col-12">
								<div class="rowcnt headerTableList">
									<div class="col-1">Id</div>
                					<div class="col-4">Razón social</div>
                					<div class="col-4">Delegación/Municipio</div>
                					<div class="col-3">Administrar</div>
        						</div>
								<div id ="showLista"></div>
							</div>	
						</div>
						
						<div class="col-5">
							<div class=" titlePanel col-12">
								Unidades 
								<input type="button" id ="btnShowAddUnit" value="Nueva" class="buttonTransNuevo">
							</div>
							<div class="halfHolder col-12">
								<div class="col-12 headerTableList">
									<div class="col-1">Id</div>
                					<div class="col-3">Marca</div>
                					<div class="col-3">Placas</div>
                					<div class="col-3">Tipo</div>
									<div class="col-1">Estatus</div>
        						</div>
								
								<div id ="showListaUn">

								</div>
							</div>
						</div>
						
						<div class="col-5">
							<div class="titlePanel col-12">
								Operadores 
								<input type="button" id ="btnShowAddOperator" value="Nuevo">
							</div>
							<div class="halfHolder col-12">
								<div class="col-12 headerTableList">
									<div class="col-1">Id</div>
                					<div class="col-4">Nombre</div>
                					<div class="col-3">Apellido</div>
                					<div class="col-4">Licencia</div>
        						</div>
								<div id ="showListaOp"></div>

							</div>	
						</div>
					</div>
				</div>

<!--**********************************************************-->
<!-------              **** EMPRESA ****         -------->
<!--**********************************************************-->

				<div class="panel" id="menu3">
					<div class="rowcnt">
						<div class ="col-6" style="margin-right:20px">
							<div class = "titlePanel col-12">
								Empresas
								<input type="submit" id ="btnShowAddCorp" value="Nueva" class="buttonEmpresaNueva">
							</div>
							
							<div class="fullHolder col-12">
								<div class="rowcnt headerTableList">
									<div class="col-1">Id</div>
                					<div class="col-4">Razón social</div>
                					<div class="col-4">SEMARNAT</div>
                					<div class="col-2">Options</div>
        						</div>
								<div id ="showListaEmpresa"></div>
							</div>
						</div>
						
						<div class ="col-5">
							<div class = "titlePanel col-12">
								<br>
								Detalle de la empresa: 
							</div>
							<div class="fullHolder col-12">
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
		<div class = "modalPanel" id = addTransport>
			<div class = "modalInnerPanel" id = "formAddTrans">
				
				<h1>Nueva Trasnportadora</h1>
				
				<input class="rowcnt formAddTrans" type="text" id="razonSocial" placeholder="Empresa (Razon Social)">
					
				<fieldset class="rowcnt">
					<legend>Domicilio</legend>
					<input class="formAddTrans" type="text"id="calle" placeholder="Calle">
					<input class="formAddTrans" type="text" id="nExt" placeholder="N. Ext">
					<input class="formAddTrans" type="text" id="nInt" placeholder="N. Int"><br>
					<input class="formAddTrans" type="text" id="colonia" placeholder="Colonia">
					<input class="formAddTrans" type="text"  id="delMun" placeholder="Del/Mun">
					<input class="formAddTrans" type="text"  id="cp" placeholder="C.P.">
					<input class="formAddTrans" type="text"  id="estado" placeholder="Estado">
				</fieldset>
				
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="formAddTrans" type="text" id="email" placeholder="E-mail">
					<input class="formAddTrans" type="text" id="tel" placeholder="Tel">
				</fieldset>
				
				<fieldset class="rowcnt">
					<legend>Permisos</legend>
					<input  class="formAddTrans" type="text" id="sct" placeholder="Registro SCT">
					<input class="formAddTrans" type="text" id="semarnat" placeholder="SEMARNAT"><br>
				</fieldset>
				
				<div class="saveCloseBtnContainer">
					<input class="btnGreen" type="button" value="Guardar" id="btnSaveAddTrans">
					<input class="btnRed" type="button" value="Cerrar" id="btnCloseAddTrans">
				</div>
			</div>
		</div>

		<div class = "modalPanel" id = "editTransport">
			<div class = "modalInnerPanel" id = "formEditTrans">
				
				<h1>Transportadora: <p id = "idTransLbl"></p></h1>
				<input class="rowcnt formEditTrans" type="text" id="razonSocialE" placeholder="Empresa (Razon Social)">
					
				<fieldset class="rowcnt">
					<legend>Domicilio</legend>
					<input class="formEditTrans" type="text"id="calleE" placeholder="Calle">
					<input class="formEditTrans" type="text" id="nExtE" placeholder="N. Ext">
					<input class="formEditTrans" type="text" id="nIntE" placeholder="N. Int"><br>
					<input class="formEditTrans" type="text" id="coloniaE" placeholder="Colonia">
					<input class="formEditTrans" type="text"  id="delMunE" placeholder="Del/Mun">
					<input class="formEditTrans" type="text"  id="cpE" placeholder="C.P.">
					<input class="formEditTrans" type="text"  id="estadoE" placeholder="Estado">
				</fieldset>
				
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="formEditTrans" type="text" id="emailE" placeholder="E-mail">
					<input class="formEditTrans" type="text" id="telE" placeholder="Tel">
				</fieldset>
				
				<fieldset class="rowcnt">
					<legend>Permisos</legend>
					<input  class="formEditTrans" type="text" id="sctE" placeholder="Registro SCT">
					<input class="formEditTrans" type="text" id="semarnatE" placeholder="SEMARNAT"><br>
				</fieldset>
				
				<div class="saveCloseBtnContainer">
					<input class="btnGreen" type="button" value="Guardar" id="btnEditTrans">
					<input class="btnYellow" type="button" value="Eliminar" id="btnDeleteEditTrans">
					<input class="btnRed" type="button" value="Cerrar" id="btnCloseEditTrans">
				</div>
			</div>
		</div>

		<div class = "modalPanel" id = "addUnit">
			<div class = "modalInnerPanel" id = "formAddUnit">
				
			<h1>Nueva Unidad</h1>
			<fieldset class="rowcnt">
				<legend>Datos de la unidad</legend>
				<input class="formAddUnit" type="text" id="marca" placeholder="Marca">
				<input class="formAddUnit" type="text"id="placas" placeholder="Placas">
				<select class="formAddUnit" id="tipo">
					<option value="No Definido" selected>Tipo de Unidad...</option>
					<option value="CAJA">CAJA</option>
					<option value="CAJA CERRADA">CAJA CERRADA</option>
					<option value="CAJA REFRIGERADA">CAJA REFRIGERADA</option>
					<option value="CAJA SECA">CAJA SECA</option>
					<option value="CAJA SECA/RABON">CAJA SECA/RABON</option>
					<option value="CAMION CAJA">CAMION CAJA</option>
					<option value="CAMIONETA REDILAS">CAMIONETA REDILLAS</option>
					<option value="CHASIS CONTENEDOR">CHASIS CONTENEDOR</option>
					<option value="EQUIPO ESPECIAL">EQUIPO ESPECIAL</option>
					<option value="PLATAFORMA">PLATAFORMA</option>
					<option value="RABON">RABON</option>
					<option value="REDILAS">REDILAS</option>
					<option value="REMOLQUE">REMOLQUE</option>
					<option value="ROLL OFF">ROLL OFF</option>
					<option value="T 3">T 3</option>
					<option value="TANQUE">TANQUE</option>
					<option value="TORTHON">TORTHON</option>
					<option value="TRACTO CAMIÓN">TRACTO CAMIÓN</option>
					<option value="TRACTOR">TRACTOR</option>
					<option value="VOLTEO">VOLTEO</option>
				</select>
				<input class="formAddUnit" type="text"  id="sctUnit" placeholder="Registro SCT">
				<select class = "formAddUnit" id="transSel">
					<option value="-1" selected>Transportadora...</option>
					<?php
						require("../php/dbcon.php");

						$sql ="SELECT IdTransportadora, RazonSocial FROM Transportadora";
						$stmt = sqlsrv_query($conn,$sql);
						while($row = sqlsrv_fetch_array($stmt)){
							$k = $row['IdTransportadora'];
							$q = $row['RazonSocial'];
							echo '<option value="'.$k.'">'.$q.'</option>';
					
						}
						sqlsrv_close($conn);
					?>
				</select>
				
			</fieldset>
			<fieldset class="rowcnt">
				<legend>Permisos y Vigencias</legend>
				<input class="formAddUnit" type="text"  id="semarnatUnit" placeholder="Semarnat">
				<input class="formAddUnit" type="date"   id="vigSemarnat">
				<input class="formAddUnit" type="text" id="noPoliza" placeholder="Poliza">
				<input class="formAddUnit" type="date" id="vigPoliza">
				<input class="formAddUnit" type="text" id="manejoEspecial" placeholder="Manejo Especial">
				
			</fieldset>
			<div class="saveCloseBtnContainer">
				<input class="btnGreen" type="button" value="Guardar" id="btnSaveAddUnit">
				<input class="btnRed" type="button" value="Cerrar" id="btnCloseAddUnit">
			</div>
				
			</div>
		</div>

		<div class = "modalPanel" id = "editUnit">
			<div class = "modalInnerPanel" id = "formEditUnit">
				
			<h1>Unidad: <p id = "idUnitLbl"></p></h1>
			<fieldset class="rowcnt">
				<legend>Datos de la unidad</legend>
				<input class="formEditUnit" type="text" id="marcaE" placeholder="Marca">
				<input class="formEditUnit" type="text"id="placasE" placeholder="Placas">
				<select class="formEditUnit" id="tipoE">
					<option value="CAJA">CAJA</option>
					<option value="CAJA CERRADA">CAJA CERRADA</option>
					<option value="CAJA REFRIGERADA">CAJA REFRIGERADA</option>
					<option value="CAJA SECA">CAJA SECA</option>
					<option value="CAJA SECA/RABON">CAJA SECA/RABON</option>
					<option value="CAMION CAJA">CAMION CAJA</option>
					<option value="CAMIONETA REDILAS">CAMIONETA REDILLAS</option>
					<option value="CHASIS CONTENEDOR">CHASIS CONTENEDOR</option>
					<option value="EQUIPO ESPECIAL">EQUIPO ESPECIAL</option>
					<option value="PLATAFORMA">PLATAFORMA</option>
					<option value="RABON">RABON</option>
					<option value="REDILAS">REDILAS</option>
					<option value="REMOLQUE">REMOLQUE</option>
					<option value="ROLL OFF">ROLL OFF</option>
					<option value="T 3">T 3</option>
					<option value="TANQUE">TANQUE</option>
					<option value="TORTHON">TORTHON</option>
					<option value="TRACTO CAMIÓN">TRACTO CAMIÓN</option>
					<option value="TRACTOR">TRACTOR</option>
					<option value="VOLTEO">VOLTEO</option>
				</select>
				<input class="formEditUnit" type="text"  id="sctUnitE" placeholder="Registro SCT">
				<select class = "formEditUnit" id="transSelE">
					<?php
						require("../php/dbcon.php");

						$sql ="SELECT IdTransportadora, RazonSocial FROM Transportadora";
						$stmt = sqlsrv_query($conn,$sql);
						while($row = sqlsrv_fetch_array($stmt)){
							$k = $row['IdTransportadora'];
							$q = $row['RazonSocial'];
							echo '<option value="'.$k.'">'.$q.'</option>';
					
						}
						sqlsrv_close($conn);
					?>
				</select>
				
			</fieldset>
			<fieldset class="rowcnt">
				<legend>Permisos y Vigencias</legend>
				<input class="formEditUnit" type="text"  id="semarnatUnitE" placeholder="Semarnat">
				<input class="formEditUnit" type="date"   id="vigSemarnatE">
				<input class="formEditUnit" type="text" id="noPolizaE" placeholder="Poliza">
				<input class="formEditUnit" type="date" id="vigPolizaE">
				<input class="formEditUnit" type="text" id="manejoEspecialE" placeholder="Manejo Especial">
				
			</fieldset>
			<div class="saveCloseBtnContainer">
				<input class="btnGreen" type="button" value="Guardar" id="btnEditUnit">
				<input class="btnYellow" type="button" value="Eliminar" id="btnDeleteEditUnit">
				<input class="btnRed" type="button" value="Cerrar" id="btnCloseEditUnit">
			</div>
				
			</div>
		</div>
		
		<div class = "modalPanel" id = "addOperator">
			<div class = "modalInnerPanel" id = "formAddOperator">
				
			<h1> Nuevo Operador</h1>
				<fieldset class="rowcnt">
					<legend>Información Personal</legend>
					<input class="formAddOperator" type="text" placeholder="Nombre(s) " id="nombre">
					<input class="formAddOperator" type="text"id="apellidoP" placeholder="Apellido Paterno">
					<input class="formAddOperator" type="text" id="apellidoM" placeholder="Apellido Materno">
					<select id="transSelOperator" class="formAddOperator">
						<option value="-1" selected>Transportadora...</option>
						<?php
							require("../php/dbcon.php");

							$sql ="SELECT IdTransportadora, RazonSocial FROM Transportadora";
							$stmt = sqlsrv_query($conn,$sql);
							while($row = sqlsrv_fetch_array($stmt)){
								$k = $row['IdTransportadora'];
								$q = $row['RazonSocial'];
								echo '<option value="'.$k.'">'.$q.'</option>';
						
							}
							sqlsrv_close($conn);
						?>
					</select>
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="formAddOperator" type="text" id="tel1" placeholder="Teléfono">
					<input class="formAddOperator" type="text" id="tel2" placeholder="Teléfono(2)">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Permiso y vigencia</legend>
					<input class="formAddOperator" type="text"  id="noLicencia" placeholder="No de licencia">
					<input class="formAddOperator" type="date"  id="vigenciaLicencia">
				</fieldset>
				
				<div class="saveCloseBtnContainer rowcnt">
					<input class="btnGreen" type="button" value="Guardar" id="btnSaveAddOperator">
					<input class="btnRed" type="button" value="Cerrar" id="btnCloseAddOperator"></div>
				</div>
        	
		</div>

		<div class = "modalPanel" id = "editOperator">
			<div class = "modalInnerPanel" id = "formEditOperator">
				
			<h1> Operador: <p id = "idOperatorLbl"></p></h1>
				<fieldset class="rowcnt">
					<legend>Información Personal</legend>
					<input class="formAddOperator" type="text" placeholder="Nombre(s) " id="nombreE">
					<input class="formAddOperator" type="text"id="apellidoPE" placeholder="Apellido Paterno">
					<input class="formAddOperator" type="text" id="apellidoME" placeholder="Apellido Materno">
					<select id="transSelOperatorE" class="formAddOperator">
						<option value="-1" selected>Transportadora...</option>
						<?php
							require("../php/dbcon.php");

							$sql ="SELECT IdTransportadora, RazonSocial FROM Transportadora";
							$stmt = sqlsrv_query($conn,$sql);
							while($row = sqlsrv_fetch_array($stmt)){
								$k = $row['IdTransportadora'];
								$q = $row['RazonSocial'];
								echo '<option value="'.$k.'">'.$q.'</option>';
						
							}
							sqlsrv_close($conn);
						?>
					</select>
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="formAddOperator" type="text" id="tel1E" placeholder="Teléfono">
					<input class="formAddOperator" type="text" id="tel2E" placeholder="Teléfono(2)">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Permiso y vigencia</legend>
					<input class="formAddOperator" type="text"  id="noLicenciaE" placeholder="No de licencia">
					<input class="formAddOperator" type="date"  id="vigenciaLicenciaE">
				</fieldset>
				
				<div class="saveCloseBtnContainer rowcnt">
					<input class="btnGreen" type="button" value="Guardar" id="btnEditOperator">
					<input class="btnYellow" type="button" value="Eliminar" id="btnDeleteEditOperator">
					<input class="btnRed" type="button" value="Cerrar" id="btnCloseEditOperator"></div>
				</div>
        	
		</div>

		<div class = "modalPanel" id = "addCorp">
			<div class = "modalInnerPanel" id = "formAddCorp">
				<h1>Nueva Empresa</h1>
				<fieldset class="rowcnt">
					<legend>Empresa</legend>
					<input class="formAddCorp" type="text" id="razonSocialCorp" placeholder="Razon Social">
					<input class="formAddCorp" type="text" id="semarnatCorp" placeholder="SEMARNAT">
                    <input class="formAddCorp" type="text" pattern="[0-9]*[.,]?[0-9]*" id="capacidadCorp" placeholder="Cap. de Almacen KG.">
					
					
				</fieldset>	
				<fieldset class="rowcnt">
					<legend>Domicilio</legend>
					<input class="formAddCorp" type="text"id="calleCorp" placeholder="Calle">
					<input class="formAddCorp" type="text" id="nExtCorp" placeholder="N. Ext">
					<input class="formAddCorp" type="text" id="nIntCorp" placeholder="N. Int">
                    <input class="formAddCorp" type="text" id="coloniaCorp" placeholder="Colonia">
					<input class="formAddCorp" type="text"  id="delMunCorp" placeholder="Del/Mun">
					<input class="formAddCorp" type="text"  id="cpCorp" placeholder="C.P.">
					<input class="formAddCorp" type="text"  id="estadoCorp" placeholder="Estado">
				</fieldset>
				<fieldset class="rowcnt">
					<legend>Contacto</legend>
					<input class="formAddCorp" type="text" id="responsableCorp" placeholder="Responsable">
					<input class="formAddCorp" type="text" id="tel1Corp" placeholder="Teléfono">
					<input class="formAddCorp" type="text" id="emailCorp" placeholder="E-mail">
				</fieldset>
				<div class="saveCloseBtnContainer">
					<input class="btnGreen" type="button" value="Guardar" id="btnSaveCorp">
					<input class="btnRed" type="button" value="Cerrar" id="btnCloseAddCorp">
				</div>
			</div>
		</div>
	</body>
	
</html>

