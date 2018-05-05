<?php
//Creando conexion
$permisos=DB::table('detalle_permiso')->where(['idusuario'=>Session::get('User')])->get();
$nonotificiones=DB::table('notificacion')->where(['idusuario'=>Session::get('User')])->count();
$notificaciones=DB::table('notificacion')->where(['idusuario'=>Session::get('User')])->get();

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El Horno Magico</title>
  <meta name="description" content="El Horno Magico">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/flag-icon.min.css">
  <link rel="stylesheet" href="css/cs-skin-elastic.css">
  <!-- <link rel="stylesheet" href="css/bootstrap-select.less"> -->
  <link rel="stylesheet" href="scss/style.css">
  <link href="css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link href="bootstrap/css/loginregister.css" rel="stylesheet">
  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body >


  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
      </div>

      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav" name="listapermisos" id="listapermisos">
          <li class="active">
            <a href="/Usuarios"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
          </li>
          <h3 class="menu-title">Usuario</h3><!-- /.menu-title -->
          <li class="menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Condiciones</a>
              <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-plus"></i><a href="/AddCondicion">Agregar Condicion</a></li>
                <li><i class="fa fa-edit"></i><a href="/ModifyCondicion">Modificar Condicion</a></li>
                <li><i class="fa fa-minus"></i><a href="/DropCondicion">Eliminar Condicion</a></li>
              </ul>
          </li>

          @foreach($permisos as $u)

          <?php if ($u->permiso==1): ?>
            <li class="menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Nivel permiso 1</a>
              <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-area-chart"></i><a href="/Reporte1">Reporte 1</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte2">Reporte 2</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte3">Reporte 3</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte4">Reporte 4</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte5">Reporte 5</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte6">Reporte 6</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte7">Reporte 7</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte8">Reporte 8</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte9">Reporte 9</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte10">Reporte 10</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte11">Reporte 11</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte12">Reporte 12</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte13">Reporte 13</a></li>
                <li><i class="fa fa-area-chart"></i><a href="/Reporte14">Reporte 14</a></li>

              </ul>
            </li>
          <?php elseif ($u->permiso==2): ?>
            <li class="menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Nivel permiso 2</a>
              <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-plus"></i><a href="/CrearProceso">Crear Proceso</a></li>

              </ul>
            </li>
          <?php elseif ($u->permiso==3): ?>
        <?php Session::put('boolnotificacion',1) ?>

          <?php elseif ($u->permiso==5): ?>
            <li class="menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Nivel permiso 3</a>
              <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-plus"></i><a href="/AddGestion">Crear Gestion</a></li>

              </ul>
            </li>



          <?php elseif ($u->permiso==6): ?>
            <li class="menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Nivel permiso 6</a>
              <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-plus"></i><a href="/DropGestion">Eliminar Gestion</a></li>

              </ul>
            </li>

          <?php elseif ($u->permiso==7): ?>
            <li class="menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Nivel permiso 7</a>
              <ul class="sub-menu children dropdown-menu">
              <li><i class="fa fa-plus"></i><a href="/ModifyProcess">Modificar Proceso</a></li>

              </ul>
            </li>

          <?php elseif ($u->permiso==8): ?>
            <li class="menu-item-has-children dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Nivel permiso 8</a>
              <ul class="sub-menu children dropdown-menu">
                <li><i class="fa fa-minus"></i><a href="/DropProcess">Eliminar Proceso</a></li>

              </ul>
            </li>

          <?php endif; ?>


          @endforeach
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
  </aside><!-- /#left-panel -->

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

      <div class="header-menu">

        <div class="col-sm-7">
          <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
          <div class="header-left">

            <?php if (Session::get('boolnotificacion')==1 ): ?>
              <div class="dropdown for-notification">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bell"></i>
                  <span class="count bg-success">{{$nonotificiones}}</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="notification">
                  <p class="red">Tienes {{$nonotificiones}} notificaciones</p>
              @foreach($notificaciones as $u)


              <?php
              $procesonot=DB::table('proceso')->where(['idproceso'=>$u->idproceso])->get()
              ?>


                  <a class="dropdown-item media bg-flat-color-1" href="/mostrarnotificacion/{{$u->idgestion}}">
                    <i class="fa fa-check"></i>
                  <?php if ($procesonot[0]->tipo=='A'): ?>
                    <?php $nombrenotpro=DB::select('select nombre from gestion g, actividad a where g.idactivdiad = a.idactivdiad') ?>
                  <p>{{$procesonot[0]->nombre}}-{{$nombrenotpro[0]->nombre}}</p>
                  <?php else: ?>
                    <?php $nombrenotpro=DB::select('select nombre from gestion g, documento a where g.iddocumento = a.iddocumento') ?>
                  <p>{{$procesonot[0]->nombre}}-{{$nombrenotpro[0]->nombre}}</p>

                  <?php endif; ?>


                  </a>
              @endforeach
                </div>
              </div>
            <?php endif; ?>



          </div>
        </div>

        <div class="col-sm-5">
          <div class="user-area dropdown float-right">
          <a class="nav-link" href="/"><i class="menu-icon fa fa-power-off"></i>Logout</a>


          </div>



        </div>
      </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Usuario</h1>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li class="active">User</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div  id="contenido" name="contenido" class="content mt-3">

      <form action="/consulta12" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <input type="text"  class="form-control" name="Valor" value="Valor" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Valor';}" >
        </div>
        <div class="form-group">
          <input type="text"  class="form-control" name="Valor2" value="Valor" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Valor';}" >
        </div>
        <div class="form-group">
          <div class="submit">
            <input class="register-link m-t-15 text-center" type="submit" onclick="myFunction()" value="Enviar" >
          </div>
        </div>
      </form>


    </div> <!-- .content -->
  </div><!-- /#right-panel -->

  <!-- Right Panel -->

  <script src="js/vendor/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>


  <script src="js/lib/chart-js/Chart.bundle.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/widgets.js"></script>
  <script src="js/lib/vector-map/jquery.vmap.js"></script>
  <script src="js/lib/vector-map/jquery.vmap.min.js"></script>
  <script src="js/lib/vector-map/jquery.vmap.sampledata.js"></script>
  <script src="js/lib/vector-map/country/jquery.vmap.world.js"></script>
  <script>
  ( function ( $ ): ?>
  "use strict";

  jQuery( '#vmap' ).vectorMap( {
    map: 'world_en',
    backgroundColor: null,
    color: '#ffffff',
    hoverOpacity: 0.7,
    selectedColor: '#1de9b6',
    enableZoom: true,
    showTooltip: true,
    values: sample_data,
    scaleColors: [ '#1de9b6', '#03a9f5' ],
    normalizeFunction: 'polynomial'
  } );
} )( jQuery );
</script>

</body>
</html>
