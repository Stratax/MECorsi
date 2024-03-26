<?php
    include("../../php/dbcon.php");

    $sql = "DELETE FROM Unidad WHERE IdUnidad = {$_POST['Unidad']}";
    $stmt = sqlsrv_query($conn,$sql);

    sqlsrv_close($conn);

?>