<?php
    require("../../php/dbcon.php");

    $transportadora = $_POST['Transportadora'];
    $unit = $_POST['Unit'];

    if ($unit == -1){
        $sql ="SELECT * FROM Unidad WHERE IdTransportadora = {$transportadora}";
        $stmt = sqlsrv_query($conn,$sql);
        
        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div onclick="editUnit('.$row['IdUnidad'].','.$transportadora.')" class="rowcnt" style="font-size:12px;border-bottom: 1px solid black">
                    <div class="col-1">'.$row['IdUnidad'].'</div>
                    <div class="col-3">'.$row['Marca'].'</div>
                    <div class="col-3">'.$row['Placas'].'</div>
                    <div class="col-3">'.$row['Tipo'].'</div>
                    <div class="col-2">'.$row['Estatus'].'</div>
                </div>';
        }
    }else{
        $sql = "SELECT * FROM Unidad WHERE IdUnidad = {$unit}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);

        $unitObj = new stdClass();
        $unitObj -> IdTransportadora = $row['IdTransportadora'];
        $unitObj -> Marca = $row['Marca'];
        $unitObj -> Placas = $row['Placas'];
        $unitObj -> Tipo = $row['Tipo'];
        $unitObj -> RegSCT = $row['RegSCT'];
        $unitObj -> AutorizacionSemarnat = $row['AutorizacionSemarnat'];
        $unitObj -> VigenciaSemarnat = $row['VigenciaSemarnat'];
        $unitObj -> NoPoliza = $row['NoPoliza'];
        $unitObj -> VigenciaPoliza = $row['VigenciaPoliza'];
        $unitObj -> ManejoEspecial = $row['ManejoEspecial'];

        echo json_encode($unitObj);
    }
    sqlsrv_close($conn);
?>