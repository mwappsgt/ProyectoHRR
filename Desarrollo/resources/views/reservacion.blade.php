<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body data-ng-app="reservacionApp">

<div data-ng-controller="reservacionController">
    <div class="container" style="margin-top: 50px;">
        <div class="row" data-ng-hide="false">
            <span class="col-md-4"></span>
            <div class="col-md-4">
                <form role='form'>
                    <div class="form-group">
                        <label class="control-label">Fecha de ingreso</label>
                        <input type="text"  class="form-control" ng-model='reservar.fechaIn' name="from" id="from" placeholder="dd-mm-yyyy" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Fecha de salida</label>
                        <input type="text"  class="form-control" ng-model='reservar.fechaOut' name="to" id="to" placeholder="dd-mm-yyyy" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Habitaciones dobles</label>
                        <select data-ng-model='reservar.dobles'
                                data-ng-options="doble for doble in optHabi">
                            <option value="" selected="selected">0</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Habitaciones triples</label>
                        <select data-ng-model='reservar.triples'
                                data-ng-options="triple for triple in optHabi">
                            <option value="" selected>0</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-ng-click="enviarFecha()" data-toggle='modal' data-target='#confirmarHab'>Buscar</button>
                    </div>

                </form>
            </div>
            <span class="col-md-4"></span>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="confirmarHab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h3 style="float: left; margin: 0;">Habitaciones</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!-- habitaciones dobles -->
                        <div class="dob2" style="border: solid;">
                            <div class="row">
                                <div class="col-md-4" style="overflow: auto;">
                                    <img src="https://s-media-cache-ak0.pinimg.com/originals/14/f6/5b/14f65b677b62f544f5dec6274b3faa21.jpg">
                                </div>
                                <span class="col-md-1"></span>
                                <div class="col-md-4">
                                    <div><p>algunas especificaciones</p></div><br>
                                    Habitaciones seleccionadas:
                                    <div><!-- aqui va las habitaciones seleccionadas -->
                                        <button data-ng-click="desHab(hab)" data-ng-repeat="hab in habseld" class="cuadrado2 text-center">
                                            <h3> [[hab.num]] </h3>
                                        </button>
                                    </div>
                                    <hr>
                                    Habitaciones disponibles:
                                    <div><!-- aqui las habitaciones disponibles -->
                                        <button data-ng-click="selHab(hab)" data-ng-repeat="hab in habporsel" class="cuadrado text-center">
                                            <h3> [[hab.num]] </h3>
                                        </button>
                                    </div>
                                    <div class="esconder"><p style="color: red">No se puede agregar mas habitaciones</p></div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="trips" style="border: solid;">
                            habitaciones triples
                            <div class="row">
                                <div class="col-md-4" style="overflow: visible;">
                                    <img src="http://www.gifs-animados.es/clip-art/caricaturas/demonio-de-tasmania/gifs-animados-demonio-de-tasmania-5991641.jpg">
                                </div>
                                <span class="col-md-1"></span>
                                <div class="col-md-4">


                                    <div><p>algunas especificaciones</p></div><br>
                                    Habitaciones seleccionadas:
                                    <div><!-- aqui va las habitaciones seleccionadas -->
                                        <button data-ng-click="desHabT(habT)" data-ng-repeat="habT in triHabseld" class="cuadrado2 text-center">
                                            <h3> [[habT.num]] </h3>
                                        </button>
                                    </div>
                                    <hr>
                                    Habitaciones disponibles:
                                    <div><!-- aqui las habitaciones disponibles -->
                                        <button data-ng-click="selHabT(habT)" data-ng-repeat="habT in triHabsel" class="cuadrado text-center">
                                            <h3> [[habT.num]] </h3>
                                        </button>
                                    </div>
                                    <div class="esconder2"><p style="color: red">No se puede agregar mas habitaciones</p></div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button data-ng-click="confirmar()" type="button" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
        crossorigin="anonymous"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js'></script>
<script src='js/reservacion.controller.js'></script>
<!-- <script src='idiomaFecha.js'></script> -->

<script type="text/javascript">
    $( function() {
        var from = $( "#from" )
                .datepicker({
                    dateFormat: "dd-mm-yy",
                    defaultDate: "+1w",
                    changeMonth: true
                })
                .on( "change", function() {
                    to.datepicker( "option", "minDate", getDate( this ) );
                }),
            to = $( "#to" ).datepicker({
                dateFormat: "dd-mm-yy",
                defaultDate: "+1w",
                changeMonth: true
            })
                .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                });

        function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( 'dd-mm-yy', element.value );
            } catch( error ) {
                date = null;
            }
            return date;
        }
    } );
</script>
<script src='js/myjava.js'></script>

</body>
</html>