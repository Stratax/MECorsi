<?php
    require("../../php/dbcon.php");

    $idUser = $_POST['idUser'];
    $uName = $_POST['uName'];
    $uPass = $_POST['uPass'];
    $uCategory = $_POST['uCategory'];

    $sql ="UPDATE Users SET UName = '{$uName}', UPass = '{$uPass}', UCategory = '{$uCategory}' WHERE idUser = {$idUser}";
    $stmt = sqlsrv_query($conn, $sql);
    sqlsrv_close($conn);

    
?>