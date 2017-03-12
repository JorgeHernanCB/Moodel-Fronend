<?php
	
	session_start();
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['enlaceTarea']) && isset($_POST['notaTarea']) && isset($_POST['comentarioTarea'])
		&& isset($_POST['ActividadTarea'])){

	  $enlaceTarea = htmlspecialchars($_POST['enlaceTarea']);
      $notaTarea = htmlspecialchars($_POST['notaTarea']);
      $comentarioTarea = htmlspecialchars($_POST['comentarioTarea']);
      $ActividadTarea = htmlspecialchars($_POST['ActividadTarea']);


		// ===========================================================================================
		// Conasulta datos de logueo
		// ===========================================================================================
	
			require_once("tareaController.php");
			// Me conecto a la base de datos
			$tareaController = new tareaController();
			$tareaController->cdb = $cdb; 

			$tareaController->create($enlaceTarea, $notaTarea, $comentarioTarea, $_SESSION['codigoDocente'] , "987" ,$ActividadTarea);


			echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>