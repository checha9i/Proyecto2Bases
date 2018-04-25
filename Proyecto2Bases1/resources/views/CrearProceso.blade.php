<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Creacion Proceso</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		body {
			width: 450px;
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
        			<h1>Creacion de Proceso</h1>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo Proceso</h4>
  		</div>

  		<div class="panel-body">
  			<form method="get" action="/CrearProceso">
				<p>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control" required>
				</p>
				<p>
					<input type="text" name="fecha_creacion" id="fecha_creacion" placeholder="fecha Creacion yyyy/mm/dd" class="form-control" required>
				</p>
				<p>
					<input type="text" name="fecha_vigencia_inicio" id="fecha_vigencia_inicio" placeholder="fecha Vigencia inicio yyyy/mm/dd" class="form-control" required>
				</p>
				<p>
					<input type="text" name="fecha_vigencia_fin" id="fecha_vigencia_fin" placeholder="fecha Vigencia fin yyyy/mm/dd" class="form-control" required>
				</p>
				<p>
					<input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control" required>
				</p>
				<p>
					<select name="tipo" id="tipo">
						<option value="">Elija Tipo de Proceso</option>
						<option value="A">Actividades</option>
						<option value="D">Documentos</option>
					</select>
				</p>
				<p>
					<select name="etapa" id="etapa">
						<option value="">Elija la primer Etapa</option>
						<option value="P">Pausa</option>
						<option value="I">Integracion</option>
						<option value="E">Etapa configurable</option>
					</select>
				</p>
				<p>
					<select name="depto" id="depto">
						<option value="">Elija Departamento</option>
						<option value="Produccion">Produccion</option>
						<option value="Fabricacion">Fabricacion</option>
					</select>
				</p>
				<p>
					<input type="submit" value="Crear" class="btn btn-success">
				</p>
			</form>
		</div>
	</div>
</body>
</html>