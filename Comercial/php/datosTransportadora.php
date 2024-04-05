<?php
    require("../../php/dbcon.php");

    $transportadora = $_POST['transportadora'];
    if($transportadora != -1){
        $sql = "SELECT * FROM Transportadora WHERE IdTransportadora = {$transportadora}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
    
        echo '<div id="semarnat" class="col2-5" style="font-size:11px"><b>SEMARNAT:</b> '.$row['AutorizacionSemarnat'].'</div>';
        echo '<div id="sct" class="col2-5" style="font-size:11px"><b>SCT</b>: '.$row['RegSCT'].'</div>';
        echo '<div id="domicilio" class="col2-14" style="font-size:11px"><b>Dirección:</b> '.$row['Calle'].' N. '.$row['NumExt'].
                ', Col. '.$row['Colonia'];
        echo ', '.$row['DelMun'].' '.$row['Estado'].
            ', C.P. '.$row['CP'].'</div>';
    
    }
    
    sqlsrv_close($conn);
?>