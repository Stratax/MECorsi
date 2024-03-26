<?php
    require("../../php/dbcon.php");

    
    if($_POST['idTrans'] == -1){
        $sql = "SELECT * FROM Transportadora";
        $stmt = sqlsrv_query($conn,$sql);
    
        while($row = sqlsrv_fetch_array($stmt)){
            echo'<div class="rowcnt transRow" id="tra'.$row['IdTransportadora'].'" style="font-size:12px;border-bottom: 1px solid black">
                    <div onClick="showOpUnit('.$row['IdTransportadora'].')" class="col-1">'.$row['IdTransportadora'].'</div>
                    <div onClick="showOpUnit('.$row['IdTransportadora'].')" class="col-4">'.$row['RazonSocial'].'</div>
                    <div onClick="showOpUnit('.$row['IdTransportadora'].')" class="col-4">'.$row['DelMun'].'</div>
                    <div onClick="editTrans('.$row['IdTransportadora'].')"  class="col-3" style="background-color: #393; color: white;">Administrar</div>
                </div>';

            /*$transObj = new stdClass();
            $transObj -> IdTransportadora = $row['IdTransportadora'];
            $transObj -> RazonSocial = $row['RazonSocial'];
            $transObj -> Calle = $row['Calle'];
            $transObj -> NumExt = $row['NumExt'];
            $transObj -> NumInt = $row['NumInt'];
            $transObj -> Colonia = $row['Colonia'];
            $transObj -> DelMun = $row['DelMun'];
            $transObj -> Estado = $row['Estado'];
            $transObj -> CP = $row['CP'];
            $transObj -> Email = $row['Email'];
            $transObj -> Telefono = $row['Telefono'];
            $transObj -> RegSCT = $row['RegSCT'];
            $transObj -> AutorizacionSemarnat = $row['AutorizacionSemarnat'];
            $transObj -> FechaAlta = $row['FechaAlta'];

            echo json_encode($transObj);*/
        }    
    }else{
        $sql = "SELECT * FROM Transportadora WHERE idTransportadora = {$_POST['idTrans']}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);

        $transObj = new stdClass();
            $transObj -> IdTransportadora = $row['IdTransportadora'];
            $transObj -> RazonSocial = $row['RazonSocial'];
            $transObj -> Calle = $row['Calle'];
            $transObj -> NumExt = $row['NumExt'];
            $transObj -> NumInt = $row['NumInt'];
            $transObj -> Colonia = $row['Colonia'];
            $transObj -> DelMun = $row['DelMun'];
            $transObj -> Estado = $row['Estado'];
            $transObj -> CP = $row['CP'];
            $transObj -> Email = $row['Email'];
            $transObj -> Telefono = $row['Telefono'];
            $transObj -> RegSCT = $row['RegSCT'];
            $transObj -> AutorizacionSemarnat = $row['AutorizacionSemarnat'];
            $transObj -> FechaAlta = $row['FechaAlta'];

            echo json_encode($transObj);
    
    }


    

    sqlsrv_close($conn);
?>
