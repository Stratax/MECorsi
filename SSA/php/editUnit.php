<?php

    include("../../php/dbcon.php");

    $idUnit = $_POST['idUnit'];
    $marca = $_POST['marca'];
    $placas = $_POST['placas'];
    $tipo = $_POST['tipo'];
    $sct = $_POST['sct'];
    $semarnat = $_POST['semarnat'];
    $vigSemarnat = $_POST['vigSemarnat'];
    $noPoliza = $_POST['noPoliza'];
    $vigPoliza = $_POST['vigPoliza'];
    $manejoEspecial = $_POST['manejoEspecial'];
    $transSel = $_POST['transSel'];

    $sql = "UPDATE Unidad SET
    IdTransportadora = '{$transSel}',
    Marca = '{$marca}',
    Placas = '{$placas}',
    Tipo = '{$tipo}',
    RegSCT = '{$sct}',
    AutorizacionSemarnat = '{$semarnat}',
    VigenciaSemarnat = '{$vigSemarnat}',
    NoPoliza = '{$noPoliza}',
    VigenciaPoliza = '{$vigPoliza}',
    ManejoEspecial = '{$manejoEspecial}'
    WHERE IdUnidad = {$idUnit}";

$stmt = sqlsrv_query($conn , $sql);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}

    sqlsrv_close($conn);
?>