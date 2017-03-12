<!DOCTYPE html>
 <?php 
    session_start();
?>
<html lang="en" ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
 
        <title>PHP</title>
 
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
                        <li class="active"><a href="index.php">Informacion del estudiante<span class="sr-only">(current)</span></a></li>         
                    </ul>
                     <ul class="nav nav-sidebar">            
                        <li><a  href="actividades.php">Lista de actividades</a></li>
                    </ul>
                </div>


                <div class="col-sm-3 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Información del estudiante</h1>
 

                    <div class="container">
                        <div class="col-sm-6 col-md-4 text-center">
                              <div class="well well-lg">
                                  <section>
                                    
                                    <img class="img-circle" src=" ../../img/estudiante.png" alt="Generic placeholder image" width="160" height="160">
                                                       
                                  </section>
                              </div>  
                              <strong>Descargar notas </strong>
                              <a href="reporte_pdf.php"><img src="../../img/pdf.jpg" width="70" height="65"/></a>
                        </div>

                        <?php                                
                                     
                                include '../../controladores/estudianteController.php';
         
                                $estudianteController = new estudianteController();
                                $estudianteController->cdb = $cdb; 

                                $doc = $estudianteController->buscarEstudiante($_SESSION['codigoEstudiante']);
                        
                        ?>

                        <div class="col-sm-6 col-md-8 ">
                            <div class="thumbnail">
                              <div class="caption ">
                                  <h3>Información personal</h3>

                                  <table class="table table-hover">

                                      <tr>
                                        <td><strong>Codigo:</strong> </td>
                                        <td><?php echo $_SESSION['codigoEstudiante']?></td>
                                      </tr>
                                      <tr>
                                        <td><strong>Nombre:</strong></td>
                                        <td><?php echo ($doc[0]->nombre);  ?></td>
                                      </tr>
                                      <tr>
                                        <td><strong>Usuario:</strong></td>
                                        <td><?php echo ($doc[0]->usuario);  ?></td>
                                      </tr>
                                      <tr>
                                        <td><strong>Correo:</strong></td>
                                        <td><?php echo ($doc[0]->email);  ?></td>
                                      </tr>
                                      <tr>
                                        <td><strong>Cuenta: </strong></td>
                                        <td><a href="<?php echo ($doc[0]->cuentaGithub);  ?>"><?php echo ($doc[0]->cuentaGithub);  ?></a></td>
                                      </tr>
                                      
                                  </table>
                              </div>
                            </div>
                       </div>
                   </div>


                   <div class="col-sm-6 col-md-12">

                    <body  ng-controller="gitHubDataController">

                        <div class="container">

                            <div class="panel  panel-default">
                                <div class="panel-heading">

                                    <form class="form-inline">
                                        <span>
                                            <h4>Repos <span class="badge">{{repoData.length}}</span>
                                            <input ng-model="searchText" placeholder="Find a repo..." class="form-control input-sm">
                                            </h4>
                                        </span>
                                    </form>

                                </div>
                                <div class="panel-body">
                                    <div class="list-group">
                                        <div ng-repeat="repo in repoData | filter:searchText  | orderBy:predicate:reverse" class="list-group-item ">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h4>
                                                        <small>
                                                            <span ng-if="repo.fork" class="octicon octicon-repo-forked"></span>
                                                            <span ng-if="!repo.fork" class="octicon octicon-repo"></span>
                                                        </small>
                                                        <a href="{{repo.html_url}}" target="_blank" >
                                                            {{repo.name}}
                                                        </a>
                                                        <small>{{repo.description}}</small>
                                                    </h4>

                                                    <small>
                                                        <a href="{{repo.homepage}}" class="">
                                                            <i class="fa fa-link"></i> WebPage
                                                        </a>
                                                    </small>
                                                </div>
                                                <div class="col-md-4">
                                                    <dl class="dl-horizontal">
                                                      <dt>Last Updated:</dt>
                                                      <dd>{{repo.updated_at | date : short : timezone}}</dd>
                                                      <dt>Created:</dt>
                                                      <dd>{{repo.created_at| date : short : timezone}}</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <script src="../../lib/estudiante/lib/angular/angular.min.js" charset="utf-8"></script>
                        <script src="../../lib/estudiante/app/app.js" charset="utf-8"></script>

                    </body>

                    </div>


            
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