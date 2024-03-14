<?php
    require("../../php/dbcon.php");

    $sql = "SELECT * FROM Transportadora";
    $stmt = sqlsrv_query($conn,$sql);
    
    while($row = sqlsrv_fetch_array($stmt)){
        echo'<div class="rowcnt transRow" id="tra'.$row['IdTransportadora'].'" style="padding: 4px 1px;border-bottom: 1px solid #000">
                <div onClick="showOpUnit('.$row['IdTransportadora'].')" class="col-1">'.$row['IdTransportadora'].'</div>
                <div onClick="showOpUnit('.$row['IdTransportadora'].')" class="col-4">'.$row['RazonSocial'].'</div>
                <div onClick="showOpUnit('.$row['IdTransportadora'].')" class="col-4">'.$row['DelMun'].'</div>
                <div onClick="alert('."'Hola'".')" class="col-3" style="background-color: #393; color: white;">Administrar</div>
            </div>';
    }

    sqlsrv_close($conn);
?>
