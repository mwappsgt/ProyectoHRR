@extends("layouts.platta")

@section("titulo")

	<p class="col-md-2 tituloDash">Habitaciones</p>

@stop

@section("content")




	<div class="row" ng-controller="habitacionesController">

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Nueva habitación</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <div class="modal-body">
		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Número</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="habNuevo.numero" class="form-control" name="nombre" id="nombre" >
		            </div>
		        </div>

		        
		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Tipo</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <select name="" ng-model="habNuevo.tipo" class="form-control" id="">
		                	<option value="doble">Doble</option>
		                	<option value="triple">Triple</option>
		                	<option value="extraGrande">Extra Grande</option>
		                </select>
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Descripcion</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="habNuevo.des" class="form-control" name="direccion" id="direccion">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Extra</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="habNuevo.extra" class="form-control" name="direccion" id="direccion">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Camas</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="habNuevo.camas" class="form-control" name="direccion" id="direccion">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Precio</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="habNuevo.precio" class="form-control" name="direccion" id="direccion">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Tamaño</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="habNuevo.tamanio" class="form-control" name="direccion" id="direccion">
		            </div>
		        </div>

				<div class="row">
					<div class="col col-md-12" style="text-align: center;margin-top: 10px;">
						<button class="btn btn-info" ng-click="addHabitacion()">Crear</button>
					</div>
				</div>


		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
		      </div>
		    </div>

		  </div>
		</div>

		<div class="col col-md-12">

			<div class="row" style="margin-top: 20px;">
				<div class="col-sm-8 col-lg-8"></div>
			    <div class="col-sm-1 col-lg-1 buscarl">
			        <label for="buscar">Busqueda</label>
			    </div>
			    <div class="col-sm-3 col-lg-3">
			        <input id="buscar" type="text" class="form-control" ng-model="buscar">
			    </div>
			</div>

			<!-- <div class="row">
				<button style="margin-left: 20px" class="btn btn-danger">Eliminar [[ delItems ]]</button>
			</div> -->

			<div class="row">
				<button style="margin-left: 20px" class="btn btn-info" data-toggle="modal" data-target="#myModal">Nueva</button>
			</div>

			<table id="tablaEdit" style="margin-top: 50px;margin-bottom: 50px" class="table table-bordered table-striped">
				<tr>
					<th style="display: none">Id</th>
					<th>Habilitado</th>
					<th>Número</th>
					<th>Tipo</th>
					<th>Descripción</th>
					<th>Extra</th>
					<th>Camas</th>
					<th>Precio</th>
					<th>Tamaño</th>
					
				</tr>
				
				<tr ng-repeat="h in habit | filter:buscar track by $index">
					<td style="display: none">[[ h.id ]]</td>
					<td><input class="check" ng-model="ck" ng-checked="getCheckedFalse(h.en)" ng-click="delHabitacion(ck,h.id)" type="checkbox"></td>
					<td>[[ h.numero ]]</td>
					<td>[[ h.tipo ]]</td>
					<td>[[ h.des ]]</td>
					<td>[[ h.extra ]]</td>
					<td>[[ h.camas ]]</td>
					<td>[[ h.precio ]]</td>
					<td>[[ h.tamanio ]]</td>
				</tr>

			</table>
		</div>
	</div>

@stop