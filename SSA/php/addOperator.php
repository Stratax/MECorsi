<?php
    
    require("../../php/dbcon.php");

    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $noLicencia = $_POST['noLicencia'];
    $vigenciaLicencia = $_POST['vigenciaLicencia']; 
    $estatus = "Activo";
    $alta = date("Y-m-d");
    $transSel = $_POST['transSel'];

    $sql ="INSERT INTO Operador (Nombre, ApellidoP, ApellidoM, Telefono1, Telefono2, NoLicencia,VigenciaLicencia,Estatus, Alta, idTransportadora) 
    VALUES ('{$nombre}','{$apellidoP}','{$apellidoM}','{$tel1}','{$tel2}','{$noLicencia}','{$vigenciaLicencia}','{$estatus}','{$alta}','{$transSel}')";
    $stmt = sqlsrv_query($conn,$sql);
    $row = sqlsrv_fetch_array($stmt);
    sqlsrv_close($conn);
?>