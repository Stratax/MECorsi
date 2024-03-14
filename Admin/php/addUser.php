<?php
    require("../../php/dbcon.php");

    $user = $_POST['uName'];
    $pass = $_POST['uPass'];
    $category = $_POST['uCategory'];
    
    $sql ="INSERT INTO Users (UName, UPass, UCategory) VALUES ('{$user}','{$pass}','{$category}')";
    $stmt = sqlsrv_query($conn,$sql);
    $row = sqlsrv_fetch_array($stmt);
    
    sqlsrv_close($conn);

    echo $row;
    
?>