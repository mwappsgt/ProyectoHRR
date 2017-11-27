@extends("layouts.platta")

@section("titulo")

	<p class="col-md-2 tituloDash">Estadísticas</p>

@stop

@section("content")

	<div ng-controller="estadisticaController">
		
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-6">
				<canvas id="myChart"></canvas>
			</div>

			<div class="col-sm-6 col-md-6 col-lg-6">
				<canvas id="myChart2"></canvas>
			</div>

			<div class="col-sm-6 col-md-6 col-lg-6">
				<canvas id="myChart3"></canvas>
			</div>

			<div class="col-sm-6 col-md-6 col-lg-6">
				<canvas id="myChart4"></canvas>
			</div>
		</div>
		
	</div>

@stop