<<<<<<< HEAD
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('import_parse') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                                <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

                                <div class="col-md-6">
                                    <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                                    @if ($errors->has('csv_file'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="header" checked> File contains header row?
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Parse CSV
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
=======
<!DOCTYPE html>
<html lang="en">

  <head>


    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Proyecto2 Bases</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/half-slider.css" rel="stylesheet">
    <link href="bootstrap/css/loginregister.css" rel="stylesheet">

  </head>

  <body>
    <!-- Header -->
    			<header id="header">

            <a class="logo" href="./"><img src="images/logo.png" alt="Logo"></a>
    				<nav>
    					<a href="#menu">Menu</a>
    				</nav>
    			</header>

    		<!-- Nav -->
    			<nav id="menu">
    				<ul class="links">
    					<li><a href="/">Home</a></li>
    					<li><a href="/login">Login</a></li>
    					<li><a href="/register">Register</a></li>
    				</ul>
    			</nav>
		<div class="main">

        <div class="Login">
							<div class="Login-head">
						    	<h3>LOGIN</h3>
						 	</div>

              <form action="/loginme" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="ticker">
									<h4>Username</h4>
						  			<input type="text"  name="username" value="John Smith" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'John Smith';}" ><span> </span>
						  			<div class="clear"> </div>
						  		</div>
						  		<div>
						  		<h4>Password</h4>
								<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
								  			<div class="clear"> </div>
								</div>


									<input type="submit" class="submit-button" onclick="myFunction()" value="LOGIN" >


								</div>

						  </form>
					</div>
>>>>>>> master
        </div>
    </div>
@endsection