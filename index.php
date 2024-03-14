<?php
    session_start();
    if($_SESSION){
        switch($_SESSION['UCategory']){
            case 'Administrador':
                header("Location: Admin/admin.php");
                break;
            case 2:
                header("Location: direccion.php");
                break;
            case 'Comercial':
                header("Location: Comercial/comercial.php");
                break;
            case 'Operaciones':
                header("Location: Operaciones/operacion.php");
                break;
            case 'SSA':
                header("Location: SSA/ssa.php");
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="Style/login.css">
		<title>Manejo Especial CORSI 1.1bV</title>
	</head>
	<body>
        <section id="htop" class="col-12"></section>
        <section id="htop" class="col-3"></section>
        <section id="mainContainer" class="col-6">
            <div id="logo" class="col-6">
                <p id="ME">Manejo Especial<p>
                <img src="IMG/Logo_Corsi.png">
            </div>
            <div id="login" class="col-6">
                <form method ="POST" action="php/userSelector.php">
                    <div class="col-2">&nbsp</div>
                    <input class = "col-8" type="text" placeholder = "Usuario" name ="logUser" required>
                    <div class="col-2 row-h">&nbsp</div>
                    <input class = "col-8" type="password" placeholder = "Clave" name ="logPass" required>
                    <div class="col-2 row-h">&nbsp</div>
                    <input class = "col-8" type="submit" value="Log In">
                </form>
            </div>
        </section>
		<footer>
			Designed by STRDEV
		</footer>
	</body>
</html>