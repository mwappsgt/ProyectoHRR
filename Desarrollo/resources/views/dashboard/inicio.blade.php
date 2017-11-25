@extends("layouts.platta")

@section("titulo")

	<p class="col-md-2 tituloDash">Inicio</p>

@stop

@section("content")
	
	<div ng-controller="infoHotelController">
		
		<div class="row">
			<div class="col col-md-12" style="text-align: right;margin-top: 10px;">
				<button class="btn btn-info" ng-click="setInfoHotel()">Guardar</button>
			</div>
		</div>
	
		<div class="campo row">
            <div class="textoLabel col-md-12">
                <label for="telefono">Nombre del establecimiento *</label>
            </div>
            <div class="textoInput col-md-12">
                <input type="text" ng-model="infHotel.nombre" class="form-control" name="nombre" id="nombre" >
            </div>
        </div>

        
        <div class="campo row">
            <div class="textoLabel col-md-12">
                <label for="telefono">Dirección del establecimiento *</label>
            </div>
            <div class="textoInput col-md-12">
                <input type="text" ng-model="infHotel.ubicacion" class="form-control" name="direccion" id="direccion">
            </div>
        </div>


        <div class="campo row">
        	
        	<div class="col-md-6">
	            <div class="textoLabel col-md-12" style="padding: 0;margin: 0">
	                <label for="nombre">Teléfono principal *</label>
	            </div>
	            <div class="textoInput col-md-12" style="padding: 0;margin: 0">
	                <input type="text" ng-model="infHotel.telefono" class="form-control" name="telefono1" id="telefono1">
	            </div>
	        </div>

	        <div class="col-md-6">
	            <div class="textoLabel col-md-12" style="padding: 0;margin: 0">
	                <label for="nombre">Teléfono secundario</label>
	            </div>
	            <div class="textoInput col-md-12" style="padding: 0;margin: 0">
	                <input type="text" ng-model="infHotel.telefono2" class="form-control" name="telefono2" id="telefono2">
	            </div>
	        </div>
        </div>


        <div class="campo row">
            <div class="textoLabel col-md-12">
                <label for="telefono">Descripción del establecimiento *</label>
            </div>
            <div class="textoInput col-md-12">
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" ng-model="infHotel.descripcion"></textarea>
            </div>
        </div>

        
        <div class="campo row">
            <div class="textoLabel col-md-12">
                <label for="telefono">Visión *</label>
            </div>
            <div class="textoInput col-md-12">
                <textarea class="form-control" name="vision" id="vision" cols="30" rows="10" ng-model="infHotel.vision"></textarea>
            </div>
        </div>


        <div class="campo row">
            <div class="textoLabel col-md-12">
                <label for="telefono">Misión *</label>
            </div>
            <div class="textoInput col-md-12">
                <textarea class="form-control" name="mision" id="mision" cols="30" rows="10" ng-model="infHotel.mision"></textarea>
            </div>
        </div>
	</div>

@stop