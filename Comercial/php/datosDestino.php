<?php
    require("../../php/dbcon.php");

    $destino = $_POST['destino'];
    if($destino != -1){
        $sql = "SELECT * FROM Empresa WHERE IdEmpresa = {$destino}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
    
        echo '<div id="rfc" class="col2-8" style=" font-size:11px"><b>SEMARNAT:</b> '.$row['Semarnat'].'</div>';
        echo '<div id="domicilio" class="col2-14" style="font-size:11px"><b>Dirección:</b> '.$row['Calle'].' N. '.$row['NumeroExt'].
                ', Col. '.$row['Colonia'];
        echo ', '.$row['DelMun'].' '.$row['Estado'].
            ', C.P. '.$row['CP'].'</div>';
    
    }
    
    sqlsrv_close($conn);
?>