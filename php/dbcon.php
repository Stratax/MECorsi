<?php
    //$serverName = "SRVSAICORSI\CORSISQL2019"; //Base de datos original
    //$serverName = "ASISTCORP\TESTSQL"; //Base de datos HP
    //$serverName = "srvstr\MSSQLSTR"; //LapHP
    $serverName = "CONTABILIDAD\COMPAC"; //Deploy COMPAQUI SERVER
    $connectionInfo = array("Database" => "MECorsi", "UID"=>"sa" , "PWD"=>"contable.9");
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if(!$conn){
        echo "No database found!!!";
    }else{
        echo "";
    }
?>