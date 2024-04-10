<?php
    require("../../php/dbcon.php");
    $sql ="SELECT Valor FROM Consecutivo WHERE Tabla ='OrdenServicio'";
    $stmt = sqlsrv_query($conn,$sql);
    $row = sqlsrv_fetch_array($stmt);
    $consecutivo = $row['Valor'] + 1;
    $sql2 = "UPDATE Consecutivo SET Valor = {$consecutivo} WHERE Tabla = 'OrdenServicio'";
    $stmt = sqlsrv_query($conn,$sql2);
    echo 'OS'. str_pad($consecutivo,4,'0',STR_PAD_LEFT).'/'.Date('y');
    sqlsrv_close($conn);
?>