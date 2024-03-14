<?php
    require("../../php/dbcon.php");

    $idTransportadora = $_POST['transportadora'];
    $nUnidad = $_POST['nUnidad'];

    $sql = "SELECT IdUnidad, Marca, Placas, Tipo FROM Unidad WHERE IdTransportadora={$idTransportadora}";
    $stmt = sqlsrv_query($conn,$sql);
    echo '<option value="-1">Unidad'.$nUnidad.'</option>';
    while($row = sqlsrv_fetch_array($stmt)){
        echo '<option value="'.$row['IdUnidad'].'">'.$row['Tipo'].' '.$row['Marca'].' - '.$row['Placas'].'</option>';
    }

?>