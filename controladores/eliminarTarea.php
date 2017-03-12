<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['TareaAEliminar'])){

	  $TareaAEliminar = htmlspecialchars($_POST['TareaAEliminar']);

	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================
	
	require_once("tareaController.php");
	// Me conecto a la base de datos
	$tareaController = new tareaController();
	$tareaController->cdb = $cdb; 

	$tareaController->delete($TareaAEliminar);


	echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>