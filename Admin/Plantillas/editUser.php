<?php
    require("../../php/dbcon.php");
    $idUser = $_GET['id'];

    $sql = "SELECT * FROM Users WHERE IdUser={$idUser}";
    $stmt = sqlsrv_query($conn,$sql);
    
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
      }
    
      $row = sqlsrv_fetch_array($stmt);
    sqlsrv_close($conn);
?>

<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="../../JS/jquery-3.7.1.min.js"></script>
		<link rel="stylesheet" href="../../Style/forms.css" />
		
		<title>Editar Usuario</title>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("#btnSave").click(
					function(){
						$.post(
							"../php/editUser.php",
							{
								idUser: <?php echo $idUser?>,
								uName: $("#UName").val(),
								uPass: $("#UPass").val(),
								uCategory: $("#categoryUser").find("option:selected").val(),
							},
							function(data,status){
								console.log("data: " + data + "status: " + status);
                                alert("Usuario editado");
							}
						);
						//window.close();
					}
				);
				
				$("#btnClose").click(function(){window.close();});
			});
		</script>
	</head>
	
	<body>				
		<section>
			<div id ="showNuevo">
				<h1>Usuario id:
                    <?php 
                        echo $idUser;
                    ?>
                </h1>
                <div class="col-19">
                    <?php
                        echo '<input class="form1 rowcnt" type="text" id="UName" value='.$row['UName'].'>';
                        echo '<br><br><input class="form1 rowcnt" type="text" id="UPass" value='.$row['UPass'].'>';
                    ?>
                    <br><br>
                            <select id="categoryUser">
                                <option value="Administrador" <?php echo ($row['UCategory']==='Administador') ? 'selected':' ' ?>>Administrador</option>
                                <option value="Dirección" <?php echo ($row['UCategory']==='Dirección') ? 'selected':' ' ?>>Dirección</option>
                                <option value="Comercial" <?php echo ($row['UCategory']==='Comercial') ? 'selected':' ' ?>>Comercial</option>
                                <option value="Operaciones" <?php echo ($row['UCategory']==='Operaciones') ? 'selected':' ' ?>>Operaciones</option>
                                <option value="SSA" <?php echo ($row['UCategory']==='SSA') ? 'selected':' ' ?>>SSA</option>
                            </select>
                    
                </div>
                <div class="saveCloseBtn">
                    <input class="form1" type="button" value="Guardar" id="btnSave">
				    <input class="form1" type="button" value="Cerrar" id="btnClose">
                </div>
        	</div>
    	</section>
	</body>
</html>