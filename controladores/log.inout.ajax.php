<?php
	session_start();// inicio las variables de sesión
	require_once("./DatabaseConnect.php");
	
	// verifico que se este mandando el nombre de usuario y el password
	if ( isset($_POST['login_username']) && isset($_POST['login_userpass']) && isset($_POST['rol'])){
		// Me conecto a la base de datos
		$ConnectionBD = new DatabaseConnect();	
		$cdb = $ConnectionBD->dbConnectSimple();

		

		// ===========================================================================================
		// Conasulta datos de logueo
		// ===========================================================================================
		
		if($_POST['rol'] == "docente"){

			$sql = 'SELECT *
					FROM docente  
					WHERE usuario = :login_username AND password= :login_userpass LIMIT 1';
			$consultaPreparada = $cdb->prepare($sql);
			$consultaPreparada->bindParam(":login_username",$_POST['login_username']);
			$consultaPreparada->bindParam(":login_userpass",$_POST['login_userpass']);
			$consultaPreparada->execute();
			$resultado = $consultaPreparada->fetchAll();

				
			// Verifico que solo haya encontrado 1 usuario
			if ( sizeof($resultado) == 1 ){
				// declaro que el usuario existe para loggearse.
				$userLogin = true;
				// Extraigo los datos del usuario
				$user = $resultado[0];
				// Almaceno los datos del usuario en variables de session.
				$_SESSION['codigoDocente']	= $user['codigo'];
				echo "1";

			}//cierre primera consulta
	
			echo "3";

		}

		if($_POST['rol'] == "estudiante"){

			$sql = 'SELECT *
					FROM estudiante   
					WHERE usuario = :login_username AND password= :login_userpass LIMIT 1';
			$consultaPreparada = $cdb->prepare($sql);
			$consultaPreparada->bindParam(":login_username",$_POST['login_username']);
			$consultaPreparada->bindParam(":login_userpass",$_POST['login_userpass']);
			$consultaPreparada->execute();
			$resultado = $consultaPreparada->fetchAll();

				
			// Verifico que solo haya encontrado 1 usuario
			if ( sizeof($resultado) == 1 ){
				// declaro que el usuario existe para loggearse.
				$userLogin = true;
				// Extraigo los datos del usuario
				$user = $resultado[0];
				// Almaceno los datos del usuario en variables de session.
				$_SESSION['codigoEstudiante']	= $user['codigo'];
				echo "2";		

			}//cierre primera consulta
			
			echo "4";

		}

	
	}
	else{
		echo 'Error con la identificación del usuario.';
	}
	
?>