<?php
  require ("../../php/dbcon.php");

  $idManifiesto = $_POST['idManifiesto'];
  $idCliente = $_POST['idCliente'];
  $IdTransportadora = $_POST['IdTransportadora'];
  $idUnidad = $_POST['idUnidad'];
  $idUnidad2 = $_POST['idUnidad2'];
  $idOperador = $_POST['idOperador'];
  $idEmpresa = $_POST['idEmpresa'];
  $fechaDestino = $_POST['fechaDestino'];
  $fechaManifiesto = Date("Y-m-d");
  echo "Id Manifiesto --> ".$idManifiesto;
  $sql ="INSERT INTO ManifiestoEntrada (IdManifiesto, IdCliente, IdTransportadora, IdUnidad, IdUnidad2, IdOperador, IdEmpresa, FechaDestino, FechaManifiesto)
          VALUES ('{$idManifiesto}',{$idCliente},{$IdTransportadora},{$idUnidad},{$idUnidad2},{$idOperador},{$idEmpresa},'{$fechaDestino}','{$fechaManifiesto}')";  
  $stmt = sqlsrv_query($conn,$sql);
    if( $stmt === false) {
      die( print_r( sqlsrv_errors(), true) );
      
    }
    $row = sqlsrv_fetch_array($stmt);
    sqlsrv_close($conn);
?>