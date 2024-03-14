<?php

    require("../../php/dbcon.php");

    $sql = "SELECT * FROM Users";
    $stmt = sqlsrv_query($conn,$sql);
    
    while($row = sqlsrv_fetch_array($stmt)){
        echo '<div class="rowcnt">
                <div class="col-3" style="font-size:12px;padding:3px; border:1px solid black">'.$row['UName'].'</div>
                <div class="col-3" style="font-size:12px;padding:3px; border:1px solid black">'.$row['UCategory'].'</div>
                <div class="col-3" style="font-size:12px;padding:3px; border:1px solid black" onClick="editUser('.$row['IdUser'].')"> Edit </div>
                <div class="col-3" style="font-size:12px;padding:3px; border:1px solid black"> Offline </div>
            </div>';
    }

    sqlsrv_close($conn);

    
?>