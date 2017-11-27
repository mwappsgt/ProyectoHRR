app = angular.module("app",[],
    
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    })

    // .controller('menuTopController', ['$scope','$location', '$http' ,function ($scope,$location,$http) {  // Controlador general
    //     $scope.getClass = function (path) { // Obtiene la clase para saber cuál es active
    //         host = window.location.host;
    //         landingUrl = "http://" + host;
    //         return (window.location.pathname === path) ? 'active' : '';
    //     }
    // }])

    .controller('controlador', ['$scope', '$http' ,function ($scope,$http) {  // Controlador general


        $scope.getClass = function(path){
            host = window.location.host;
            landingUrl = "http://" + host;
            
            return (window.location.pathname === path) ? 'col elemTriang' : '';
        }

        $scope.getClassTexto = function(path){
            host = window.location.host;
            landingUrl = "http://" + host;
            return (window.location.pathname === path) ? 'row MenuClassTexto' : 'row elemLista';
        }

        $scope.listaClick = function(vista){
            window.location = "/"+vista;
        }
        
    }])

    .controller('controladorContacto', ['$scope', '$http' ,function ($scope,$http) {  // Controlador general

        //alert("entro a contacto")
        
    }])

    .controller('ctrComentarios', ['$scope', '$http' ,function ($scope,$http) {  // Controlador general


        $scope.addComent = function(){
            //alert("estrellas: "+$scope.estrellas+" idReserva:"+$scope.idReserva+" nombre:"+$scope.nombre+" Mensaje:"+$scope.mensaje)
            $http.post("/setComents",{
                estrellas:$scope.estrellas,
                idReserva:$scope.idReserva,
                nombre:$scope.nombre,
                mensaje:$scope.mensaje
            }).then(
                function(obj){
                    $http.post("/getComents").then(
                        function(obj){

                            $scope.coments = obj.data
                            // $scope.$watch(function () {
                            $("#carouselExampleIndicators").children()[1].childNodes[2].className += " active"
                            // });
                            $scope.estrellas = ""
                            $scope.idReserva = ""
                            $scope.nombre = ""
                            $scope.mensaje = ""
                        }
                    ).catch(
                        function(err){
                            console.log(err)
                        }
                    );                 
                }
            ).catch(
                function(err){
                    console.log(err)
                }
            );
        }

        $http.post("/getComents").then(
            function(obj){

                $scope.coments = obj.data
                
                $scope.$watch(function () {
                    $("#carouselExampleIndicators").children()[1].childNodes[2].className += " active"
                });
                
            }
        ).catch(
            function(err){
                console.log(err)
            }
        );
    }])


    // Dashboard view

    .controller('infoHotelController', ['$scope', '$http' ,function ($scope,$http) {  // Controlador general

        $scope.infHotel = []

        $http.post("/getInfoHotel").then(
            function(obj){
                $scope.infHotel = obj.data[0]
                //alert(JSON.stringify($scope.infHotel[0]))
            }
        ).catch(
            function(err){
                console.log(err)
            }
        );

        $scope.setInfoHotel = function(){
            
            $http.post("/setInfoHotel",{infHotel:$scope.infHotel}).then(
                function(obj){
                    //alert(obj.data)
                }
            ).catch(
                function(err){
                    console.log(err)
                }
            );

        }


        


    }])


    .controller('habitacionesController', ['$scope', '$http' ,function ($scope,$http) {  // Controlador general

        $scope.infHotel = []


        $scope.table=[];

        editable = true;

        $scope.delItems = 0;
        $scope.arrdelItems = [];
    

        function loadEvents () {
            
            el = $(this)
            col=$(this).closest("tr").children().index($(this));
            
            if(editable && col != 0 && col != 1 ){

                idRow=el.closest("tr").find("td:nth-child(1)").html();
                

                oldValue = el.html();
                colName = el.parent().parent().find("tr:eq(0)").find("th:nth-child("+(col+1)+")").html()

                el.html("<input id='texto' type='text' class='form-control' name='texto'/>");

                editable = false;


                $("#texto").val(""+oldValue);
                $("#texto").focus();

                //Formas para salir y guardar info
                $("#texto").focusout(function() {
                
                    $http.post("/updateHabitacion",{id:idRow,colName:colName,nuevo:$("#texto").val()}).then(
                        function(obj){
                            //$scope.registros = obj.data
                            
                            console.log(obj.data)
                            
                        }
                    ).catch(
                        function(err){
                            console.log(err)
                        }
                    );

                    editable=true;
                    $(this).closest("td").html(""+$(this).val());
                    
                    
                });

                $("#texto").keypress(function(e) {
                    if(e.which == 13) {
                        
                        $http.post("/updateHabitacion",{id:idRow,colName:colName,nuevo:$("#texto").val()}).then(
                        function(obj){
                                //$scope.registros = obj.data
                                
                                console.log(obj.data)
                                
                            }
                        ).catch(
                            function(err){
                                console.log(err)
                            }
                        );

                        editable=true;
                        $(this).closest("td").html(""+$(this).val());
                    }
                });
                //Fin
                
            }
        
   
        }


        $scope.$watch(function () {

            if ($('#tablaEdit tr td').length){
                $("#tablaEdit tr td").click(loadEvents);

                $("#filtro").focusout(function(){
                    $("#tablaEdit tr td").click(loadEvents);
                });

            }

        });



        $http.post("/getHabitacionesTotales").then(
            function(obj){
                //$scope.infHotel = obj.data[0]
                $scope.habit = obj.data
            }
        ).catch(
            function(err){
                console.log(err)
            }
        );


        $scope.getCheckedFalse = function(val){
            if(val == 1){
                return true;
            }else{
                return false;
            }
        }


        $scope.delHabitacion = function(valor,id){
            
            // if(valor){

            //     if($scope.arrdelItems.indexOf(id) == -1){
            //         $scope.delItems++;
            //         $scope.arrdelItems.push(id)
            //     }
                
            // }else{
                
            //     if($scope.delItems > 0){
            //         $scope.delItems--;
            //         if($scope.arrdelItems.indexOf(id) != -1){
            //             //alert($scope.arrdelItems.indexOf(id))
            //             $scope.arrdelItems.splice($scope.arrdelItems.indexOf(id),1)
            //         }
            //     }
            // }

            $http.post("/setEnHabitaciones",{id:id,valor:valor}).then(
                function(obj){
                    //alert(obj.data)
                }
            ).catch(
                function(err){
                    console.log(err)
                }
            );
            
        }




        $scope.addHabitacion = function(){
            $http.post("/addHabitacion",{
                data:$scope.habNuevo
            }).then(
                function(obj){
                    alert(obj.data)
                }
            ).catch(
                function(err){
                    console.log(err)
                }
            );
        }


    }])

    .controller('toursController', ['$scope', '$http', function ($scope, $http) {  // Controlador general

        $scope.table = [];

        $scope.delItems = 0;
        $scope.arrdelItems = [];

        $http.post("/getToursTotales").then(
            function (obj) {
                $scope.tours = obj.data
            }
        ).catch(
            function (err) {
                console.log(err)
            }
        );

        $scope.delTour = function (id) {

            $http.post("/delTour", { id: id}).then(
                function (obj) {
                    $scope.tours = obj.data
                }
            ).catch(
                function (err) {
                    alert("Error")
                }
            );

        }

        $scope.editTour = function(){
            console.log($scope.toursArrEdit)
            $http.post("/updateTour", { data: $scope.toursArrEdit }).then(
                function (obj) {
                    $scope.tours = obj.data
                }
            ).catch(
                function (err) {
                    alert("Error")
                }
            );
        }

        $scope.editTourTmp = function(id){
            $http.post("/getOneTour", { id: id }).then(
                function (obj) {
                    $scope.toursArrEdit = obj.data[0]
                    console.log($scope.toursArrEdit)
                }
            ).catch(
                function (err) {
                    console.log(err)
                }
            );
        }




        $scope.addTour = function () {
            $http.post("/addTour", {
                data: $scope.toursArr
            }).then(
                function (obj) {
                    alert(obj.data)
                }
                ).catch(
                function (err) {
                    console.log(err)
                }
                );
        }


    }])

    .controller('empleadosController', ['$scope', '$http', function ($scope, $http) {  // Controlador general

        $scope.table = [];

        $scope.delItems = 0;
        $scope.arrdelItems = [];
        

        $http.post("/getEmpleados").then(
            function (obj) {
                $scope.empleadosTotales = obj.data
                console.log($scope.empleadosTotales)
            }
        ).catch(
            function (err) {
                console.log(err)
            }
        );

        $scope.delTour = function (id) {

            $http.post("/delTour", { id: id }).then(
                function (obj) {
                    $scope.tours = obj.data
                }
            ).catch(
                function (err) {
                    alert("Error")
                }
                );

        }

        $scope.addEmpleado = function () {
            $http.post("/addEmpleado", {
                data: $scope.empleados
            }).then(
                function (obj) {
                    $scope.empleados.nombre = "";
                    $scope.empleados.puesto = "";
                    $scope.empleados.telefono = "";
                    $scope.empleados.foto = "";
                    alert("Ingresado con éxito")
                }
                ).catch(
                function (err) {
                    console.log(err)
                }
                );
        }


    }])

    .controller('estadisticaController', ['$scope', '$http', function ($scope, $http) {  // Controlador general

        var ctx = document.getElementById('myChart').getContext('2d');
    
        var line = new Chart(ctx, { 
            "type": "line", 
            "data": { 
                "labels": [1,2,3,4,5,6,7],
                "datasets": [{ 
                    "label": "Reservaciones por día", 
                    "data": [65, 59, 80, 81, 56, 55, 40],
                    "fill": false, 
                    "borderColor": "rgb(75, 192, 192)", 
                    "lineTension": 0.1
                }]
            }, 
            "options": {} });

        
        var ctx2 = document.getElementById('myChart2').getContext('2d');

        var line2 = new Chart(ctx2, {
            "type": "line",
            "data": {
                "labels": [1, 2, 3, 4, 5, 6, 7],
                "datasets": [{
                    "label": "Reservaciones canceladas por día",
                    "data": [65, 59, 80, 81, 56, 55, 40],
                    "fill": false,
                    "borderColor": "rgb(75, 192, 192)",
                    "lineTension": 0.1
                }]
            },
            "options": {}
        });

        var ctx3 = document.getElementById('myChart3').getContext('2d');

        var line3 = new Chart(ctx3, {
            "type": "line",
            "data": {
                "labels": [1, 2, 3, 4, 5, 6, 7],
                "datasets": [{
                    "label": "Ingresos al día",
                    "data": [65, 59, 80, 81, 56, 55, 40],
                    "fill": false,
                    "borderColor": "rgb(75, 192, 192)",
                    "lineTension": 0.1
                }]
            },
            "options": {}
        });

        var ctx4 = document.getElementById('myChart4').getContext('2d');

        var line4 = new Chart(ctx4, {
            "type": "line",
            "data": {
                "labels": [1, 2, 3, 4, 5, 6, 7],
                "datasets": [{
                    "label": "Valoración promedio del hotel por día",
                    "data": [65, 59, 80, 81, 56, 55, 40],
                    "fill": false,
                    "borderColor": "rgb(75, 192, 192)",
                    "lineTension": 0.1
                }]
            },
            "options": {}
        });

    }])


    // End Dashboard
