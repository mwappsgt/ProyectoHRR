@extends("layouts.platta")

@section("titulo")

	<p class="col-md-2 tituloDash">Tours</p>

@stop

@section("content")

	<div class="row" ng-controller="toursController">

		<!-- Edit Modal -->
		<div id="myModalEdit" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Editar tour</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <div class="modal-body">
		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Nombre</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArrEdit.nombre" class="form-control" name="nombre" id="nombre" >
		            </div>
		        </div>

		        
		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Tipo</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArrEdit.tipo" class="form-control" name="tipo" id="tipo" >
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Descripción</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArrEdit.descripcion" class="form-control" name="descripcion" id="descripcion">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Cupo máximo</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArrEdit.cupoMax" class="form-control" name="cupoMax" id="cupoMax">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="salida">Salida</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArrEdit.fechaHoraSalida" class="form-control" name="salida" id="salida">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="retorno">Retorno</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArrEdit.fechaHoraRetorno" class="form-control" name="retorno" id="retorno">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="imgTour">Imagen tour</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArrEdit.imgTour" class="form-control" name="imgTour" id="imgTour">
		            </div>
		        </div>

				<div class="row">
					<div class="col col-md-12" style="text-align: center;margin-top: 10px;">
						<button class="btn btn-info" ng-click="editTour()">Guardar</button>
					</div>
				</div>


		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
		      </div>
		    </div>

		  </div>
		</div>


		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Nuevo tour</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <div class="modal-body">
		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Nombre</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArr.nombre" class="form-control" name="nombre" id="nombre" >
		            </div>
		        </div>

		        
		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Tipo</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArr.tipo" class="form-control" name="tipo" id="tipo" >
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Descripción</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArr.des" class="form-control" name="descripcion" id="descripcion">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Cupo máximo</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArr.cupoMax" class="form-control" name="cupoMax" id="cupoMax">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Salida</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="date" ng-model="toursArr.salida" class="form-control" name="salida" id="salida">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="telefono">Retorno</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="date" ng-model="toursArr.retorno" class="form-control" name="retorno" id="retorno">
		            </div>
		        </div>

		        <div class="campo row">
		            <div class="textoLabel col-md-12">
		                <label for="imgTour">Imagen tour</label>
		            </div>
		            <div class="textoInput col-md-12">
		                <input type="text" ng-model="toursArr.imgTour" class="form-control" name="imgTour" id="imgTour">
		            </div>
		        </div>

				<div class="row">
					<div class="col col-md-12" style="text-align: center;margin-top: 10px;">
						<button class="btn btn-info" ng-click="addTour()">Crear</button>
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
				<button style="margin-left: 20px" class="btn btn-info" data-toggle="modal" data-target="#myModal">Nuevo</button>
			</div>

			<table id="tablaEdit" style="margin-top: 50px;margin-bottom: 50px" class="table table-bordered table-striped">
				<tr>
					<th style="display: none">Id</th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Descripción</th>
					<th>Cupo Máximo</th>
					<th>Salida</th>
					<th>Retorno</th>
					<th>imgTour</th>
				</tr>
				
				<tr ng-repeat="t in tours | filter:buscar track by $index">
					<td style="display: none">[[ t.id ]]</td>
					<td>[[ t.nombre]]</td>
					<td>[[ t.tipo ]]</td>
					<td>[[ t.descripcion ]]</td>
					<td>[[ t.cupoMax ]]</td>
					<td>[[ t.fechaHoraSalida ]]</td>
					<td>[[ t.fechaHoraRetorno ]]</td>
					<td>[[ t.imgTour ]]</td>
					<td>
						<button class="btn btn-warning" ng-click="editTourTmp(t.id)" style="color:white" data-toggle="modal" data-target="#myModalEdit">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</button>
					</td>
					<td>
						<button class="btn btn-danger" ng-click="delTour(t.id)" style="color:white">
							<i class="fa fa-trash" aria-hidden="true"></i>
						</button>
					</td>
				</tr>

			</table>
		</div>
	</div>

@stop