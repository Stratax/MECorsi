<?php
    require("../../php/dbcon.php");

    $transportadora = $_POST['Transportadora'];
    $Operator = $_POST['Operator'];
   
    
    if($Operator == -1){
        $sql ="SELECT IdOperador, Nombre, ApellidoP, NoLicencia FROM  Operador WHERE IdTransportadora = {$transportadora}";
        $stmt = sqlsrv_query($conn,$sql);
    
        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div onclick="editOperator('.$row['IdOperador'].','.$transportadora.')" class="rowcnt" style="font-size:12px;border-bottom: 1px solid black">
                    <div class="col-1">'.$row['IdOperador'].'</div>
                    <div class="col-4">'.$row['Nombre'].'</div>
                    <div class="col-3">'.$row['ApellidoP'].'</div>
                    <div class="col-4">'.$row['NoLicencia'].'</div>
                    </div>';
        }
    }else{
        $sql ="SELECT * FROM  Operador WHERE IdOperador = {$Operator}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
        
        $operatorObj = new stdClass();
        $operatorObj -> IdTransportadora = $row['IdTransportadora'];
        $operatorObj -> Nombre = $row['Nombre'];
        $operatorObj -> ApellidoP = $row['ApellidoP'];
        $operatorObj -> ApellidoM = $row['ApellidoM'];
        $operatorObj -> Telefono1 = $row['Telefono1'];
        $operatorObj -> Telefono2 = $row['Telefono2'];
        $operatorObj -> NoLicencia = $row['NoLicencia'];
        $operatorObj -> VigenciaLicencia = $row['VigenciaLicencia'];
        
        echo json_encode($operatorObj);
    }
    
       

    sqlsrv_close($conn);
?>