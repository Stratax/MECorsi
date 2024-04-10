<?php
    require("../../php/dbcon.php");
    
   
        $date = date('Y-m-d');
        $sql ="SELECT Valor FROM Consecutivo WHERE Tabla ='ManifiestoEntrada'";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
        
        $consecutivo = $row['Valor'] + 1;
        $idME = 'ME'. str_pad($consecutivo,4,'0',STR_PAD_LEFT).'/'.Date('y');
        
        $sql = "UPDATE Consecutivo SET Valor = {$consecutivo} WHERE Tabla = 'ManifiestoEntrada'";
        $stmt = sqlsrv_query($conn,$sql);
        $sql = "INSERT INTO ManifiestoEntrada (IdManifiesto,FechaSolicitud,Estatus) VALUES ('{$idME}','{$date}','GENERADO')";
        $stmt = sqlsrv_query($conn,$sql);
        
        

        echo $idME;
   

    sqlsrv_close($conn);


    
?>