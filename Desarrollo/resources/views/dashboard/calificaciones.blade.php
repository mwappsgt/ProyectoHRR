@extends("layouts.platta")

@section("titulo")

	<p class="col-md-2 tituloDash">Calificaciones</p>

@stop


@section("content")

	<div class="cuadroGeneralEmpleados row">

		<div ng-repeat="t in [1,2,3,4,5,6,7,8]" class="cuadroEmpleados col col-sm-4 col-md-4 col-lg-4">
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



@stop