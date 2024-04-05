<?php
    require("../../php/dbcon.php");

    $cliente = $_POST['cliente'];
    if($cliente != -1){
        $sql = "SELECT * FROM Cliente WHERE IdCliente = {$cliente}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
    
        echo '<div id="rfc" class="col2-5" style="font-size:12px"><b>RFC:</b> '.$row['RFC'].'</div>';
        echo '<div id="nra" class="col2-5" style="font-size:12px"><b>NRA:</b> '.$row['NRA'].'</div>';
        echo '<div id="domicilio" class="col2-10" style="font-size:12px"><b>Dirección:</b> '.$row['Calle'].' N. '.$row['Numero'].
                ', Col. '.$row['Colonia'];
        echo ', '.$row['DelMun'].' '.$row['Estado'].
            ', C.P. '.$row['CP'].'</div>';
    
    }
    
    sqlsrv_close($conn);
?>