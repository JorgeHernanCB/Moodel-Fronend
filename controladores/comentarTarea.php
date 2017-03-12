<?php
	require_once("tareaController.php");
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['codigoTareaACalificar']) && isset($_POST['comentarioTareaAComentar'])){

	  $codigo = htmlspecialchars($_POST['codigoTareaACalificar']);
      $comentario = htmlspecialchars($_POST['comentarioTareaAComentar']);


	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================

	
	// Me conecto a la base de datos
	$tareaController = new tareaController();
	$tareaController->cdb = $cdb; 

	$tareaController->comentar($comentario, $codigo);


	echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>