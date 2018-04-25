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
    				<a href="/" class="logo"><strong>Proyecto 2</strong>  Procesos</a>
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
        </br>
        </br>
    </br>
		<div class="main">

            <div class="Regisration">
              <div class="Regisration-head">
                <h2><span></span>Register</h2>
             </div>
             <form action="/registerme" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="nombre" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" >
                <input type="text" name="apellido" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" >
                <input type="text" name="correo" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" >
              <input type="password" name="contrasena" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
              <input type="password" name="contrasena2" value=" Confirm Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = ' Confirm Password';}" >
               <div class="Remember-me">

              <div class="submit">
                <input type="submit" onclick="myFunction()" value="Registrar" >
              </div>
                <div class="clear"> </div>
              </div>

            </form>

      </div>
      </br>
      <!-- Footer -->
        <footer id="footer">
          <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
          </ul>
          <div class="copyright">
            &copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
          </div>
        </footer>

        <!-- Scripts -->
              <script src="bootstrap/js/jquery.min.js"></script>
              <script src="bootstrap/js/jquery.scrolly.min.js"></script>
              <script src="bootstrap/js/skel.min.js"></script>
              <script src="bootstrap/js/util.js"></script>
              <script src="bootstrap/js/main.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
