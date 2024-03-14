<?php
    require("../../php/dbcon.php");

    $Empresa = $_POST['Empresa'];
    if($Empresa!=0){
        $sql = "SELECT * FROM Empresa WHERE IdEmpresa= {$Empresa}";
        $stmt = sqlsrv_query($conn,$sql);
        
        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div class="rowcnt">
            <div class="col-12" style="
                padding: 8px;
                background-color: gray;
                color: white;">'.$row['RazonSocial'].'</div>
            <div class="col-12">SEMARNAT: '.$row['Semarnat'].'</div>
            <div class="col-12">Capacidad: '.$row['CapacidadAlmacen'].' kg.</div>
            <div class="col-12">Domicilio: </div>
            <div class="col-12">'.$row['Calle'].', N.'.$row['NumeroExt'].
                                  ', Col. '.$row['Colonia'].'</div>
            <div class="col-12">'.$row['DelMun'].', '.$row['Estado'].', C.P. '.$row['CP'].'.</div>
            <div class="col-12">Responsable: '.$row['Responsable'].'</div>
            <div class="col-6">Tel : '.$row['Telefono'].'</div>
            <div class="col-6">E-mail: '.$row['Email'].'</div>
            </div>';
        }
    }else{
        $sql = "SELECT * FROM Empresa";
        $stmt = sqlsrv_query($conn,$sql);
        
        while($row = sqlsrv_fetch_array($stmt)){
            echo'<div onClick="showEmpresa('.$row['IdEmpresa'].')" class="rowcnt" style="padding: 4px 1px;border-bottom: 1px solid #000">
                    <div class="col-1">'.$row['IdEmpresa'].'</div>
                    <div class="col-4">'.$row['RazonSocial'].'</div>
                    <div class="col-4">'.$row['Semarnat'].'</div>
                    <div class="col-3">Detalles</div>
                </div>';
        }
    }
    

    sqlsrv_close($conn);
?>
