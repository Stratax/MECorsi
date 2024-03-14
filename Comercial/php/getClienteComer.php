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
        $sql = "SELECT IdCliente, RazonSocial, NRA FROM Cliente";
        $stmt = sqlsrv_query($conn,$sql);

        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div onClick="detalle('.$row['IdCliente'].')" class="rowcnt" style="padding: 4px 1px;border-bottom: 1px solid black">
            <div class="col-1">'.$row['IdCliente'].'</div>
            <div class="col-6">'.$row['RazonSocial'].'</div>
            <div class="col-3">'.$row['NRA'].'</div>
            <div class="col-2"><input type="button" id ="buttonClienteEdit" value="Editar" class="buttonClienteNuevo"></div>
            </div>';
        }    
    }
    
?>