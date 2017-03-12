<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
 
        <title>PHP Customerdb - Dashboard Template for Bootstrap</title>
 
        <!-- Bootstrap core CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
 
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../js/vendor/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
 
        <!-- Custom styles for this template -->
        <link href="../../css/dashboard.css" rel="stylesheet">
 
        <script src="../../js/vendor/assets/js/ie-emulation-modes-warning.js"></script>
 
    </head>
 
    <body>
 
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Proyecto PHP</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="sessionKiller" href="#">salir</a></li>             
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>
 
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="index.php">Informacion del docente <span class="sr-only">(current)</span></a></li>         
                    </ul>
                    
                    <ul class="nav nav-sidebar">            
                        <li class="active"><a  href="tareas.php">Lista de tareas</a></li>
                    </ul>
                     <ul class="nav nav-sidebar">            
                        <li><a  href="actividades.php">Lista de actividades</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Lista de tareas</h1>
               
  
                    <?php      
                             
                        include '../../controladores/tareaController.php';
 
                        $tareaController = new tareaController();
                        $tareaController->cdb = $cdb; 
                    ?>    
             
                    <div class="table-responsive">
                        <!-- Añadimos un botón para el diálogo modal -->
                            <button type="button" class="btn btn-lg btn-success"  data-toggle="modal" data-target="#myModal">Enviar tarea</button>
                            
                                        <!-- Create - Read - Update Creamos una ventana Modal que utilizaremos para c
                                        rear un nuevo idioma, actualizarlo o mostrarlo.-->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Creación de idioma</h4>
                                                </div>
                                                    <div class="modal-body">                          
                                                        <div class="input-group"> 
                                                            <label for="actividadAEnviar">Actividad: </label>
                                                            <select class="form-control" id="actividadAEnviar">
                                                            <?php
                                                                try {
                                                                    $rows2 = $tareaController->actividades();
                                                                   
                                                                     
                                                                    foreach ($rows2 as $row) {
                                                                        ?>
                                                                            <option value="<?php print($row->codigo); ?>"><?php print($row->codigo); ?> => <?php print($row->nombre); ?></option>
                                                                         
                                                                    <?php
                                                                    }
                                                                } catch (Exception $exception) {
                                                                    echo 'Error al hacer la consulta: ' . $exception;
                                                                }
                                                                ?> 
                                                          </select>
                                                        </div>
                                                          <div class="input-group"> 
                                                            <label for="enlaceTareaAEnviar">Enlace de la tarea: </label>
                                                            <input type="text" class="form-control" id="enlaceTareaAEnviar" name="comentarioTarea" placeholder="enlace de github a la tarea" aria-describedby="sizing-addon2">
                                                        </div> 
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="enviarTarea" name="save-language" type="submit" class="btn btn-primary">Guardar</button>

                                                        <button id="cancel"type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                    
                                                    </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->   

  
                        

                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>CODIGO</th>
                                    <th>ENLACE</th>
                                    <th>NOTA</th>
                                    <th>COMENTARIO</th>
                                    <th>ESTUDIANTE</th>
                                    <th>ACTIVIDAD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $rows = $tareaController->readAll();
                                   
                                     
                                    foreach ($rows as $row) {
                                        ?>
                                        <tr>
                                            <td><?php print($row->codigo); ?></td>
                                            <td><a href="<?php print($row->enlace); ?>"><?php print($row->enlace); ?></a></td>
                                            <td><?php print($row->nota); ?></td>
                                            <td><?php print($row->comentario); ?></td>
                                            <td><?php print($row->codigo_estudiante); ?></td>
                                            <td><?php print($row->codigo_actividad); ?></td>
                                            <td>
                                                  


                                            </td>
                                            <td>
                                                

                                            </td>
                                        </tr>      
                                         
                                    <?php
                                    }
                                } catch (Exception $exception) {
                                    echo 'Error al hacer la consulta: ' . $exception;
                                }
                                ?>  
                                     
                            </tbody>      
                        </table>    

                    </div>
                    <!-- Fin código PHP CRUD -->
                    
                </div>
            </div>
        </div>
        
 
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../js/vendor/bootstrap.min.js"></script>

        <script src="../../js/metodosJavaScrips.js"></script>
         
    </body>
</html>