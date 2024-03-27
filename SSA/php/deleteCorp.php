<?php
    require("../../php/dbcon.php");

    $Empresa = $_POST['Empresa'];

    $sql = "DELETE FROM Empresa WHERE IdEmpresa = {$Empresa}";
    $stmt = sqlsrv_query($conn,$sql);

    sqlsrv_close($conn);

?>