<?php
    require("../../php/dbcon.php");

    $Cliente = $_POST['Cliente'];

    $sql = "DELETE FROM Cliente WHERE IdCliente = {$Cliente}";
    $stmt = sqlsrv_query($conn, $sql);

    if($stmt === false){
        die(print_r(sqlsrv_errors(),true));
    }
    
    sqlsrv_close($conn);
?>