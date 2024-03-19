<?php
    require("../../php/dbcon.php");

    $idUser = $_POST['idUser'];
   
    $sql ="DELETE FROM Users WHERE idUser = {$idUser}";
    $stmt = sqlsrv_query($conn, $sql);
    sqlsrv_close($conn);

    
?>