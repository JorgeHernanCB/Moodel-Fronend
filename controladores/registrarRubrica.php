<?php
	
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['nombreRubrica']) && isset($_POST['descripcionRubrica']) && isset($_POST['porcentajeRubrica']) && isset($_POST['codigoActividadRubrica'])){

	  $nombreRubrica = htmlspecialchars($_POST['nombreRubrica']);
      $descripcionRubrica = htmlspecialchars($_POST['descripcionRubrica']);
      $porcentajeRubrica = htmlspecialchars($_POST['porcentajeRubrica']);
      $codigoActividadRubrica = htmlspecialchars($_POST['codigoActividadRubrica']);


		// ===========================================================================================
		// Conasulta datos de logueo
		// ===========================================================================================
	
			require_once("rubricaController.php");
			// Me conecto a la base de datos
			$rubricaController = new rubricaController();
			$rubricaController->cdb = $cdb; 

			$rubricaController->create($nombreRubrica, $descripcionRubrica, $porcentajeRubrica, $codigoActividadRubrica);


			echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>