<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['asignaturaAEliminar'])){

	  $asignaturaAEliminar = htmlspecialchars($_POST['asignaturaAEliminar']);

	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================
	
	require_once("asignaturaController.php");
	// Me conecto a la base de datos
	$asignaturaController = new asignaturaController();
	$asignaturaController->cdb = $cdb; 

	$asignaturaController->delete($asignaturaAEliminar);


	echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>