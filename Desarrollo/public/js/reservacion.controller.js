var app = angular.module('reservacionApp', [],
	function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
		$interpolateProvider.endSymbol(']]');
	});

app.controller('reservacionController', function($scope, $http){
	//se coloca el codigo javascript
	$scope.reservar = {};
	$scope.optHabi = [1,2,3,4];
	//arreglos de las habitaciones dobles
	$scope.habporsel = [];
	$scope.habseld = [];
	//arreglos de las habitaciones triples
	$scope.triHabsel = [];
	$scope.triHabseld = [];

	$scope.aux = {};
	$scope.val=-1;
	$scope.noMas= true;

	console.log($scope.habporsel);

	//Funcion que sirve para solicitar que habitaciones estan disponibles :D
	$scope.enviarFecha = function()	{

		$(".dob2").hide();
		$(".trips").hide();
		$scope.habporsel=[];
		$scope.habseld = [];
		$scope.triHabsel = [];
		$scope.triHabseld = [];
		// console.log(reservar.fechaOut);
		console.log($scope.reservar);
		if($scope.reservar.dobles!= null || $scope.reservar.triples!= null){
			//Estos dos for son para simular las habitaciones disponibles
			console.log("aqui no");
			if($scope.reservar.dobles>0){
				$(".dob2").show();

				$http.post("/verDisponibilidad",{tipo:"doble",fechaIn:$scope.reservar.fechaIn,fechaOut:$scope.reservar.fechaOut}).then(
                    function(obj){
                        alert(JSON.stringify(obj.data))
                    	$scope.habporsel = obj.data;
                    }
                ).catch(
                    function(err){
                        console.log("Error: "+err)
                    }
                );

				for(var i=0; i<8; i++){
					//$scope.aux.num=i+1;
// 					$scope.habporsel.push($scope.aux);
					$scope.aux={};
				}
			}
			if($scope.reservar.triples>0){
				$(".trips").show();

				$http.post("/verDisponibilidad",{tipo:"triple",fechaIn:$scope.reservar.fechaIn,fechaOut:$scope.reservar.fechaOut}).then(
                    function(obj){
                        alert(JSON.stringify(obj.data))
                        $scope.triHabsel = obj.data
                    }
                ).catch(
                    function(err){
                        console.log("Error: "+err)
                    }
                );

				for(var i=0; i<8; i++){
					//$scope.aux.num=i+1;
					//$scope.triHabsel.push($scope.aux);
					$scope.aux={};
				}
			}

			// $http.post("//",{
			// 	fechaIn : $scope.reservar.fechaIn,
			// 	fechaOut: $scope.reservar.fechaOut,
			// 	dobles  : $scope.reservar.dobles,
			// 	triples : $scope.reservar.triples
			// })
			// .success(function(data,status,headers,config){
			// 	//ingresar los datos en:
			// 	//habitaciones dobles
			// 	$scope.habporsel = [];
			// 	//arreglos de las habitaciones triples
			// 	$scope.triHabsel = [];
			// })
			// .error(function(error,status,headers,config){
			// 	console.log(error);
			// })

		}else{
			console.log('hola');
			//ocultar si no se ha elegido nada xD
			$("#confirmarHab").modal('hide');
		}
		// $scope.otro();
	}
	$scope.selHab = function(e){
		//console.log(e);
		if($scope.habseld.length < $scope.reservar.dobles){
			console.log("si");
			for(var i=0; i<$scope.habporsel.length; i++){
				if($scope.habporsel[i].num==e.num){
					$scope.val=i;
					break;
				}
			}
			$scope.habporsel.splice($scope.val ,1);
			$scope.habseld.push(e);
		}
		else{
			$(".esconder").show();
		   setTimeout(function (){
		   	$(".esconder").hide();
		   }, 1000);
		}
	}
	$scope.desHab = function(e){
		for(var i=0; i<$scope.habseld.length; i++){
			if($scope.habseld[i].num==e.num){
				$scope.val=i;
				break;
			}
		}
		$scope.habseld.splice($scope.val ,1);
		$scope.habporsel.push(e);
	}


	//funciones para habitaciones triples
	$scope.selHabT = function(e){
		//console.log(e);
		if($scope.triHabseld.length < $scope.reservar.triples){
			console.log("si");
			for(var i=0; i<$scope.triHabsel.length; i++){
				if($scope.triHabsel[i].num==e.num){
					$scope.val=i;
					break;
				}
			}
			$scope.triHabsel.splice($scope.val ,1);
			$scope.triHabseld.push(e);
		}
		else{
			$(".esconder2").show();
		   setTimeout(function (){
		   	$(".esconder2").hide();
		   }, 1000);
		}
		

	}
	$scope.desHabT = function(e){
		for(var i=0; i<$scope.triHabseld.length; i++){
			if($scope.triHabseld[i].num==e.num){
				$scope.val=i;
				break;
			}
		}
		$scope.triHabseld.splice($scope.val ,1);
		$scope.triHabsel.push(e);
	}

	$scope.confirmar =  function(){

		$http.post("//",{
			fechaIn   : $scope.reservar.fechaIn,
			fechaOut  : $scope.reservar.fechaOut,
			dobles    : $scope.reservar.dobles,
			triples   : $scope.reservar.triples,
			habDobles : $scope.habseld,
			habTripl  : $scope.triHabseld
		})
		.success(function(data,status,headers,config){
			//Aqui despues de haber enviado toda la informacion
		})
		.error(function(error,status,headers,config){
			console.log(error);
		})

	}
});