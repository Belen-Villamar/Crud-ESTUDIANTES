<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM ESTUDIANTE ORDER BY ID_ESTUDIANTE DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT * FROM ESTUDIANTE WHERE APELLIDO_ESTUDIANTE LIKE :campo OR CEDULA_ESTUDIANTE LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>TUTORIAS VIRTUALES/Ingreso de Estudiantes</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<h1 >TUTORIAS VIRTUALES</h1>
	<div class="contenedor">
		<h2> Ingreso de Estudiantes</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar por Apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>CÓDIGO</td>
				<td>CEDULA</td>
				<td>NOMBRES</td>
				<td>APELLIDOS</td>
				<td>PROFESION</td>
				<td>TELÉFONO</td>
				<td>CORREO</td>

				<td colspan="2">ACCIÓN</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['ID_ESTUDIANTE']; ?></td>
					<td><?php echo $fila['CEDULA_ESTUDIANTE']; ?></td>
					<td><?php echo $fila['NOMBRE_ESTUDIANTE']; ?></td>
					<td><?php echo $fila['APELLIDO_ESTUDIANTE']; ?></td>
					<td><?php echo $fila['PROFESION_ESTUDIANTE']; ?></td>
					<td><?php echo $fila['TELEFONO_ESTUDIANTE']; ?></td>
					<td><?php echo $fila['CORREO_ESTUDIANTE']; ?></td>


                    <!-- ID_FAMLIAR iba id despues del upadte -->
					<td><a href="update.php?ID_ESTUDIANTE=<?php echo $fila['ID_ESTUDIANTE']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?ID_ESTUDIANTE=<?php echo $fila['ID_ESTUDIANTE']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>