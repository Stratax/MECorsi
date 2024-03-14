<?php
    require("../../php/dbcon.php");

    $transportadora = $_POST['Transportadora'];
   
    $sql ="SELECT * FROM Unidad WHERE IdTransportadora = {$transportadora}";
    $stmt = sqlsrv_query($conn,$sql);
        
    while($row = sqlsrv_fetch_array($stmt)){
        echo '<div class="rowcnt" style="padding: 4px 1px;border-bottom: 1px solid black">
            <div class="col-1">'.$row['IdUnidad'].'</div>
            <div class="col-3">'.$row['Marca'].'</div>
            <div class="col-3">'.$row['Placas'].'</div>
            <div class="col-3">'.$row['Tipo'].'</div>
            <div class="col-2">'.$row['Estatus'].'</div>
            </div>';
    
    }
    
    

    sqlsrv_close($conn);
?>