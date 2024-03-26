<?php

    require ("../../php/dbcon.php");

    $idTrans = $_POST['idTrans'];
    $razonSocial = $_POST['razonSocial'];
    $calle = $_POST['calle'];
    $nExt = $_POST['nExt'];
    $nInt = $_POST['nInt'];
    $colonia = $_POST['colonia'];
    $delMun = $_POST['delMun'];
    $cp = $_POST['cp'];
    $estado = $_POST['estado'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $sct = $_POST['sct'];
    $semarnat = $_POST['semarnat'];

    $sql = "UPDATE Transportadora SET
    RazonSocial = '{$razonSocial}',
	Calle = '{$calle}' ,
	NumExt = '{$nExt}',
	NumInt = '{$nInt}' ,
	Colonia = '{$colonia}',
	DelMun = '{$delMun}',
	Estado = '{$estado}',
	CP = '{$cp}',
	Email = '{$email}',
	Telefono = '{$tel}',
	RegSCT = '{$sct}',
	AutorizacionSemarnat = '{$semarnat}' WHERE idTransportadora = {$idTrans} ";

    $stmt = sqlsrv_query($conn , $sql);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
   }
    
    sqlsrv_close($conn);

     

?>