<?php
	include_once 'conexion.php';

	if(isset($_GET['ID_ESTUDIANTE'])){
		$ID_ESTUDIANTE=(int) $_GET['ID_ESTUDIANTE'];

		$buscar_id=$con->prepare('SELECT * FROM ESTUDIANTE WHERE ID_ESTUDIANTE=:ID_ESTUDIANTE ');
		$buscar_id->execute(array(
			':ID_ESTUDIANTE'=>$ID_ESTUDIANTE
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
        $ID_ESTUDIANTE= $_GET['ID_ESTUDIANTE'];
		$ID_TIPOESTUDIANTE=$_POST['ID_TIPOESTUDIANTE'];
		$ID_EMPRESA=$_POST['ID_EMPRESA'];
		$CEDULA_ESTUDIANTE=$_POST['CEDULA_ESTUDIANTE'];
		$NOMBRE_ESTUDIANTE=$_POST['NOMBRE_ESTUDIANTE'];
        $APELLIDO_ESTUDIANTE=$_POST['APELLIDO_ESTUDIANTE'];
        $PROFESION_ESTUDIANTE=$_POST['PROFESION_ESTUDIANTE'];
        $TELEFONO_ESTUDIANTE=$_POST['TELEFONO_ESTUDIANTE'];
		$CORREO_ESTUDIANTE=$_POST['CORREO_ESTUDIANTE'];

		

		if(!empty($ID_TIPOESTUDIANTE) && !empty($ID_EMPRESA) && !empty($CEDULA_ESTUDIANTE) && !empty($NOMBRE_ESTUDIANTE) && !empty($APELLIDO_ESTUDIANTE) && !empty($PROFESION_ESTUDIANTE) && !empty($TELEFONO_ESTUDIANTE) && !empty($CORREO_ESTUDIANTE)                                  ){
			{
				$consulta_update=$con->prepare(' UPDATE ESTUDIANTE SET  


        ID_TIPOESTUDIANTE=:ID_TIPOESTUDIANTE,
        ID_EMPRESA=:ID_EMPRESA,
        CEDULA_ESTUDIANTE=:CEDULA_ESTUDIANTE,
        NOMBRE_ESTUDIANTE=:NOMBRE_ESTUDIANTE,
        APELLIDO_ESTUDIANTE=:APELLIDO_ESTUDIANTE,
        PROFESION_ESTUDIANTE=:PROFESION_ESTUDIANTE,
        TELEFONO_ESTUDIANTE=:TELEFONO_ESTUDIANTE,
        CORREO_ESTUDIANTE=:CORREO_ESTUDIANTE
        WHERE ID_ESTUDIANTE=:ID_ESTUDIANTE;'

				);
				$consulta_update->execute(array(
					':ID_TIPOESTUDIANTE' =>$ID_TIPOESTUDIANTE,
					':ID_EMPRESA' =>$ID_EMPRESA,
					':CEDULA_ESTUDIANTE' =>$CEDULA_ESTUDIANTE,
					':NOMBRE_ESTUDIANTE' =>$NOMBRE_ESTUDIANTE,
					':APELLIDO_ESTUDIANTE' =>$APELLIDO_ESTUDIANTE,
					':PROFESION_ESTUDIANTE' =>$PROFESION_ESTUDIANTE,
					':TELEFONO_ESTUDIANTE' =>$TELEFONO_ESTUDIANTE,
					':CORREO_ESTUDIANTE' =>$CORREO_ESTUDIANTE,
					':ID_ESTUDIANTE' =>$ID_ESTUDIANTE
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
	<title>Editar Estudiante</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Datos Estudiante</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="ID_TIPOESTUDIANTE" value="<?php if($resultado) echo $resultado['ID_TIPOESTUDIANTE']; ?>" class="input__text">
				<input type="text" name="ID_EMPRESA" value="<?php if($resultado) echo $resultado['ID_EMPRESA']; ?>" class="input__text">
				<input type="text" name="CEDULA_ESTUDIANTE" value="<?php if($resultado) echo $resultado['CEDULA_ESTUDIANTE']; ?>" class="input__text">

			</div>
			<div class="form-group">
				<input type="text" name="NOMBRE_ESTUDIANTE" value="<?php if($resultado) echo $resultado['NOMBRE_ESTUDIANTE']; ?>" class="input__text">
				<input type="text" name="APELLIDO_ESTUDIANTE" value="<?php if($resultado) echo $resultado['APELLIDO_ESTUDIANTE']; ?>" class="input__text">
				<input type="text" name="PROFESION_ESTUDIANTE" value="<?php if($resultado) echo $resultado['PROFESION_ESTUDIANTE']; ?>" class="input__text">

			</div>
			<div class="form-group">
				<input type="text" name="TELEFONO_ESTUDIANTE" value="<?php if($resultado) echo $resultado['TELEFONO_ESTUDIANTE']; ?>" class="input__text">
				<input type="text" name="CORREO_ESTUDIANTE" value="<?php if($resultado) echo $resultado['CORREO_ESTUDIANTE']; ?>" class="input__text">



			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
