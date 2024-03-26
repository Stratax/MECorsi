<?php
    require("../../php/dbcon.php");

    $transportadora = $_POST['Transportadora'];
    $Operator = $_POST['Operator'];
   
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
    
    
    
    

    sqlsrv_close($conn);
?>