<?php
    require("../../php/dbcon.php");

    $transportadora = $_POST['transportadora'];
    if($transportadora != -1){
        $sql = "SELECT * FROM Transportadora WHERE IdTransportadora = {$transportadora}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
    
        echo '<div id="semarnat" class="col-6 datos">SEMARNAT: '.$row['AutorizacionSemarnat'].'</div>';
        echo '<div id="sct" class="col-12 datos">SCT: '.$row['RegSCT'].'</div>';
        echo '<div id="domicilio" class="col-20 datos">Dirección: '.$row['Calle'].' N. '.$row['NumExt'].
                ', Col. '.$row['Colonia'];
        echo ', '.$row['DelMun'].' '.$row['Estado'].
            ', C.P. '.$row['CP'].'</div>';
    
    }
    
    sqlsrv_close($conn);
?>