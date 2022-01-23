<?php 

	include_once 'conexion.php';
	if(isset($_GET['ID_ESTUDIANTE'])){
		$ID_ESTUDIANTE=(int) $_GET['ID_ESTUDIANTE'];
		$delete=$con->prepare('DELETE FROM ESTUDIANTE WHERE ID_ESTUDIANTE=:ID_ESTUDIANTE');
		$delete->execute(array(
			':ID_ESTUDIANTE'=>$ID_ESTUDIANTE
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>