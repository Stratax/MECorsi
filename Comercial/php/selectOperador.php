<?php
    require("../../php/dbcon.php");

    $idTransportadora = $_POST['transportadora'];
    $sql = "SELECT IdOperador, Nombre, ApellidoP, NoLicencia FROM Operador WHERE IdTransportadora={$idTransportadora}";    
    $stmt = sqlsrv_query($conn,$sql);
    echo '<option value="-1">Operador</option>';
    while($row = sqlsrv_fetch_array($stmt)){
        echo '<option value="'.$row['IdOperador'].'">'.$row['Nombre'].' '.$row['ApellidoP'].' - '.$row['NoLicencia'].'</option>';
    }

?>