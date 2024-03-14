<?php
    
    require("../../php/dbcon.php");

    $razonSocial=$_POST['razonSocial'];
    $semarnat=$_POST['semarnat'];
    $capacidad=floatval($_POST['capacidad']);
    $calle=$_POST['calle'];
    $nExt=$_POST['nExt'];
    $nInt=$_POST['nInt'];
    $colonia=$_POST['colonia'];
    $delMun=$_POST['delMun'];
    $cp=$_POST['cp'];
    $estado=$_POST['estado'];
    $responsable=$_POST['responsable'];
    $tel1=$_POST['tel1'];
    $email=$_POST['email'];
    $fechaAlta = Date("Y-m-d");

    $sql ="INSERT INTO Empresa (RazonSocial, Semarnat, Calle, NumeroExt, NumeroInt, Colonia, DelMun, Estado, CP, Email, Telefono, Responsable, FechaAlta, CapacidadAlmacen)
        VALUES ('{$razonSocial}','{$semarnat}','{$calle}','{$nExt}','{$nInt}','{$colonia}','{$delMun}','{$estado}','{$cp}','{$email}','{$tel1}','{$responsable}','{$fechaAlta}','{$capacidad}')";
    $stmt = sqlsrv_query($conn,$sql);
    $row = sqlsrv_fetch_array($stmt);
    sqlsrv_close($conn);
?>