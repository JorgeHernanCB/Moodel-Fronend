<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['estudianteAEliminar'])){

	  $estudianteAEliminar = htmlspecialchars($_POST['estudianteAEliminar']);

	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================
	
	require_once("estudianteController.php");
	// Me conecto a la base de datos
	$estudianteController = new estudianteController();
	$estudianteController->cdb = $cdb; 

	$estudianteController->delete($estudianteAEliminar);


	echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>