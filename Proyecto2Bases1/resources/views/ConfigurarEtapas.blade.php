<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Configurar Etapas</title>
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
  		<h1>Configurar Etapas</h1>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista de Etapas</h4>
  		</div>

  		<div class="panel-body">
    		<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Tipo Etapa</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->numeroetapa }}</td>
							<td>
								@if ( $user->tipoetapa == 'P' )
									Pausa
								@elseif ( $user->tipoetapa == 'I' )
									Integracion
								@elseif ( $user->tipoetapa == 'E' )
									Etapa Configurable
								@else
									Fin
								@endif
							</td>
							<td>
								@if ( $user->idestado == 1 )
									Creado
								@elseif ( $user->idestado == 2 )
									Iniciado
								@elseif ( $user->idestado == 3 )
									Pausado
								@elseif ( $user->idestado == 4 )
									Finalizado
								@elseif ( $user->idestado == 5 )
									Sin Finalizacion
								@elseif ( $user->idestado == 6 )
									Sin Configuracion
								@endif
							</td>
							<td>
								<a href="{{url('/AgregarCondicion',$user->idflujo)}}"><span class="label label-danger">Configurar Etapa</span></a>
								@if ( $user->tipoetapa == 'I' )
									<a href="{{url('/saber',$user->idintegracion)}}"><span class="label label-success">Administrar Integracion</span></a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<center>			
				<a href="/Usuarios"><span class="label label-danger">Salir</span></a>
			</center>
  		</div>
  	</div>
</body>
</html>