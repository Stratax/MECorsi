<?php
    require("../../php/dbcon.php");

    $transSel = $_POST['transSel'];
    $marca = $_POST['marca'];
    $placas = $_POST['placas'];
    $tipo = $_POST['tipo'];
    $sct = $_POST['sct'];
    $semarnat = $_POST['semarnat'];
    $vigSemarnat = $_POST['vigSemarnat'];
    $noPoliza = $_POST['noPoliza'];
    $vigPoliza = $_POST['vigPoliza'];
    $manejoEspecial = $_POST['manejoEspecial'];
    if($_POST['estado']){
        $estado = "Activo";
    }else{
        $estado = "Inactivo";
    }
    $fechaAlta = date("Y-m-d");
    
    $sql ="INSERT INTO Unidad (IdTransportadora, Marca, Placas, Tipo, RegSct, AutorizacionSemarnat, VigenciaSemarnat,NoPoliza,VigenciaPoliza,ManejoEspecial,Estatus,FechaAlta) VALUES (
         '{$transSel}',
         '{$marca}',
         '{$placas}',
         '{$tipo}',
         '{$sct}',
         '{$semarnat}',
         '{$vigSemarnat}',
         '{$noPoliza}',
         '{$vigPoliza}',
         '{$manejoEspecial}',
         '{$estado}',
         '{$fechaAlta}'
     )";
     $stmt = sqlsrv_query($conn,$sql);
     $row = sqlsrv_fetch_array($stmt);

    
    sqlsrv_close($conn);
?>
