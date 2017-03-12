<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['codigoEstudiante']) && isset($_POST['nombreEstudiante']) && isset($_POST['emailEstudiante'])
		&& isset($_POST['usuarioEstudiante']) && isset($_POST['passwordEstudiante']) && isset($_POST['cuentaGithubEstudiante'])){

	  $codigoEstudiante = htmlspecialchars($_POST['codigoEstudiante']);
      $nombreEstudiante = htmlspecialchars($_POST['nombreEstudiante']);
      $emailEstudiante = htmlspecialchars($_POST['emailEstudiante']);
      $usuarioEstudiante = htmlspecialchars($_POST['usuarioEstudiante']);
      $passwordEstudiante = htmlspecialchars($_POST['passwordEstudiante']);
      $cuentaGithubEstudiante = htmlspecialchars($_POST['cuentaGithubEstudiante']);


		// ===========================================================================================
		// Conasulta datos de logueo
		// ===========================================================================================
	
			require_once("estudianteController.php");
			// Me conecto a la base de datos
			$estudianteController = new estudianteController();
			$estudianteController->cdb = $cdb; 

			$estudianteController->create($codigoEstudiante, $nombreEstudiante, $usuarioEstudiante, $emailEstudiante, $cuentaGithubEstudiante, $passwordEstudiante,"123", "1");


			echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>