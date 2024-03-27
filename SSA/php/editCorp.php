<?php
    require("../../php/dbcon.php");

    $idEmpresa = $_POST['idEmpresa'];
    $razonSocial = $_POST['razonSocial'];
    $semarnat = $_POST['semarnat'];
    $calle = $_POST['calle'];
    $nExt = $_POST['nExt'];
    $nInt = $_POST['nInt'];
    $colonia = $_POST['colonia'];
    $delMun = $_POST['delMun'];
    $estado = $_POST['estado'];
    $cp = $_POST['cp'];
    $email = $_POST['email'];
    $tel1 = $_POST['tel1'];
    $responsable = $_POST['responsable'];
    $capacidad = $_POST['capacidad'];

    $sql = "UPDATE Empresa SET 
    RazonSocial =  '{$razonSocial}',
    Semarnat =  '{$semarnat}',
    Calle =  '{$calle}',
    NumeroExt = '{$nExt}', 
    NumeroInt = '{$nInt}', 
    Colonia =  '{$colonia}',
    DelMun =  '{$delMun}',
    Estado =  '{$estado}',
    CP =  '{$cp}',
    Email =  '{$email}',
    Telefono = '{$tel1}', 
    Responsable =  '{$responsable}',
    CapacidadAlmacen = {$capacidad} WHERE IdEmpresa = {$idEmpresa}";
    
    $stmt = sqlsrv_query($conn,$sql);
    if($stmt === false){
        die(print_r(sqlsrv_errors(),true));
    }
	sqlsrv_close($conn);
?>