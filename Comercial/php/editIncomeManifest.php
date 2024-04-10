<?php
    include("../../php/dbcon.php");

    $IdManifiesto = $_POST['IdManifiesto'];
    $IdCliente = $_POST['IdCliente'];
    $IdTransportadora = $_POST['IdTransportadora'];
    $IdOperador = $_POST['IdOperador'];
    $IdUnidad = $_POST['IdUnidad'];
    $IdUnidad2 = $_POST['IdUnidad2'];
    $IdEmpresa = $_POST['IdEmpresa'];
    $FechaSolicitud = $_POST['FechaSolicitud'];
    $FechaRecoleccion = $_POST['FechaRecoleccion'];
    $FechaRecepcion = $_POST['FechaRecepcion'];
    $Estatus = $_POST['Estatus'];

    
    $sql ="UPDATE ManifiestoEntrada SET
    IdCliente = {$IdCliente},
    IdTransportadora = {$IdTransportadora},
    IdOperador = {$IdOperador},
    IdUnidad = {$IdUnidad},
    IdUnidad2 = {$IdUnidad2},
    IdEmpresa = {$IdEmpresa},
    FechaSolicitud = '{$FechaSolicitud}',
    FechaRecoleccion = '{$FechaRecoleccion}',
    FechaRecepcion = '{$FechaRecepcion}',
    Estatus = '{$Estatus}' WHERE IdManifiesto = '$IdManifiesto'";
    
    $stmt = sqlsrv_query($conn, $sql);
    
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }

    sqlsrv_close($conn)


?>