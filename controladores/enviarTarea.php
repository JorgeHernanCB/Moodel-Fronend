<?php
	
	session_start();
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['actividadAEnviar']) && isset($_POST['enlaceTareaAEnviar']) ){

	  $actividadAEnviar = htmlspecialchars($_POST['actividadAEnviar']);
      $enlaceTareaAEnviar = htmlspecialchars($_POST['enlaceTareaAEnviar']);

    	require_once("tareaController.php");
		// Me conecto a la base de datos
		$tareaController = new tareaController();
		$tareaController->cdb = $cdb; 


		$rows2 = $tareaController->buscar($actividadAEnviar);
                                                                   
        $codigoDocente; 

        //print_r($rows2);

	    foreach ($rows2 as $row) {
	       
	        $codigoDocente = $row->Docente_codigo;
		 }


		// ===========================================================================================
		// Conasulta datos de logueo
		// ===========================================================================================
	
	

		$tareaController->create($enlaceTareaAEnviar, "0", "Sin comentarios", $codigoDocente,  $_SESSION['codigoEstudiante'] , $actividadAEnviar);


		echo "1";


	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>