<?php
	require_once("tareaController.php");
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['notaTareaACalificar']) && isset($_POST['codigoTareaAComentar'])){

	  $nota = htmlspecialchars($_POST['notaTareaACalificar']);
      $codigo = htmlspecialchars($_POST['codigoTareaAComentar']);


	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================

	
	// Me conecto a la base de datos
	$tareaController = new tareaController();
	$tareaController->cdb = $cdb; 

	$tareaController->calificar($nota, $codigo);


	echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>