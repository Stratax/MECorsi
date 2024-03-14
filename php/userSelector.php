<?php
    require("dbcon.php");

    $user = $_POST['logUser'];
	$pass = $_POST['logPass'];
		
	$sql = "SELECT * FROM Users WHERE UName = '{$user}' AND UPass = '{$pass}' ";
	$stmt = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array($stmt);
	sqlsrv_close($conn);
		
	if($row){
		session_start();
		$_SESSION['UCategory'] = $row['UCategory'];

		switch($_SESSION['UCategory']){
            case 'Administrador':
                header("Location: ../Admin/admin.php");
                break;
            case 'Dirección':
                header("Location: ../direccion.php");
                break;
            case 'Comercial':
                header("Location: ../Comercial/comercial.php");
                break;
            case 'Operaciones':
                header("Location: ../Operaciones/operacion.php");
                break;
            case 'SSA':
                header("Location: ../SSA/ssa.php");
                break;
        }
		
	}else{
		header("Location: ../index.php");
	}
?>