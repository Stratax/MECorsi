<?php
    require ("../../php/dbcon.php");

    
    $razonSocial = $_POST['razonSocial'];
    $rfc = $_POST['rfc'];
    $nra = $_POST['nra'];
    $calle = $_POST['calle'];
    $nExt = $_POST['nExt'];
    $colonia = $_POST['colonia'];
    $delMun = $_POST['delMun'];
    $cp = $_POST['cp'];
    $estado = $_POST['estado'];
    $calleF = $_POST['calleF'];
    $nExtF = $_POST['nExtF'];
    $coloniaF = $_POST['coloniaF'];
    $delMunF = $_POST['delMunF'];
    $cpF = $_POST['cpF'];
    $estadoF = $_POST['estadoF'];
    $contacto = $_POST['contacto'];  
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];  
    $email = $_POST['email'];
    $fecha = date("Y-m-d");
    
       
    $sql ="INSERT INTO Cliente (RazonSocial, RFC, Calle, Numero, Colonia, DelMun, Estado, CP, CalleFiscal, NumeroFiscal, ColoniaFiscal, DelMunFiscal, EstadoFiscal, CPFiscal, NRA, Contacto, Tel1, Tel2, Email, FechaAlta) 
    VALUES ('{$razonSocial}','{$rfc}','{$calle}','{$nExt}','{$colonia}','{$delMun}','{$estado}','{$cp}','{$calleF}','{$nExtF}','{$coloniaF}','{$delMunF}','{$estadoF}','{$cpF}','{$nra}','{$contacto}','{$tel1}','{$tel2}','{$email}','{$fecha}')";
    
    $stmt = sqlsrv_query($conn,$sql);
    if( $stmt === false) {
      die( print_r( sqlsrv_errors(), true) );
    }
    $row = sqlsrv_fetch_array($stmt);
    sqlsrv_close($conn);
?>