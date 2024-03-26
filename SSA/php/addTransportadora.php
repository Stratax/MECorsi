<?php
    require ("../../php/dbcon.php");

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
    $fecha = '2023-12-12';//date("Y-m-d");
    
    $sql ="INSERT INTO Transportadora 
            (RazonSocial, Calle, NumExt, NumInt, 
            Colonia, DelMun, Estado, CP, Email, Telefono, 
            RegSCT, AutorizacionSemarnat, FechaAlta)
            VALUES ('{$razonSocial}','{$calle}','{$nExt}',
            '{$nInt}','{$colonia}','{$delMun}','{$estado}',
            '{$cp}','{$email}','{$tel}','{$sct}','{$semarnat}',
            '{$fecha}')";
            
    $stmt = sqlsrv_query($conn,$sql);
    $row = sqlsrv_fetch_array($stmt);
    
    sqlsrv_close($conn);
?>