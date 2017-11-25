

<div class="navbarMenuPrincipal">
	<div class="row">
		<span class="col-xs-10 col-sm-10 col-md-8"></span>
		<div class="col-xs-1 col-sm-1 col-md-2">
			<div class="dropdown">
			  <button class="btn btn-default" type="button" data-toggle="dropdown">
			  	<i class="fa fa-bars" aria-hidden="true"></i>
			  </button>
			  <ul class="dropdown-menu">
			    <li><p class="elemListaText">HTML</p></li>
			    <li><p class="elemListaText">CSS</p></li>
			    <li><p class="elemListaText">JavaScript</p></li>
			  </ul>
			</div>
		</div>
	</div>
</div>

<div class="menuDesk">
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

	<!-- <div ng-click="listaClick('configuracion')" ng-class="getClassTexto('/configuracion')">
		<div class="elemListaIcon col-md-2">
			<i class="fa fa-sliders" aria-hidden="true"></i>
		</div>
		<div class="elemListaText col-md-8">
			<p>Configuración</p>
		</div>
		
		<div ng-class="getClass('/configuracion')">
		</div>

	</div> -->


	<div ng-click="listaClick('reservaciones')" ng-class="getClassTexto('/reservaciones')">
		<div class="elemListaIcon col-md-2">
			<i class="fa fa-list" aria-hidden="true"></i>
		</div>
		<div class="elemListaText col-md-8">
			<p>Reservaciones</p>
		</div>

		<div ng-class="getClass('/reservaciones')">
		</div>

	</div>


	<div ng-click="listaClick('habitaciones')" ng-class="getClassTexto('/habitaciones')">
		<div class="elemListaIcon col-md-2">
			<i class="fa fa-university" aria-hidden="true"></i>
		</div>
		<div class="elemListaText col-md-8">
			<p>Habitaciones</p>
		</div>

		<div ng-class="getClass('/habitaciones')">
		</div>

	</div>

	<div ng-click="listaClick('tours')" ng-class="getClassTexto('/tours')">
		<div class="elemListaIcon col-md-2">
			<i class="fa fa-plane" aria-hidden="true"></i>
		</div>
		<div class="elemListaText col-md-8">
			<p>Tours</p>
		</div>

		<div ng-class="getClass('/tours')">
		</div>

	</div>


	<div ng-click="listaClick('calificaciones')" ng-class="getClassTexto('/calificaciones')">
		<div class="elemListaIcon col-md-2">
			<i class="fa fa-check-square" aria-hidden="true"></i>
		</div>
		<div class="elemListaText col-md-8">
			<p>Calificaciones</p>
		</div>

		<div ng-class="getClass('/calificaciones')">
		</div>

	</div>


	<div ng-click="listaClick('notificaciones')" ng-class="getClassTexto('/notificaciones')">
		<div class="elemListaIcon col-md-2">
			<i class="fa fa-envelope-o" aria-hidden="true"></i>
		</div>
		<div class="elemListaText col-md-8">
			<p>Notificaciones</p>
		</div>

		<div ng-class="getClass('/notificaciones')">
		</div>

	</div>


	<div ng-click="listaClick('galeria')" ng-class="getClassTexto('/galeria')">
		<div class="elemListaIcon col-md-2">
			<i class="fa fa-picture-o" aria-hidden="true"></i>
		</div>
		<div class="elemListaText col-md-8">
			<p>Galería</p>
		</div>

		<div ng-class="getClass('/galeria')">
		</div>

	</div>


	<div ng-click="listaClick('empleados')" ng-class="getClassTexto('/empleados')">
		<div class="elemListaIcon col-md-2">
			<i class="fa fa-user-circle-o" aria-hidden="true"></i>
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