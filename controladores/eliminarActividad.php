<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['ActividadAEliminar'])){

	  $ActividadAEliminar = htmlspecialchars($_POST['ActividadAEliminar']);

	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================
	
	require_once("actividadController.php");
	// Me conecto a la base de datos
	$actividadController = new actividadController();
	$actividadController->cdb = $cdb; 

	$actividadController->delete($ActividadAEliminar);


	echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>