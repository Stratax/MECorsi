<?php
    require("../../php/dbcon.php");
    
   

        $sql ="SELECT Valor FROM Consecutivo WHERE Tabla ='OrdenServicio'";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
        
        $consecutivo = $row['Valor'] + 1;
        $idOS = 'OS'. str_pad($consecutivo,4,'0',STR_PAD_LEFT).'/'.Date('y');
        
        $sql = "UPDATE Consecutivo SET Valor = {$consecutivo} WHERE Tabla = 'OrdenServicio'";
        $stmt = sqlsrv_query($conn,$sql);
        $sql = "INSERT INTO OrdenServicio (IdOrdenServicio) VALUES ('{$idOS}')";
        $stmt = sqlsrv_query($conn,$sql);
        
        

        echo $idOS;
   

    sqlsrv_close($conn);


    
?>