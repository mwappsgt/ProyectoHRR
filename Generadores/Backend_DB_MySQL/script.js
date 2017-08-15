angular.module('App', [])

.controller('Controller', function($scope,$http) {

	$scope.archivo = "archivo"
	$scope.log = "";
	$scope.state = "";

	$scope.tablaName=""
	$scope.dbName=""
	$scope.dbUser="root"
	$scope.dbPassword=""
	$scope.dbHost="localhost"

	$scope.generarInsert = function(){
		$http.post("request.php",
			{
				opc:1,
				table:""+$scope.tablaName,
				dbName:""+$scope.dbName,
				dbUser:""+$scope.dbUser,
				dbPassword:""+$scope.dbPassword,
				dbHost:""+$scope.dbHost,
			}).then(
            function(obj){
            	$scope.state = "Generado con éxito";
                $scope.log = obj.data
                var link = document.createElement('a');
				var uri = "data:application/octet-stream," + encodeURIComponent(""+$scope.log);

				if (typeof link.download === 'string') {
			        document.body.appendChild(link); // Firefox requires the link to be in the body
			        link.download = $scope.tablaName+"Insert.txt";
			        link.href = uri
			        link.click();
			        document.body.removeChild(link); // remove the link when done
			    } else {
			        location.replace(uri);
			    }
				
            }
        ).catch(
            function(err){
            	$scope.state = "Error al generar";
                console.log(err)
            }
        );


	}

	$scope.descargar = function(){
		
/*		$scope.contenido = "hola mundo";

		uriContent = "data:application/octet-stream;filename=filename.txt," + encodeURIComponent(""+$scope.contenido);
		newWindow=window.open(uriContent, 'filename.txt');*/

		var link = document.createElement('a');
		var uri = "data:application/octet-stream," + encodeURIComponent("hola mundo");

		if (typeof link.download === 'string') {
	        document.body.appendChild(link); // Firefox requires the link to be in the body
	        link.download = "filename.txt";
	        link.href = uri
	        link.click();
	        document.body.removeChild(link); // remove the link when done
	    } else {
	        location.replace(uri);
	    }
		
	}

	

});
