<?php
    require("../../php/dbcon.php");

    $Empresa = $_POST['Empresa'];
    if($Empresa== -1){
        $sql = "SELECT * FROM Empresa";
        $stmt = sqlsrv_query($conn,$sql);
        
        while($row = sqlsrv_fetch_array($stmt)){
            echo'<div onClick="editEmpresa('.$row['IdEmpresa'].')" class="rowcnt" style="padding: 4px 1px;border-bottom: 1px solid #000">
                    <div class="col2-1">'.$row['IdEmpresa'].'</div>
                    <div class="col2-4">'.$row['RazonSocial'].'</div>
                    <div class="col2-3">'.$row['Semarnat'].'</div>
                    <div class="col2-5">'.$row['Calle'].' No.'.$row['NumeroExt'].' '.$row['Colonia'].', '.$row['Estado'].'</div>
                    <div class="col2-3">'.$row['Responsable'].'</div>
                    <div class="col2-2">'.$row['Telefono'].'</div>
                    <div class="col2-3">'.$row['Email'].'</div>
                    <div class="col2-3">'.$row['CapacidadAlmacen'].' KG.</div>
                </div>';
        }
    }else{
        $sql = "SELECT * FROM Empresa WHERE IdEmpresa= {$Empresa}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);

        $corpObj = new stdClass();
        $corpObj -> IdEmpresa = $row['IdEmpresa'];
        $corpObj -> RazonSocial = $row['RazonSocial'];
        $corpObj -> Semarnat = $row['Semarnat'];
        $corpObj -> Calle = $row['Calle'];
        $corpObj -> NumeroExt = $row['NumeroExt'];
        $corpObj -> NumeroInt = $row['NumeroInt'];
        $corpObj -> Colonia = $row['Colonia'];
        $corpObj -> DelMun = $row['DelMun'];
        $corpObj -> Estado = $row['Estado'];
        $corpObj -> CP = $row['CP'];
        $corpObj -> Email = $row['Email'];
        $corpObj -> Telefono = $row['Telefono'];
        $corpObj -> Responsable = $row['Responsable'];
        $corpObj -> FechaAlta = $row['FechaAlta'];
        $corpObj -> CapacidadAlmacen = $row['CapacidadAlmacen']; 
        
        echo json_encode($corpObj);
    }
    
    sqlsrv_close($conn);
?>


