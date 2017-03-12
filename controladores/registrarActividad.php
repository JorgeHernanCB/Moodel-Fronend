<?php
	
	session_start();
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['nombreActividad']) && isset($_POST['fechalimiteActividad']) && isset($_POST['lenguajeprogramacionActividad'])
		&& isset($_POST['etiquetaActividad']) && isset($_POST['enlaceActividad']) && isset($_POST['proyectoActividad'])){

	  $nombreActividad = htmlspecialchars($_POST['nombreActividad']);
      $fechalimiteActividad = htmlspecialchars($_POST['fechalimiteActividad']);
      $lenguajeprogramacionActividad = htmlspecialchars($_POST['lenguajeprogramacionActividad']);
      $etiquetaActividad = htmlspecialchars($_POST['etiquetaActividad']);
      $enlaceActividad = htmlspecialchars($_POST['enlaceActividad']);
      $proyectoActividad = htmlspecialchars($_POST['proyectoActividad']);


	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================

	require_once("actividadController.php");
	// Me conecto a la base de datos
	$actividadController = new actividadController();
	$actividadController->cdb = $cdb; 

	$actividadController->create($nombreActividad, $fechalimiteActividad, $lenguajeprogramacionActividad, $etiquetaActividad, $enlaceActividad, $_SESSION['codigoDocente'], $proyectoActividad);


	echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>