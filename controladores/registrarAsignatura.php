<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['nombreAsignatura']) && isset($_POST['docenteAsignatura'])){

	  $nombreAsignatura = htmlspecialchars($_POST['nombreAsignatura']);
      $docenteAsignatura = htmlspecialchars($_POST['docenteAsignatura']);


	// ===========================================================================================
	// Conasulta datos de logueo
	// ===========================================================================================

		require_once("asignaturaController.php");
		// Me conecto a la base de datos
		$asignaturaController = new asignaturaController();
		$asignaturaController->cdb = $cdb; 

		$asignaturaController->create($nombreAsignatura, $docenteAsignatura);


		echo "1";


	}
	else{
		echo 'Error con la identificación del proyecto.';
	}
	
?>