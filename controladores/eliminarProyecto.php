<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['proyectoAEliminar'])){

	  $proyectoAEliminar = htmlspecialchars($_POST['proyectoAEliminar']);

	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================
	
	require_once("proyectoController.php");
	// Me conecto a la base de datos
	$proyectoController = new proyectoController();
	$proyectoController->cdb = $cdb; 

	$proyectoController->delete($proyectoAEliminar);


	echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>