<?php 
    require("../../php/dbcon.php");

    $idOperador = $_POST['idOperador'];
    
    $sql = "DELETE FROM Operador WHERE IdOperador = {$idOperador}";
    $stmt = sqlsrv_query($conn,$sql);
    
    sqlsrv_close($conn);
?>