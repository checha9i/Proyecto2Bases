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
        			<h1>Administrar Condicion</h1>
        		</ul>
        	</div>
        </div>
    </nav>
	<div class="panel panel-info">
		<div class="panel-body">	
			<form method="get" action="/AgregarCondicion/{{$id}}">
			<table class="table">
				<thead>
					<tr>
						@if( $Letra == 'E')
							<th>Condicion</th>
						@endif
						<th>Siguiente Etapa</th>
					</tr>
				</thead>
				<tbody>
						<tr>
							@if( $Letra == 'E')
								<td>
									<select name="SelectCondicion" id="SelectCondicion">
											<option value="">Elija Condicion</option>											
											@foreach($Condiciones as $user)
													<option value="{{ $user->condicion }}">{{ $user->condicion}} </option>
											@endforeach																			
									</select>														
								</td>
							@endif
							<td>
								<input type="text" name="SiguienteEtapa" id="SiguienteEtapa" placeholder="Numero Etapa" class="form-control" required>
							</td>
						</tr>
				</tbody>
			</table>
			<center>			
				<input type="submit" value="Agregar Condicion" class="btn btn-success">
			</center>
			</form>
			<center>			
				<a href="/ConfigurarEtapas"><span class="label label-danger">Regresar</span></a>
			</center>		
		</div>
	</div>
</body>
</html>
