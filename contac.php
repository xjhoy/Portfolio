
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <link rel="icon" href="favicon.png" type="image/x-icon">
	<title>Portfolio - Jhoseph</title>
<!-- Latest compiled and minified CSS -->
		<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/myCSS.css" rel="stylesheet">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/fonts.css">


</head>

<body>

<div class="container-fluid">

<!--Navbar-->

<div>
<br>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="index.php">Inicio</a></li>
  <li role="presentation"><a href="blog.php">Blog</a></li>
  <li role="presentation"><a href="cv.php">CV</a></li>
  <li role="presentation"><a href="Proyectos.php">Proyectos</a></li>
  <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contacto</a></li>
</ul>
</div><!--End Navbar-->
<div class="container">
<h1 class="Bangers">INFORMACION DE CONTACTO</h1>
	<div class="oculto" id="oculto">
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong id="resultado"></strong>
		</div>
	</div>
<div class="row">
	
	<!-- INFORMACION DE CONTACTO -->
	<div class="col-md-6">

		<div class="framemap" id="map">

		</div>
		
		<!-- INFORMACION DE CONTACTO -->
		<div>
			<ul class="list-group">
			
				<li class="list-group-item list-group-item-warning">
					<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-user"></span> Nombre</h4>
						<p class="list-group-item-text">Jhoseph Stanly Arango Garcia</p> 
				</li>

				<li class="list-group-item list-group-item-danger">
						<h4 class="list-group-item-heading"><span class="glyphicon glyphicon-envelope"></span> Correo electronico</h4>
						<p class="list-group-item-text">Xjhoy@hotmail.com</p> 
				</li>
			
			</ul>
		</div>
		
	</div>
	
	<!-- FORMULARIO -->
	<div class="col-md-6">
		<div class="fondoFormulario">
			
		<form id="frmContacto" method="POST">
			<div style="text-align: center">
				<h3>Enviar un mensaje</h3>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Nombre(*)</label>
				<input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Su nombre">
			</div>
				
			<div class="form-group">
				<label for="exampleInputEmail1">Telefono(*)</label>
				<input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="654321987 o (+34)654321987">
			</div>
			
			<div class="form-group">
				<label for="exampleInputPassword1">Correo electronico</label>
				<input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="email@suempresa.com">
			</div>
			
				<div>
					<label>Mensaje</label>
					<textarea name="mensaje" class="form-control" rows="3"></textarea>
				</div>
			
			<br><br>
			<div style="text-align: right">	
				<!--
				<button type="submit" class="btn btn-primary" id="btn-enviar">Enviar <span class="glyphicon glyphicon-send"></span></button>
				-->
				<input type="button" id="btn-enviar" value="Enviar">
			</div>
				
			
		</form>  
		</div>


	</div>
</div>

</div><!--End container-->
</div><!-- End container-fluid-->
<br><br><br>
    <footer class="footer">
          <div class="container">
            <p class="text-muted" align="right"><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> Jhoseph Stanly Arango Garcia - 2015.</p>
          </div>
    </footer>
<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
	function initialize() {
		var mapCanvas = document.getElementById('map');
		var mapOptions = {
			center: new google.maps.LatLng(38.2665289,-0.6896822),
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(mapCanvas, mapOptions)
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>

	$(function(){
		$("#btn-enviar").click(function(){
			$("#oculto").removeClass("oculto");
			var url = "sendbymail.php";
			$.ajax({
				type:	"POST",
				url:	url,
				data:	$("#frmContacto").serialize(),
				success: function(data){
					$("#resultado").html(data);

				}
			});
			return false;
		});

	});
</script>

</body>
</html>
