'use strict';

var app = angular.module('TablaDemo', []);

app.controller('TablaCtrl', ['$scope', function($scope) {
    $scope.lista = [{
        nombres: 'Juan',
        apellidos: 'Pérez',
        email: 'juanperez@gmail.com'
    }, {
        nombres: 'Julio',
        apellidos: 'López',
        email: 'jlopez@gmail.com'
    }];

    $scope.lista2 = [{
        nombres: 'Juan',
        apellidos: 'Pérez',
        email: 'juanperez@gmail.com'
    }, {
        nombres: 'Julio',
        apellidos: 'López',
        email: 'jlopez@gmail.com'
    }];

    $scope.recuperarValores = function() {
        $("#JSON").text(JSON.stringify($scope.lista));
    };

    $scope.agregar = function() {
        $scope.lista.push({
            nombres: '',
            apellidos: '',
            email: ''
        })
    };

}])

app.directive('editableTd', [function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs){


            var tabla = new TableAngular(scope,scope.lista,element,attrs)
            tabla.event
            // tabla.eventos = function(scope,element,attrs) {
            //     console.log("Anterior: "+scope.anterior)
            //     console.log("Actual: "+scope.lista[attrs.row][attrs.field])
            // }
            //tabla.setEvento("hola")
        }
    };
}]);



