<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="favicon.png" type="image/x-icon">
		<title>Portfolio - Jhoseph</title>
		<!-- Latest compiled and minified CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

		<!-- Optional theme -->
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/fonts.css">
		<link rel="stylesheet" href="css/offcanvas.css">
		<link rel="stylesheet" href="css/myCSS.css">
	</head>

	<body class="fondo">
		<div class="container-fluid">

			<div><!--Navbar -->   
				<br>
				<ul class="nav nav-tabs">
					<li role="presentation"><a href="index.php">Inicio</a></li>
					<li role="presentation"><a href="blog.php">Blog</a></li>
					<li role="presentation"><a href="cv.php">CV</a></li>
					<li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Proyectos</a></li>
					<li role="presentation"><a href="contac.php">Contacto</a></li>
				</ul>
			</div><!--end Navbar -->   
			<br>
			<div class="container-fluid">
				
				<div class="row row-offcanvas row-offcanvas-right">
					
					<div class="container-fluid" >
						
						<p class="pull-right visible-xs">
							<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
						</p>
						
						<div class="jumbotron" id="jumbtronProyectos">
							<h1 class="titulo" id="titulo-sombra">Mis proyectos!</h1>
								<p  id="titulo-sombra">Espacio dedicado para mostrar algunos de mis proyectos.</p>
							</div>
						</div><!--/jumbotron-->

						<div class="row" >
							
							<div class="col-md-4">
								<h3 style="text-align: center">Juego de las naves HTML5</h3>
								<p>
									Juego desarrollado en HTML5, CSS3 y javascript
									con el uso de canvas  
								</p>
								<div style="text-align: center">
									<a href="naves.php"><img src="img/naves.jpg" class="imgProyect"></a>
								</div>
								</div>
							
							<div class="col-md-4">
								<h3 style="text-align: center">TPV Tienda Stitch</h3>
								<p>
									Aplicación de tipo punto de venta, dedicada a llevar el registro
									de una tienda de alimentos. VB6
								</p>
								<div style="text-align: center">
									<a href="#">
										<img src="img/tpv/1.jpg" class="imgProyect" data-toggle="modal" data-target="#myModal">
									</a>
									<!-- Modal de galeria -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Tpv Stitch</h4>
												</div>
												<div class="modal-body">
													<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
														<!-- Indicators -->
														<ol class="carousel-indicators">
															<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
															<li data-target="#carousel-example-generic" data-slide-to="1"></li>
															<li data-target="#carousel-example-generic" data-slide-to="2"></li>
															<li data-target="#carousel-example-generic" data-slide-to="3"></li>
														</ol>

														<!-- Wrapper for slides -->
														<div class="carousel-inner" role="listbox">
															<div class="item active">
																<img src="img/tpv/1.jpg">
															</div>
															<div class="item">
																<img src="img/tpv/2.jpg">
															</div>
															<div class="item">
																<img src="img/tpv/3.jpg">
															</div>
															<div class="item">
																<img src="img/tpv/4.jpg">
															</div>
														</div>

														<!-- Controls -->
														<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
															<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
															<span class="sr-only">Previous</span>
														</a>
														<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
															<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
															<span class="sr-only">Next</span>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>									 									 
							<div class="col-md-4">
								
							</div>									 									 
						</div>
						
					</div><!--container-fluid-->

				</div><!--/row-->
			<hr>


			</div><!--/.container fluid-->
<br><br>
    <footer class="footer">
          <div class="container">
            <p class="text-muted" align="right"><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> Jhoseph Stanly Arango Garcia - 2015.</p>
          </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>