<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['rolUsuario']) && isset($_POST['codigoUsuario']) && isset($_POST['usernameUsuario'])
		&& isset($_POST['correoUsuario']) && isset($_POST['usuarioUsuario']) && isset($_POST['cuentaUsuario']) && isset($_POST['passwordUsuario'])){

	  $rolUsuario = htmlspecialchars($_POST['rolUsuario']);
      $codigoUsuario = htmlspecialchars($_POST['codigoUsuario']);
      $usernameUsuario = htmlspecialchars($_POST['usernameUsuario']);
      $correoUsuario = htmlspecialchars($_POST['correoUsuario']);
      $usuarioUsuario = htmlspecialchars($_POST['usuarioUsuario']);
      $cuentaUsuario = htmlspecialchars($_POST['cuentaUsuario']);
      $passwordUsuario  = htmlspecialchars($_POST['passwordUsuario']);


		// ===========================================================================================
		// Conasulta datos de logueo
		// ===========================================================================================
		
		if($rolUsuario == "docente"){

			require_once("./docenteController.php");
			// Me conecto a la base de datos
			$docenteController = new docenteController();
			$docenteController->cdb = $cdb; 

			$docenteController->create($codigoUsuario, $usernameUsuario, $usuarioUsuario, $correoUsuario, $cuentaUsuario, $passwordUsuario);


			echo "1";

		}

		if($rolUsuario == "estudiante"){

			require_once("./estudianteController.php"); 
			// Me conecto a la base de datos
			$estudianteController = new estudianteController();
			$estudianteController->cdb = $cdb;

			$estudianteController->create($codigoUsuario, $usernameUsuario, $usuarioUsuario, $correoUsuario, $cuentaUsuario, $passwordUsuario, "123", "1");
		
				echo "2";		
		}

	
	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>