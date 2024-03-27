<?php
    require("../../php/dbcon.php");

    $Cliente = $_POST['Cliente'];
    if($Cliente!=0){
        $sql = "SELECT * FROM Cliente WHERE IdCliente= {$Cliente}";
        $stmt = sqlsrv_query($conn,$sql);

        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div class="rowcnt">
            <div class="col-12" style="
                padding: 8px;
                background-color: gray;
                color: white;">'.$row['RazonSocial'].'</div>
            <div class="col-6">RFC: '.$row['RFC'].'</div>
            <div class="col-6">NRA: '.$row['NRA'].'</div>
            <div class="col-12">Domicilio: </div>
            <div class="col-12">'.$row['Calle'].', N.'.$row['Numero'].
                                  ', Col. '.$row['Colonia'].'</div>
            <div class="col-12">'.$row['DelMun'].', '.$row['Estado'].', C.P. '.$row['CP'].'.</div>
            <div class="col-12">Domicilio Fiscal: </div>
            <div class="col-12">'.$row['CalleFiscal'].', N.'.$row['NumeroFiscal'].
                                  ', Col. '.$row['ColoniaFiscal'].'</div>
            <div class="col-12">'.$row['DelMunFiscal'].', '.$row['EstadoFiscal'].', C.P. '.$row['CPFiscal'].'.</div>
            
            <div class="col-12">Contacto: '.$row['Contacto'].'</div>
            <div class="col-6">Tel 1: '.$row['Tel1'].'</div>
            <div class="col-6">Tel 2: '.$row['Tel2'].'</div>
            <div class="col-12">E-mail: '.$row['Email'].'</div>
            </div>';
        }
    }else{
        $sql = "SELECT * FROM Cliente";
        $stmt = sqlsrv_query($conn,$sql);

        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div onClick="detalle('.$row['IdCliente'].')" class="rowcnt" style="font-size:11px;border-bottom: 1px solid black">
            <div class="col2-1">'.$row['IdCliente'].'</div>
            <div class="col2-5">'.$row['RazonSocial'].'</div>
            <div class="col2-2">'.$row['RFC'].'</div>
            <div class="col2-2">'.$row['NRA'].'</div>
            <div class="col2-5">'.$row['Calle'].' No. '.$row['Numero'].'</div>
            <div class="col2-2">'.$row['Colonia'].'</div>
            <div class="col2-2">'.$row['Contacto'].'</div>
            <div class="col2-2">'.$row['Tel1'].'</div>
            <div class="col2-3">'.$row['Email'].'</div>
        </div>';
        }    
    }
    
?>