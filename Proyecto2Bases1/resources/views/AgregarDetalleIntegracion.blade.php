<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Integracion</title>
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
        			<h1>Administrar Integracion</h1>
        		</ul>
        	</div>
        </div>
    </nav>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Integracion</h4>
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th>Nombre Proceso</th>
							<th>Opcion</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							@if ($user->idproceso != Session::get('NumProceso'))
							<tr>
								<td>{{ $user->nombre }}</td>
								<td>
									<a href="{{url('/AgregarDetalleIntegracion',$user->idproceso)}}"><span class="label label-success">Agregar</span></a>
								</td>
							</tr>
							@endif
						@endforeach
					</tbody>
				</table>
				<center>			
					<a href="/ConfigurarEtapas"><span class="label label-info">Configurar Etapas</span></a>
				</center>		
			</div>
		</div>
</body>
</html>
