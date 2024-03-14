<?php
    require("../../php/dbcon.php");

    $cliente = $_POST['cliente'];
    if($cliente != -1){
        $sql = "SELECT * FROM Cliente WHERE IdCliente = {$cliente}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
    
        echo '<div id="rfc" class="col-9 datos">RFC: '.$row['RFC'].'</div>';
        echo '<div id="rfc" class="col-9 datos">NRA: '.$row['NRA'].'</div>';
        echo '<div id="domicilio" class="col-20 datos">Dirección: '.$row['Calle'].' N. '.$row['Numero'].
                ', Col. '.$row['Colonia'];
        echo ', '.$row['DelMun'].' '.$row['Estado'].
            ', C.P. '.$row['CP'].'</div>';
    
    }
    
    sqlsrv_close($conn);
?>