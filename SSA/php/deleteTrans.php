<?php
    include("../../php/dbcon.php");

    $sql = "DELETE FROM Transportadora WHERE idTransportadora = {$_POST['idTrans']}";
    $stmt = sqlsrv_query($conn,$sql);
    $sql = "DELETE FROM Unidad WHERE idTransportadora = {$_POST['idTrans']}";
    $stmt = sqlsrv_query($conn,$sql);
    $sql = "DELETE FROM Operador WHERE idTransportadora = {$_POST['idTrans']}";
    $stmt = sqlsrv_query($conn,$sql);
    
    sqlsrv_close($conn);
?>