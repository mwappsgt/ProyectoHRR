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

    $scope.eliminar = function(row) {
        if (confirm("¿Seguro que desea eliminar?")) {
            $scope.lista.splice(row, 1);
        }
    };

    $scope.agregar = function() {
        $scope.lista.push({
            nombres: '',
            apellidos: '',
            email: ''
        })
    };

    $scope.recuperarValores = function() {
        console.log($scope.lista);
        $("#JSON").text(JSON.stringify($scope.lista));
    };
}]);

app.directive('editableTd', [function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.css("cursor", "pointer");
            element.attr('contenteditable', 'true');

            element.bind('blur keyup change', function() {
                scope.lista[attrs.row][attrs.field] = element.text()
            });

            element.bind("focusout",function(){
                console.log("Anterior: "+scope.anterior)
                console.log("Actual: "+scope.lista[attrs.row][attrs.field])
                scope.editTable = false;
            })

            element.bind("keypress",function(e){
                var key = e.which;
                if(key == 13){
                    console.log("Anterior: "+scope.anterior)
                    console.log("Actual: "+scope.lista[attrs.row][attrs.field])
                    scope.editTable = false;
                    element.blur()
                }
            })

            element.bind('click', function() {
                if(!scope.editTable) {
                    scope.anterior = scope.lista[attrs.row][attrs.field];

                    element.html("")
                    element.html(scope.anterior)
                    scope.lista[attrs.row][attrs.field] = scope.anterior

                    scope.editTable = true;
                    document.execCommand('selectAll', false, null)
                }

            });
        }
    };
}]);