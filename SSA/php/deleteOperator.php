<?php 
    require("../../php/dbcon.php");

    $idOperator = $_POST['idOperator'];
    
    $sql = "DELETE FROM Operador WHERE IdOperador = {$idOperator}";
    $stmt = sqlsrv_query($conn,$sql);

    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    
    sqlsrv_close($conn);
?>