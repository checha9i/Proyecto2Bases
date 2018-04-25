<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tipos</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		body {
			width: 600px;
			margin: 50px auto;
		}
		.badge {
			float: right;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<h1>Administrar Tipo de Etapa</h1>
        		</ul>
        	</div>
        </div>
    </nav>
	@if ( $etapa == 'P' )
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Pausa</h4>
			</div>
			<div class="panel-body">
				<form method="get" action="/AgregarPausa">
				<table class="table">
					<thead>
						<tr>
							<th>Tiempo de Espera</th>
							<th>Valor</th>
							<th>Siguiente Etapa a Agregar</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td>
									<select name="SelectTipoTiempo" id="SelectTipoTiempo">
											<option value="">Elija Tipo de Espera</option>
											<option value="F">Fecha</option>
											<option value="T">Tiempo</option>
									</select>
								</td>
								<td>
									<input type="text" name="valor" id="valor" placeholder="valor" class="form-control" required>
								</td>
								<td>
									<select name="etapa" id="etapa">
										<option value="">Elija la siguiente etapa Etapa</option>
										<option value="P">Pausa</option>
										<option value="I">Integracion</option>
										<option value="E">Etapa configurable</option>
									</select>
								</td>
							</tr>
					</tbody>
				</table>
				<center>
					<input type="submit" value="Agregar Etapa" class="btn btn-success">
				</center>
				</form>
				<center>
					<a href="/ConfigurarEtapas"><span class="label label-info">Configurar Etapas</span></a>
					<a href="/Usuarios"><span class="label label-danger">Salir</span></a>
				</center>
			</div>
		</div>
	@elseif ( $etapa == 'I' )
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Integracion</h4>
			</div>
			<div class="panel-body">
				<form method="get" action="/AgregarIntegracion">
				<table class="table">
					<thead>
						<tr>
							<th>Siguiente Etapa a Agregar</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td>
									<select name="etapa" id="etapa">
										<option value="">Elija la siguiente etapa Etapa</option>
										<option value="P">Pausa</option>
										<option value="I">Integracion</option>
										<option value="E">Etapa configurable</option>
									</select>
								</td>
							</tr>
					</tbody>
				</table>
				<center>
					<input type="submit" value="Agregar Etapa" class="btn btn-success">
				</center>
				</form>
				<center>
					<a href="/ConfigurarEtapas"><span class="label label-info">Configurar Etapas</span></a>
					<a href="/CrearProceso"><span class="label label-danger">Salir</span></a>
				</center>
			</div>
		</div>
	@elseif ( $etapa == 'E' )
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Etapa</h4>
			</div>
			<div class="panel-body">
				<form method="get" action="/AgregarEtapa">
				<table class="table">
					<thead>
						<tr>
							<th>Nombre de Etapa</th>
							<th>Usuario Encargado</th>
							<th>Siguiente Etapa a Agregar</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td>
									<input type="text" name="nombre" id="nombre" placeholder="nombre" class="form-control" required>
								</td>
								<td>
									<select name="SelectUsuario" id="SelectUsuario">
											<option value="">Elija Usuario</option>
											@foreach($users as $user)
													<option value="{{ $user->idusuario }}">{{ $user->nombre}} {{ $user->apellido}} </option>
											@endforeach
									</select>
								</td>
								<td>
									<select name="etapa" id="etapa">
										<option value="">Elija la siguiente etapa Etapa</option>
										<option value="P">Pausa</option>
										<option value="I">Integracion</option>
										<option value="E">Etapa configurable</option>
									</select>
								</td>
							</tr>
					</tbody>
				</table>
				<center>
					<input type="submit" value="Agregar Etapa" class="btn btn-success">
				</center>
				</form>
				<center>
					<a href="/ConfigurarEtapas"><span class="label label-info">Configurar Etapas</span></a>
					<a href="/CrearProceso"><span class="label label-danger">Salir</span></a>
				</center>
			</div>
		</div>
	@endif
</body>
</html>
