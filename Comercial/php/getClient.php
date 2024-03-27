<?php
    require("../../php/dbcon.php");

    $Cliente = $_POST['Cliente'];
    if($Cliente == -1){
        $sql = "SELECT * FROM Cliente";
        $stmt = sqlsrv_query($conn,$sql);

        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div onClick="editClient('.$row['IdCliente'].')" class="rowcnt" style="font-size:11px;border-bottom: 1px solid black">
            <div class="col2-1">'.$row['IdCliente'].'</div>
            <div class="col2-4">'.$row['RazonSocial'].'</div>
            <div class="col2-2">'.$row['RFC'].'</div>
            <div class="col2-2">'.$row['NRA'].'</div>
            <div class="col2-5">'.$row['Calle'].' No. '.$row['Numero'].', '.$row['Colonia'].', '.$row['Estado'].'</div>
            <div class="col2-3">'.$row['Contacto'].'</div>
            <div class="col2-2">'.$row['Tel1'].'</div>
            <div class="col2-4">'.$row['Email'].'</div>
            
        </div>';
        }
    }else{
        $sql = "SELECT * FROM Cliente WHERE IdCliente= {$Cliente}";
        $stmt = sqlsrv_query($conn,$sql);
        $row = sqlsrv_fetch_array($stmt);
        
        $clientObj = new stdClass();
        $clientObj -> IdCliente = $row['IdCliente'];
        $clientObj -> RazonSocial = $row['RazonSocial'];
        $clientObj -> RFC = $row['RFC'];
        $clientObj -> Calle = $row['Calle'];
        $clientObj -> Numero = $row['Numero'];
        $clientObj -> Colonia = $row['Colonia'];
        $clientObj -> DelMun = $row['DelMun'];
        $clientObj -> Estado = $row['Estado'];
        $clientObj -> CP = $row['CP'];
        $clientObj -> CalleFiscal = $row['CalleFiscal'];
        $clientObj -> NumeroFiscal = $row['NumeroFiscal'];
        $clientObj -> ColoniaFiscal = $row['ColoniaFiscal'];
        $clientObj -> DelMunFiscal = $row['DelMunFiscal'];
        $clientObj -> EstadoFiscal = $row['EstadoFiscal'];
        $clientObj -> CPFiscal = $row['CPFiscal'];
        $clientObj -> NRA = $row['NRA'];
        $clientObj -> Contacto = $row['Contacto'];
        $clientObj -> Tel1 = $row['Tel1'];
        $clientObj -> Tel2 = $row['Tel2'];
        $clientObj -> Email = $row['Email'];
        $clientObj -> FechaAlta = $row['FechaAlta'];
        
        echo json_encode($clientObj);
    }
    
?>


