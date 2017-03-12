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
                        <li ><a href="index-entro.php">Informacion del docente <span class="sr-only">(current)</span></a></li>         
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li><a href="estudiantes.php">Lista de estudiantes</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li><a href="proyectos.php">Lista de proyectos</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li class="active"><a  href="actividades.php">Lista de actividades</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li><a href="tareas.php">Lista de tareas</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">            
                        <li><a  href="asignaturas.php">Lista de asignaturas</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Lista de actividades</h1>
               
  
                    <?php      
                             
                        include '../../controladores/actividadController.php';
 
                        $actividadController = new actividadController();
                        $actividadController->cdb = $cdb; 
                    ?>    
             
                    <div class="table-responsive">
                        <!-- Añadimos un botón para el diálogo modal -->
                            <button type="button" class="btn btn-lg btn-primary"  data-toggle="modal" data-target="#myModal">Crear actividad</button>
                        
                                        <!-- Create - Read - Update Creamos una ventana Modal que utilizaremos para c
                                        rear un nuevo idioma, actualizarlo o mostrarlo.-->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Creación de actividad</h4>
                                                </div>
                                                    <div class="modal-body">
                                                        <div class="input-group"> 
                                                            <label for="nombreActividad">Nombre: </label>
                                                            <input type="text" class="form-control" id="nombreActividad" name="nombreActividad" placeholder="Nombre" aria-describedby="sizing-addon2">
                                                        </div>
                                                        <div class="input-group"> 
                                                            <label for="fechalimiteActividad">Fecha limite: </label>
                                                            <input type="text" class="form-control" id="fechalimiteActividad" name="fechalimiteActividad" placeholder="Activo" aria-describedby="sizing-addon2">
                                                        </div>                          
                                                        <div class="input-group"> 
                                                            <label for="lenguajeprogramacionActividad">Lenguaje de programacion</label>
                                                            <input type="text" class="form-control" id="lenguajeprogramacionActividad" name="lenguajeprogramacionActividad" placeholder="Iso" aria-describedby="sizing-addon2">
                                                        </div>
                                                        <div class="input-group"> 
                                                            <label for="etiquetaActividad">etiqueta</label>
                                                            <input type="text" class="form-control" id="etiquetaActividad" name="etiquetaActividad" placeholder="Código País" aria-describedby="sizing-addon2">
                                                        </div>
                                                        <div class="input-group"> 
                                                            <label for="enlaceActividad">enlace</label>
                                                            <input type="text" class="form-control" id="enlaceActividad" name="enlaceActividad" placeholder="Es idioma base" aria-describedby="sizing-addon2">
                                                        </div>
                                                        <div class="input-group"> 
                                                            <label for="proyectoActividad">Proyecto: </label>

                                                            <select class="form-control" id="proyectoActividad">
                                                            <?php
                                                                try {
                                                                    $rows2 = $actividadController->proyecto();
                                                                   
                                                                     
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
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="registrarActividad" name="save-language" type="submit" class="btn btn-primary">Guardar</button>

                                                        <button id="cancel"type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                    
                                                    </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->   

                        
                                     <button type="button" class="btn btn-lg btn-danger"  data-toggle="modal" data-target="#modalEliminar">Eliminar actividad</button>

                                            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="myModalLabel">Eliminar actividad</h4>
                                                                    </div>
                                                                    
                                                                        <div class="modal-body">    

                                                                            <div class="form-group">
                                                                            <label for="ActividadAEliminar">Seleccione una actividad a eliminar: </label>
                                                                            <select class="form-control" id="ActividadAEliminar">
                                                                                <?php
                                                                                    try {
                                                                                        $rows3 = $actividadController->readAll();
                                                                                       
                                                                                         
                                                                                        foreach ($rows3 as $row) {
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

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button id="eliminarActividad" name="save-language"  class="btn btn-danger">Eliminar</button>

                                                                            <button id="cancel"type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                    
                                                                        </div>
                                                                    
                                                                </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div><!-- /.modal -->  



                                  <button type="button" class="btn btn-lg btn-success"  data-toggle="modal" data-target="#myModalRubrica">Agregar rubrica</button>

                        
                                        <!-- Create - Read - Update Creamos una ventana Modal que utilizaremos para c
                                        rear un nuevo idioma, actualizarlo o mostrarlo.-->
                                    <div class="modal fade" id="myModalRubrica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Registrar rubrica</h4>
                                                </div>
                                                
                                                    <div class="modal-body">                                    
                                                        <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>NOMBRE</th>
                                                                                <th>DESCRIPCION</th>
                                                                                <th>PORCENTAJE</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><input type="text" class="form-control" id="nombreRubrica" placeholder="Nombre de la rubrica"></td>
                                                                                <td><input type="text" class="form-control" id="descripcionRubrica" placeholder="Descripcion de la rubrica"></td>
                                                                                <td><input type="number" class="form-control" id="porcentajeRubrica" placeholder="Porcentaje de la rubrica"></td>
                                                                            </tr>      
                                                                                     
                                                                        </tbody>      
                                                            </table>  
                                                             <div class="form-group">
                                                                <label for="codigoActividadRubrica">Seleccione una actividad: </label>
                                                                <select class="form-control" id="codigoActividadRubrica">
                                                                    <?php
                                                                        try {
                                                                            $rows3 = $actividadController->readAll();
                                                                           
                                                                             
                                                                            foreach ($rows3 as $row) {
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
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="agregarRubrica" class="btn btn-success">agregar rubrica</button>

                                                        <button id="cancel"type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                    
                                                    </div>
                                                
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->   


                        
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>CODIGO</th>
                                    <th>NOMBRE</th>
                                    <th>FECHA LIMITE</th>
                                    <th>LENGUAJE DE PROGRAMACION</th>
                                    <th>ETIQUETA</th>
                                    <th>ENLACE</th>
                                    <th>PROYECTO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $rows = $actividadController->readAll();
                                   
                                     
                                    foreach ($rows as $row) {
                                        ?>
                                        <tr>
                                            <td><?php print($row->codigo); ?></td>
                                            <td><?php print($row->nombre); ?></td>
                                            <td><?php print($row->fechaLimite); ?></td>
                                            <td><?php print($row->lenguajeProgramacion); ?></td>
                                            <td><?php print($row->etiqueta); ?></td>
                                            <td><?php print($row->enlace); ?></td>
                                            <td><?php print($row->proyecto_codigo); ?></td>
                                            <td>

                                                <button id="see-language" name="see-language"type="button" class="btn btn-warning"
                                                data-toggle="modal"
                                                data-target="#myModal<?php print($row->codigo); ?>"> Ver rubricas  </button>

                                                <div class="modal fade" id="myModal<?php print($row->codigo); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">rubricas</h4>
                                                            </div>
                                                                <div class="modal-body">  

                                                                      <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>NOMBRE</th>
                                                                                <th>DESCRIPCION</th>
                                                                                <th>PORCENTAJE</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            try {
                                                                                $rows = $actividadController->rubricasDeLaActividad($row->codigo);
                                                                               
                                                                                 
                                                                                foreach ($rows as $row) {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?php print($row->nombre); ?></td>
                                                                                        <td><?php print($row->descripcion); ?></td>
                                                                                        <td><?php print($row->porcentaje); ?></td>
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
                                                                <div class="modal-footer">
                                                             
                                                                    <button id="cancel"type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                    
                                                                </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal --> 
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