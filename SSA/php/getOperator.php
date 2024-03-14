<?php
    require("../../php/dbcon.php");

    $transportadora = $_POST['Transportadora'];
   
    if($transportadora!=0){
        $sql ="SELECT IdOperador, Nombre, ApellidoP, NoLicencia FROM  Operador WHERE IdTransportadora = {$transportadora}";
        $stmt = sqlsrv_query($conn,$sql);
        
        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div class="rowcnt" style="padding: 4px 1px;border-bottom: 1px solid black">
                    <div class="col-1">'.$row['IdOperador'].'</div>
                    <div class="col-4">'.$row['Nombre'].'</div>
                    <div class="col-3">'.$row['ApellidoP'].'</div>
                    <div class="col-4">'.$row['NoLicencia'].'</div>
                 </div>';
        }
        
    }else{
        $sql = "SELECT * FROM Operador WHERE Estatus = 'Inactivo'";
        $stmt = sqlsrv_query($conn,$sql);
        
        while($row = sqlsrv_fetch_array($stmt)){
             echo '<div class="rowcnt" style="padding: 4px 1px;border-bottom: 1px solid black">
                 <div class="col-1">'.$row['IdOperador'].'</div>
                 <div class="col-4">'.$row['Nombre'].'</div>
                 <div class="col-3">'.$row['ApellidoP'].'</div>
                 <div class="col-4">'.$row['Estatus'].'</div>
           
             </div>';
         }
    }
    

    sqlsrv_close($conn);
?>