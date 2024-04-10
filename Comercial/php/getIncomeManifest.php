<?php
    require("../../php/dbcon.php");

    if($_POST['idIncomeManifest'] == -1){
        $sql = "SELECT * FROM ManifiestoEntrada";
        $stmt = sqlsrv_query($conn,$sql);
        while($row=sqlsrv_fetch_array($stmt)){
            if(!empty($row["IdCliente"])){
                $sql1 = "SELECT RazonSocial FROM Cliente WHERE IdCliente = {$row['IdCliente']}";
                $stmt1= sqlsrv_query($conn,$sql1);
                $row1 = sqlsrv_fetch_array($stmt1);
            }else{$row1['RazonSocial'] = "----";}
            
            if(!empty($row['IdTransportadora'])){
                $sql2 = "SELECT RazonSocial FROM Transportadora WHERE IdTransportadora = {$row['IdTransportadora']}";
                $stmt2 = sqlsrv_query($conn,$sql2);
                $row2 = sqlsrv_fetch_array($stmt2);
            }else{$row2['RazonSocial'] = "----";}
            
            if(!empty($row['IdEmpresa'])){
                $sql3 = "SELECT RazonSocial FROM Empresa WHERE IdEmpresa = {$row['IdEmpresa']}";
                $stmt3 = sqlsrv_query($conn,$sql3);
                $row3 = sqlsrv_fetch_array($stmt3);
            }else{$row3['RazonSocial'] = "----";}

            echo '<div class="rowcnt" style="border-bottom: 1px solid #000">
                     <div class="col2-2" style="color:red" onClick="editIncomeManifest(\''.$row['IdManifiesto'].'\')">'.$row['IdManifiesto'].'</div>
                     <div class="col2-5" onClick="editIncomeManifest(\''.$row['IdManifiesto'].'\')">'.$row1['RazonSocial'].'</div>
                     <div class="col2-5" onClick="editIncomeManifest(\''.$row['IdManifiesto'].'\')">'.$row2['RazonSocial'].'</div>
                     <div class="col2-5" onClick="editIncomeManifest(\''.$row['IdManifiesto'].'\')">'.$row3['RazonSocial'].'</div>
                     <div class="col2-2" onClick="editIncomeManifest(\''.$row['IdManifiesto'].'\')">'.$row['FechaSolicitud'].'</div>
                     <div class="col2-3" onClick="editIncomeManifest(\''.$row['IdManifiesto'].'\')">'.$row['Estatus'].'</div>';
                     
                     if($row['Estatus'] != "GENERADO"){
                        echo '<div class="col2-2" style="color:red" onClick="pdfManifest(\''.$row['IdManifiesto'].'\')">PDF</div>
                                  </div>';
                     }else{
                        echo '</div>';
                     }
        }
        
    }else{
        $id = $_POST['idIncomeManifest'];
        $sql = "SELECT * FROM ManifiestoEntrada WHERE IdManifiesto = '{$id}'";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);

        $orderObj = new stdClass();
        $orderObj -> IdManifiesto = $row['IdManifiesto']; 
	    $orderObj -> IdCliente = $row['IdCliente']; 
	    $orderObj -> IdTransportadora = $row['IdTransportadora']; 
	    $orderObj -> IdOperador = $row['IdOperador']; 
	    $orderObj -> IdUnidad = $row['IdUnidad']; 
	    $orderObj -> IdUnidad2 = $row['IdUnidad2']; 
	    $orderObj -> IdEmpresa = $row['IdEmpresa']; 
	    $orderObj -> FechaSolicitud = $row['FechaSolicitud']; 
	    $orderObj -> FechaRecoleccion = $row['FechaRecoleccion']; 
	    $orderObj -> FechaRecepcion = $row['FechaRecepcion']; 
        $orderObj -> Estatus = $row['Estatus']; 

        echo json_encode($orderObj);
    }
    sqlsrv_close($conn);
?>