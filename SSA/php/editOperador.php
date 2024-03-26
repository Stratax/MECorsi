<?php 

    require("../../php/dbcon.php");

    $idOperador = $_POST['idOperador'];
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $noLicencia = $_POST['noLicencia'];
    $vigenciaLicencia = $_POST['vigenciaLicencia']; 
    $transSel = $_POST['transSel'];
    
    $sql ="UPDATE Operador SET
    Nombre = '{$nombre}',
    ApellidoP = '{$apellidoP}',
    ApellidoM = '{$apellidoM}',
    Telefono1 = '{$tel1}',
    Telefono2 = '{$tel2}',
    NoLicencia = '{$noLicencia}',
    VigenciaLicencia = '{$vigenciaLicencia}',
    idTransportadora = {$transSel} WHERE idOperador = {$idOperador}";
        
    $stmt = sqlsrv_query($conn,$sql);
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
   }
    
    sqlsrv_close($conn);
?>