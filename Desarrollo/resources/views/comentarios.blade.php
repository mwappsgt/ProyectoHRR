<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Comentarios</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <style>
        .campo{
            margin-top: 5px;
        }

    </style>

</head>

<div style="background:white;" ng-controller="ctrComentarios">

    <div style="margin-top:100px">
        <div class="row" style="margin:0;padding:0">
            <div class="col-md-1"> </div> 
            <div class="col-md-6"> 
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        
                        <div ng-repeat="c in coments" class="carousel-item">
                            
                            <div class="d-block w-100">

                                <div style="width:100%;height:380px">

                                    <div class="panel panel-primary" style="margin-top:150px;">
                                        <div style="font-weight:bold;font-size:30px;text-align:center;margin-bottom:20px" class="panel-heading"></div>
                                        <div class="panel-body">
                                            <div class="row">
                                                
                                                <div ng-repeat="ci in c" style="" class="col-md-4">
                                                    <div style="text-align: center">
                                                        <i style="color:#FAEC03" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color:#FAEC03" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color:#FAEC03" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color:#FAEC03" class="fa fa-star" aria-hidden="true"></i>
                                                        <i style="color:#FAEC03" class="fa fa-star" aria-hidden="true"></i>
                                                    </div>

                                                    <div style="font-size:20px;font-weight: bold; text-align: center">
                                                        [[ci.nombre]]
                                                    </div>

                                                    <div style="font-size:14px;text-align: center">
                                                        [[ci.mensaje]]
                                                    </div>

                                                    <div style="font-size:11px;text-align: center">
                                                        [[ci.fecha]]
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- <div class="d-block w-100" style="width:50px;height:500px">hola</div> -->
                        </div>
                        
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div style=" padding-top:10px;" class="col-md-5">


                <div class="campo row">
                    <div class="textoLabel col-md-2">
                        <label for="telefono">Estrellas:</label>
                    </div>
                    <div class="textoInput col-md-7">
                        <input type="text" ng-control="telefono" class="form-control" name="telefono" id="telefono">
                    </div>
                </div>

                
                <div class="campo row">
                    <div class="textoLabel col-md-2">
                        <label for="telefono">Id reservación:</label>
                    </div>
                    <div class="textoInput col-md-7">
                        <input type="text" ng-control="telefono" class="form-control" name="telefono" id="telefono">
                    </div>
                </div>


                <div class="campo row">
                    <div class="textoLabel col-md-2">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <div class="textoInput col-md-7">
                        <input type="text" ng-control="nombre" class="form-control" name="nombre" id="nombre">
                    </div>
                </div>

                
                <div class="campo row">
                    <div class="textoLabel col-md-2">
                        <label for="mensaje">Mensaje:</label>
                    </div>
                    <div class="textoInput col-md-7">
                        <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="10" ng-control="mensaje"></textarea>
                    </div>
                </div>


                <div class="campo row">
                    <div class="textoLabel col-md-2"></div>
                    <div class="campoBoton col-md-7">
                        <button style="width:100%" class="botonEnviar btn btn-default">Comentar</button>
                    </div>
                </div>


            </div>
        </div>

        
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
<script src="js/script.js"></script>


<!-- Faicon -->
<script src="https://use.fontawesome.com/2a40e14862.js"></script>
<!-- Fin -->

</div>
</html>