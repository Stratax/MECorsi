<?php
    require("../../php/dbcon.php");

    if($_POST['idOrderService'] == -1){
        $sql = "SELECT * FROM OrdenServicio";
        $stmt = sqlsrv_query($conn,$sql);
        while($row=sqlsrv_fetch_array($stmt)){
            if(!empty($row["IdCliente"])){
                $sql1 = "SELECT RazonSocial FROM Cliente WHERE IdCliente = {$row['IdCliente']}";
                $stmt1= sqlsrv_query($conn,$sql1);
                $row1 = sqlsrv_fetch_array($stmt1);

            }else{
                $row1['RazonSocial'] = "----";
            }
            
            echo '<div onClick="alert('."'Hola'".')" class="rowcnt" style="border-bottom: 1px solid #000">
                     <div class="col2-3" style="color:red">'.$row['IdOrdenServicio'].'</div>
                     <div class="col2-6">'.$row1['RazonSocial'].'</div>
                  </div>';

        }
        
    }
    sqlsrv_close($conn);
?>