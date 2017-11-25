@extends("layouts.platta")

@section("titulo")

	<p class="col-md-2 tituloDash">Empleados</p>

@stop


@section("content")

<div ng-controller="empleadosController">
	<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Nuevo empleado</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <div class="modal-body">
		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="nombre">Nombre</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="empleados.nombre" class="form-control" name="nombre" id="nombre" >
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="puesto">Puesto</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="empleados.puesto" class="form-control" name="puesto" id="puesto">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Foto</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="empleados.foto" class="form-control" name="foto" id="foto">
		            </div>
				</div>
				
				<div class="row">
					<div class="col col-md-12" style="text-align: center;margin-top: 10px;">
						<button class="btn btn-info" ng-click="addEmpleado()">Crear</button>
					</div>
				</div>

		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
		      </div>
		    </div>

		  </div>
		</div>

	<button class="btn btn-info" data-toggle="modal" data-target="#myModal">Nuevo</button>

	<div class="cuadroGeneralEmpleados row">

		<div ng-repeat="t in [1,2,3,4,5,6,7,8,9,10,11]" class="cuadroEmpleados col col-sm-4 col-md-4 col-lg-4">
			<div>
				<img src="./img/rioreup.png" alt="">
			</div>
			<div>
				Puesto
			</div>
			<div>
				Juan Mérida
			</div>
			<div>
				estrellas
			</div>	
		</div>

	
	</div>

</div>

@stop