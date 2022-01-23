<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
       
		$ID_TIPOESTUDIANTE=$_POST['ID_TIPOESTUDIANTE'];
		$ID_EMPRESA=$_POST['ID_EMPRESA'];
		$CEDULA_ESTUDIANTE=$_POST['CEDULA_ESTUDIANTE'];
		$NOMBRE_ESTUDIANTE=$_POST['NOMBRE_ESTUDIANTE'];
		$APELLIDO_ESTUDIANTE=$_POST['APELLIDO_ESTUDIANTE'];
		$PROFESION_ESTUDIANTE=$_POST['PROFESION_ESTUDIANTE'];
		$TELEFONO_ESTUDIANTE=$_POST['TELEFONO_ESTUDIANTE'];
		$CORREO_ESTUDIANTE=$_POST['CORREO_ESTUDIANTE'];


		if(!empty($ID_TIPOESTUDIANTE) && !empty($ID_EMPRESA) && !empty($CEDULA_ESTUDIANTE) && !empty($NOMBRE_ESTUDIANTE) && !empty($APELLIDO_ESTUDIANTE) && !empty($PROFESION_ESTUDIANTE) && !empty($TELEFONO_ESTUDIANTE) && !empty($CORREO_ESTUDIANTE) ){
			{
				$consulta_insert=$con->prepare('INSERT INTO ESTUDIANTE ( ID_TIPOESTUDIANTE, ID_EMPRESA ,CEDULA_ESTUDIANTE , NOMBRE_ESTUDIANTE, APELLIDO_ESTUDIANTE, PROFESION_ESTUDIANTE, TELEFONO_ESTUDIANTE, CORREO_ESTUDIANTE) VALUES ( :ID_TIPOESTUDIANTE, :ID_EMPRESA , :CEDULA_ESTUDIANTE , :NOMBRE_ESTUDIANTE, :APELLIDO_ESTUDIANTE, :PROFESION_ESTUDIANTE, :TELEFONO_ESTUDIANTE, :CORREO_ESTUDIANTE)' );
				$consulta_insert->execute(array(
                    
					':ID_TIPOESTUDIANTE' =>$ID_TIPOESTUDIANTE,
					':ID_EMPRESA' =>$ID_EMPRESA,
					':CEDULA_ESTUDIANTE' =>$CEDULA_ESTUDIANTE,
					':NOMBRE_ESTUDIANTE' =>$NOMBRE_ESTUDIANTE,
					':APELLIDO_ESTUDIANTE' =>$APELLIDO_ESTUDIANTE,
					':PROFESION_ESTUDIANTE' =>$PROFESION_ESTUDIANTE,
					':TELEFONO_ESTUDIANTE' =>$TELEFONO_ESTUDIANTE,
					':CORREO_ESTUDIANTE' =>$CORREO_ESTUDIANTE
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Estudiante</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Ingresar Estudiante</h2>
		<form action="" method="post">
			<div class="form-group">
                
				
				<input type="text" name="ID_TIPOESTUDIANTE" placeholder="TIPO_ESTUDIANTE" class="input__text">
				<input type="text" name="ID_EMPRESA" placeholder="ID_EMPRESA" class="input__text">
				<input type="text" name="CEDULA_ESTUDIANTE" placeholder="CEDULA_ESTUDIANTE" class="input__text">

			</div>
			<div class="form-group">
			    <input type="text" name="NOMBRE_ESTUDIANTE" placeholder="Nombres" class="input__text">
				<input type="text" name="APELLIDO_ESTUDIANTE" placeholder="Apellido" class="input__text">
				<input type="text" name="PROFESION_ESTUDIANTE" placeholder="Profesion" class="input__text">
				
			</div>
			<div class="form-group">
			<input type="text" name="TELEFONO_ESTUDIANTE" placeholder="Número de Teléfono/Celular" class="input__text">	
			<input type="text" name="CORREO_ESTUDIANTE" placeholder="Correo" class="input__text">
			
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
