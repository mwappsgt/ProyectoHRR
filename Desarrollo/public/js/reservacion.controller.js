// // app = angular.module('app',[],
    
// //     function($interpolateProvider) {
// //         $interpolateProvider.startSymbol('[[');
// //         $interpolateProvider.endSymbol(']]');
// //     });



app.controller('confController', function($scope, $http){
	$scope.hel={};
	$scope.valores=[];
	$scope.hel.op = "Fecha de ingreso";
	$scope.hel.dato = '1/1/01';
	$scope.valores.push($scope.hel);
	$scope.hel={};
	$scope.hel.op = "Fecha de salida";
	$scope.hel.dato = '2/2/02';
	$scope.valores.push($scope.hel);
	$scope.hel={};
	$scope.hel.op = "Habitaciones dobles";
	$scope.hel.dato = "2	*Q200.00 c/u*";
	$scope.valores.push($scope.hel);
	$scope.hel={};
	$scope.hel.op = "Habitaciones triples";
	$scope.hel.dato = "3	*Q400.00 c/u*";
	$scope.valores.push($scope.hel);
	$scope.hel={};
	$scope.hel.op = "Habitaciones Extra grandes";
	$scope.hel.dato = "1	*Q500.00 c/u*";
	$scope.valores.push($scope.hel);
	$scope.hel={};
	$scope.total = 2100;

	//DATOS QUE SE TIENEN QUE LLENAR
	$scope.datosFinal = {};
	// $scope.telefono='';
	// $scope.correo ='';
	

	$scope.confFinal = function(){
		$scope.datosFinal.fechaIn	= $scope.valores[0].dato;
		$scope.datosFinal.fechaOut	= $scope.valores[1].dato;
		$scope.datosFinal.dobles	= 2;
		$scope.datosFinal.triples	= 3;
		$scope.datosFinal.xtraG		= 1;

		console.log($scope.datosFinal);

		// $http.post("/",{reservacionDatos:$scope.datosFinal}).then(
		// 	function(obj){
		// 		console.log(ob);
		// 	}
		// ).catch(
		// 	function(err){
		// 		console.log("Error: "+err)
		// 	}
		// );

	}

});

app.controller('archivosController', function($scope, $http){
	
   $scope.addFiles = function(){
	   $('#formarchivo').ajaxForm(
	   {
		   success:function(data) {
			   $("#archivo").val("")
			   $scope.$apply(function () {
				   //$scope.tableArchivos = data;
				   console.log(data)
				   
			   });
		   },
		   error:function(e){
			   console.log("Error al subir archivo")
		   }
	   });

	   $('#formarchivo').submit();
   }
   
});

app.controller('toursController', function($scope, $http){
   $scope.verIncluye = function(){
	   $("#incluyeDiv").toggle("slow",function(){
		   window.location = "#incluyeDiv";	
	   })
	  
   }
   
});

app.controller('contactanosController', function($scope, $http){
   $scope.sendContact = function(){
	   $('#formContact').ajaxForm(
	   {
		   success:function(data) {
			   //$("#archivo").val("")
			   $scope.$apply(function () {
				   //$scope.tableArchivos = data;
				   alert(data)
				   
			   });
		   },
		   error:function(e){
			   console.log("Error al subir archivo")
		   }
	   });

	   $('#formContact').submit();
   }
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
   //$scope.noMas= true;


   //Funcion que sirve para solicitar que habitaciones estan disponibles :D
   $scope.enviarFecha = function()	{

	   console.log($scope.reservar);
	   if($scope.reservar.dobles!= null || $scope.reservar.triples!= null){
		   //Estos dos for son para simular las habitaciones disponibles
		   if($scope.reservar.dobles>0){
			   $(".dob2").show();

			   $http.post("/verDisponibilidad",{tipo:"doble",fechaIn:$scope.reservar.fechaIn,fechaOut:$scope.reservar.fechaOut}).then(
				   function(obj){
					   $scope.habporsel = obj.data;
				   }
			   ).catch(
				   function(err){
					   console.log("Error: "+err)
				   }
			   );
		   }
		   if($scope.reservar.triples>0){
			   $(".trips").show();

			   $http.post("/verDisponibilidad",{tipo:"triple",fechaIn:$scope.reservar.fechaIn,fechaOut:$scope.reservar.fechaOut}).then(
				   function(obj){
					   $scope.triHabsel = obj.data
				   }
			   ).catch(
				   function(err){
					   console.log("Error: "+err)
				   }
			   );

			   
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
		//    $("#confirmarHab").modal('hide');
	   }
	//    location.href='confirmar.html';
	   // $scope.otro();
   }
   
});