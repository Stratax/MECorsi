<?php
    require("../../php/dbcon.php");

    $manifiesto = $_POST['Manifiesto'];
    if($manifiesto!='x'){
        $sql = "SELECT * FROM ManifiestoEntrada WHERE IdManifiesto= '{$manifiesto}'";
        $stmt = sqlsrv_query($conn,$sql);

        while($row = sqlsrv_fetch_array($stmt)){
            $sqlCliente = "SELECT * FROM Cliente WHERE IdCliente = {$row['IdCliente']}";
            $stmtCliente = sqlsrv_query($conn,$sqlCliente);
            $clinteR = sqlsrv_fetch_array($stmtCliente);
            $domicilio = $clinteR['Calle'].' No. '.$clinteR['Numero'].', '. $clinteR['Colonia'].'.<br>'.$clinteR['Estado'].' C.P. '.$clinteR['CP']; 
            
            $sqlTrasn = "SELECT * FROM Transportadora WHERE IdTransportadora = {$row['IdTransportadora']}";
            $stmtTrans = sqlsrv_query($conn,$sqlTrasn);
            $transR = sqlsrv_fetch_array($stmtTrans);
            $domicilioT = $transR['Calle'].' No. '.$transR['NumInt'].', '. $transR['Colonia'].'.<br>'.$transR['Estado'].' C.P. '.$transR['CP']; 

            $sqlOpe = "SELECT * FROM Operador WHERE IdOperador = {$row['IdOperador']}";
            $stmtOpe = sqlsrv_query($conn,$sqlOpe);
            $opeR = sqlsrv_fetch_array($stmtOpe);
            $nombreOperador = $opeR['Nombre'].' '.$opeR['ApellidoP'].' '.$opeR['ApellidoM'];

            $sqlUni = "SELECT * FROM Unidad WHERE IdUnidad = {$row['IdUnidad']}";
            $stmtUni = sqlsrv_query($conn,$sqlUni);
            $uniR = sqlsrv_fetch_array($stmtUni);
            
            $sqlUni2 = "SELECT * FROM Unidad WHERE IdUnidad = {$row['IdUnidad2']}";
            $stmtUni2 = sqlsrv_query($conn,$sqlUni2);
            $uniR2 = sqlsrv_fetch_array($stmtUni2);
            
            $unidadNombre = $uniR['Tipo'].' / '.$uniR2['Tipo'];
            $unidadPlacas = $uniR['Placas'].' / '.$uniR2['Placas'];
            
            $sqlDest = "SELECT * FROM Empresa WHERE IdEmpresa = {$row['IdEmpresa']}";
            $stmtDest = sqlsrv_query($conn,$sqlDest);
            $destR = sqlsrv_fetch_array($stmtDest);
            $domicilioD = $destR['Calle'].' No. '.$destR['NumeroInt'].', '. $destR['Colonia'].'.<br>'.$destR['Estado'].' C.P. '.$destR['CP']; 

            
            echo '<div class="rowcnt">
                <div class="col-12" style="
                    padding: 8px;
                    margin-bottom: 3px;
                    background-color: gray;
                    color: white;">'.$row['Estatus'].'</div>

                    <div class="col-6" style="padding:2px;border: 1px solid">NRA: '.$clinteR['NRA'].' </div>
                    <div class="col-2">&nbsp</div>
                <div class="col-2" style="padding:2px;border: 1px solid">Folio: </div>
                <div class="col-2" style="padding:2px;border: 1px solid">'.$row['IdManifiesto'].'</div>
                
                <div class="col-2" style="background: #AAA;padding:2px;border: 1px solid;text-align:left">Generador: </div>
                <div class="col-10" style="padding:2px;border: 1px solid">'.$clinteR['RazonSocial'].' </div>
                <div class="col-12" style="padding:2px;border: 1px solid">'.$domicilio.' </div>
                <div class="col-4" style="padding:2px;border: 1px solid">Contacto</div>
                <div class="col-8" style="padding:2px;border: 1px solid">'.$clinteR['Contacto'].'</div>
                <div class="col-6" style="padding:2px;border: 1px solid">Tel: '.$clinteR['Tel1'].' </div>
                <div class="col-6" style="padding:2px;border: 1px solid">'.$clinteR['Email'].' </div>

                <div class="col-3" style="background: #AAA;padding:2px;border: 1px solid;text-align:left">Transportista: </div>
                <div class="col-9" style="padding:2px;border: 1px solid">'.$transR['RazonSocial'].' </div>
                <div class="col-12" style="padding:2px;border: 1px solid">'.$domicilioT.' </div>
                <div class="col-12" style="padding:2px;border: 1px solid">Autorización: '.$transR['AutorizacionSemarnat'].' </div>
                <div class="col-4" style="padding:2px;border: 1px solid">Operador</div>
                <div class="col-8" style="padding:2px;border: 1px solid">'.$nombreOperador.'</div>
                <div class="col-4" style="padding:2px;border: 1px solid">Unidad / es</div>
                <div class="col-8" style="padding:2px;border: 1px solid">'.$unidadNombre.'</div>
                <div class="col-4" style="padding:2px;border: 1px solid">Placa / s</div>
                <div class="col-8" style="padding:2px;border: 1px solid">'.$unidadPlacas.' </div>
            
                <div class="col-2" style="background: #AAA;padding:2px;border: 1px solid;text-align:left">Destino: </div>
                <div class="col-10" style="padding:2px;border: 1px solid">'.$destR['RazonSocial'].' </div>
                <div class="col-12" style="padding:2px;border: 1px solid">'.$domicilioD.' </div>
                <div class="col-12" style="padding:2px;border: 1px solid">Autorización: '.$destR['Semarnat'].' </div>
                
            </div>';
        }
    }else{
        $sql = "SELECT IdManifiesto, IdCliente, IdEmpresa FROM ManifiestoEntrada";
        $stmt = sqlsrv_query($conn,$sql);

        while($row = sqlsrv_fetch_array($stmt)){
            $sql1 = "SELECT RazonSocial FROM Cliente WHERE IdCliente ={$row['IdCliente']} ";
            $stmt1 = sqlsrv_query($conn,$sql1);
            $row1 = sqlsrv_fetch_array($stmt1);

            $sql2 = "SELECT RazonSocial FROM Empresa WHERE IdEmpresa ={$row['IdEmpresa']} ";
            $stmt2 = sqlsrv_query($conn,$sql2);
            $row2 = sqlsrv_fetch_array($stmt2);

            echo '<div onClick="detalleManifiesto(\''.$row['IdManifiesto'].'\')" class="rowcnt" style="padding: 4px 1px;border-bottom: 1px solid black">
            <div class="col-1">'.$row['IdManifiesto'].'</div>
            <div class="col-6">'.$row1['RazonSocial'].'</div>
            <div class="col-3">'.$row2['RazonSocial'].'</div>
            <div class="col-2">XX</div>
            </div>';
        }    
    }
    
?>