<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../js/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../js/vendor/bootstrap/css/bootstrap-social.css">
        <link rel="stylesheet" href="../js/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../js/vendor/css/form-elements.css">
        <link rel="stylesheet" href="../js/vendor/css/style.css">


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="img/log1.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Ingresa sus datos</h3>
                        		</div>
                            </div>
                            <div class="form-bottom">

                                    <div class="form-group">
                                    <label for="rolUsuario">Seleccione su rol: </label>
                                    <select class="form-control" id="rolUsuario">
                                        <option value="docente">Docente</option>
                                        <option value="estudiante">Estudiante</option>
                                      </select>
                                    </div>

                                    <div class="form-group">
                                         <label for="codigoUsuario">Codigo: </label>
                                        <input type="text" placeholder="Ingrese su codigo..." class="form-username form-control" id="codigoUsuario">
                                    </div>

			                    	<div class="form-group">
                                         <label for="usernameUsuario">Nombre: </label>
			                        	<input type="text" placeholder="Ingrese su nombre..." class="form-username form-control" id="usernameUsuario">
			                        </div>

                                    <div class="form-group">
                                         <label for="correoUsuario">Correo: </label>
                                        <input type="text" placeholder="Ingrese su correo..." class="form-username form-control" id="correoUsuario">
                                    </div>

                                    <div class="form-group">
                                         <label for="usuarioUsuario">Usuario: </label>
                                        <input type="text" placeholder="Ingrese su usuario..." class="form-username form-control" id="usuarioUsuario">
                                    </div>

                                    <div class="form-group">
                                         <label for="cuentaUsuario">Cuenta de Github: </label>
                                        <input type="text" placeholder="Ingrese su cuenta..." class="form-username form-control" id="cuentaUsuario">
                                    </div>

                                    <div class="form-group">
                                         <label for="passwordUsuario">Contraseña: </label>
                                        <input type="password" placeholder="Ingrese su contraseña..." class="form-username form-control" id="passwordUsuario">
                                    </div>
                                    

                                    <button id="registrarUsuario" name="save-language"  class="btn btn-success">Registrase</button>
                                    

                                <a id="registrarUsuario" href="../index.html"> Regresar. </a>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Javascript -->

        <script src="../js/metodosJavaScrips.js"></script>

        <script src="../js/vendor/jquery-1.11.1.min.js"></script>
        <script src="../js/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/vendor/jquery.backstretch.min.js"></script>

        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>