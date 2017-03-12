<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['nombreProyecto']) && isset($_POST['enlaceProyecto']) && isset($_POST['notaProyecto'])
		&& isset($_POST['estudianteProyecto']) ){

	  $nombreProyecto = htmlspecialchars($_POST['nombreProyecto']);
      $enlaceProyecto = htmlspecialchars($_POST['enlaceProyecto']);
      $notaProyecto = htmlspecialchars($_POST['notaProyecto']);
      $estudianteProyecto = htmlspecialchars($_POST['estudianteProyecto']);


		// ===========================================================================================
		// Conasulta datos de logueo
		// ===========================================================================================
	
			require_once("proyectoController.php");
			// Me conecto a la base de datos
			$proyectoController = new proyectoController();
			$proyectoController->cdb = $cdb; 

			$proyectoController->create($nombreProyecto, $enlaceProyecto, $notaProyecto, $estudianteProyecto, "1");


			echo "1";


	}
	else{
		echo 'Error con la identificación del proyecto.';
	}
	
?>