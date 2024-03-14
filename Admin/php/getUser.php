<?php

    require("../../php/dbcon.php");

    if($_POST['idUser'] == -1){
        $sql = "SELECT * FROM Users";
        $stmt = sqlsrv_query($conn,$sql);

        while($row = sqlsrv_fetch_array($stmt)){
            echo '<div class="rowcnt" style="font-size:12px; border-bottom:1px solid black"">
                    <div class="col-3">'.$row['UName'].'</div>
                    <div class="col-3">'.$row['UCategory'].'</div>
                    <div class="col-3" style="background-color:#417700; color:white; border-radius: 5px;" onClick="editUser('.$row['IdUser'].')"> Edit </div>
                    <div class="col-3"> Offline </div>
                </div>';
    }

    }else{
        $sql = "SELECT * FROM Users WHERE idUser = {$_POST['idUser']}";
        $stmt = sqlsrv_query($conn,$sql);

        $row = sqlsrv_fetch_array($stmt);
        $userObj = new stdClass();
        $userObj -> UName = $row['UName'];
        $userObj -> UPass = $row['UPass'];
        $userObj -> UCategory = $row['UCategory'];

        echo json_encode($userObj);
    }
    
    
    
    sqlsrv_close($conn);

    
?>