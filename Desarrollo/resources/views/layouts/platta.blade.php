<!DOCTYPE html>
<html lang="en" ng-app="app">

<head>

	@include('includes.head')

</head>

<body ng-controller="controlador">

	<div>
		<div id="menuLeft" class="menuPrincipal col-md-2">
			
			<div class="row" id="TopMenuLeft">
				<div class="col-md-12">
				<img src="img/rioreup.png" class="imgLogo" alt="">
				</div>
			</div>
			<div>
				<div ng-click="listaClick('inicioDash')" ng-class="getClassTexto('/inicioDash')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-play" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-7">
						<p>Inicio</p>
					</div>

					<div ng-class="getClass('/inicioDash')">
					</div>

				</div>
				
				<div ng-click="listaClick('reservaciones')" ng-class="getClassTexto('/reservaciones')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-sliders" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-8">
						<p>Reservaciones</p>
					</div>
					
					<div ng-class="getClass('/reservaciones')">
					</div>

				</div>

				<div ng-click="listaClick('habitaciones')" ng-class="getClassTexto('/habitaciones')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-building" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-8">
						<p>Habitaciones</p>
					</div>
					
					<div ng-class="getClass('/habitaciones')">
					</div>

				</div>
	
				<div ng-click="listaClick('tours')" ng-class="getClassTexto('/tours')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-tree" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-8">
						<p>Tours</p>
					</div>

					<div ng-class="getClass('/tours')">
					</div>

				</div>

				<!-- <i class="fa fa-check" aria-hidden="true"></i> -->
				<div ng-click="listaClick('empleados')" ng-class="getClassTexto('/empleados')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-male" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-8">
						<p>Empleados</p>
					</div>

					<div ng-class="getClass('/empleados')">
					</div>

				</div>

				<div ng-click="listaClick('estadisticas')" ng-class="getClassTexto('/estadisticas')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-line-chart" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-8">
						<p>Estadísticas</p>
					</div>

					<div ng-class="getClass('/estadisticas')">
					</div>

				</div>

				<div ng-click="listaClick('pagos')" ng-class="getClassTexto('/pagos')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-money" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-8">
						<p>Pagos</p>
					</div>

					<div ng-class="getClass('/pagos')">
					</div>

				</div>

				<div ng-click="listaClick('roles')" ng-class="getClassTexto('/roles')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-bell-o" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-8">
						<p>Roles</p>
					</div>

					<div ng-class="getClass('/roles')">
					</div>

				</div>

				<div ng-click="listaClick('usuarios')" ng-class="getClassTexto('/usuarios')">
					<div class="elemListaIcon col-md-2">
						<i class="fa fa-users" aria-hidden="true"></i>
					</div>
					<div class="elemListaText col-md-8">
						<p>Usuarios</p>
					</div>

					<div ng-class="getClass('/usuarios')">
					</div>

				</div>

				
			</div>

		</div>
	</div>

	
	<div class="encabezado row">
	
		<span class="col-md-2"></span>
		<p class="col-md-3 tituloDash">Dashboard</p>
		
		<div class="col-md-5 tituloDash" style="text-align: right;">
			<i class="fa fa-user" aria-hidden="true"></i>
			Usuario
			<i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
		</div>
	
	</div>
	

 	<div class="row contenidoGeneral">
 		<div class="col-md-2"></div>
		<div class="col-md-9 contenido">
			@yield('content')
		</div>		
 	</div>
	

	@include('includes.scripts')

	
</body>

</html>