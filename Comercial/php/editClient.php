<?php
    require("../../php/dbcon.php");

    $Cliente = $_POST['Cliente'];
    $razonSocial = $_POST['razonSocial'];
    $rfc = $_POST['rfc'];
    $calle = $_POST['calle'];
    $nExt = $_POST['nExt'];
    $colonia = $_POST['colonia'];
    $delMun = $_POST['delMun'];
    $estado = $_POST['estado'];
    $cp = $_POST['cp'];
    $calleF = $_POST['calleF'];
    $nExtF = $_POST['nExtF'];
    $coloniaF = $_POST['coloniaF'];
    $delMunF = $_POST['delMunF'];
    $estadoF = $_POST['estadoF'];
    $cpF = $_POST['cpF'];
    $nra = $_POST['nra'];
    $contacto = $_POST['contacto'];  
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];  
    $email = $_POST['email'];
    
    $sql ="UPDATE Cliente  SET
    RazonSocial = '{$razonSocial}',
	RFC = '{$rfc}',
	Calle = '{$calle}',
	Numero = '{$nExt}',
	Colonia = '{$colonia}',
	DelMun = '{$delMun}',
	Estado = '{$estado}',
	CP = '{$cp}',
	CalleFiscal = '{$calleF}',
	NumeroFiscal = '{$nExtF}',
	ColoniaFiscal = '{$coloniaF}',
	DelMunFiscal = '{$delMunF}',
	EstadoFiscal = '{$estadoF}',
	CPFiscal = '{$cpF}',
	NRA = '{$nra}',
	Contacto = '{$contacto}',
	Tel1 = '{$tel1}',
	Tel2 = '{$tel2}',
	Email = '{$email}' WHERE IdCliente = {$Cliente}";
	
    
    $stmt = sqlsrv_query($conn,$sql);
    if( $stmt === false) {
      die( print_r( sqlsrv_errors(), true) );
    }
    
    sqlsrv_close($conn);
?>