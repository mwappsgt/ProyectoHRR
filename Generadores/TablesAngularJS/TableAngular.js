
function TableAngular (scope,lista, element, attrs) {

    element.css("cursor", "pointer");
    element.attr('contenteditable', 'true');
    element.bind('blur keyup change', function() {
        scope.lista[attrs.row][attrs.field] = element.text()
    });

    eventos = function(scope,element,attrs) {
        // console.log("Anterior: "+scope.anterior)
        // console.log("Actual: "+scope.lista[attrs.row][attrs.field])
        alert("entro")
    }

    element.bind("focusout",function(){
        eventos(scope,element,attrs)
        scope.editTable = false;
    })

    element.bind("keypress",function(e){
        var key = e.which;
        if(key == 13){
            eventos(scope,element,attrs)
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