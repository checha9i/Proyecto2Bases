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
        </div>
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
