<div ng-controller="controladorContacto">


	<form action="en/s.php" method="post">

		<div class="campo row" style="margin-top:5px">
			<div class="textoLabel col-md-2">
				<label for="nombre">Nombre:</label>
			</div>
			<div class="textoInput col-md-8">
				<input type="text" ng-control="nombre" class="form-control" name="nombre" id="nombre">
			</div>
		</div>

		
		<div class="campo row" style="margin-top:5px">
			<div class="textoLabel col-md-2">
				<label for="email">Email:</label>
			</div>
			<div class="textoInput col-md-8">
				<input type="text" ng-control="email" class="form-control" name="email" id="email">
			</div>
		</div>


		<div class="campo row" style="margin-top:5px">
			<div class="textoLabel col-md-2">
				<label for="telefono">Teléfono:</label>
			</div>
			<div class="textoInput col-md-8">
				<input type="text" ng-control="telefono" class="form-control" name="telefono" id="telefono">
			</div>
		</div>


		<div class="campo row" style="margin-top:5px">
			<div class="textoLabel col-md-2">
				<label for="mensaje">Mensaje:</label>
			</div>
			<div class="textoInput col-md-8">
				<textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="10" ng-control="mensaje"></textarea>
			</div>
		</div>


		<div class="campo row" style="margin-top:5px">
			<div class="campoBoton col-md-12" style="text-align: center">
				<button class="botonEnviar btn btn-default">Enviar</button>
			</div>
		</div>

	</form>

</div>