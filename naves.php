<!DOCTYPE html>
<html lang="es">
	<head>
		
		<meta charset="UTF-8">
		<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/myCSS.css">
		<title>Juego con HTML5</title>

	</head>
	<body class="backBody">
		
		<div class="container-fluid">
			<div style="text-align:center">
				<div style="text-align: left">
					<br>
					<a href="Proyectos.php"><button class="btn btn-warning"><span class="glyphicon glyphicon-hand-left"></span> Volver</button></a>
				</div>
				<h1 class="titulo">Juego de las naves</h1>
				<canvas class="myCanvas" id="game" width="800" height="400"></canvas>
			</div>
		</div>
		
		<br><br><br>
		
		<footer class="footer">
			<div class="container">
				<p class="text-muted" align="right"><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> Jhoseph Stanly Arango Garcia - 2015.</p>
			</div>
		</footer>
		
		<!-- Javascript -->
		<script src="js/preloadjs-0.1.0.min.js"></script>
		<script type="text/javascript" src="js/naves.js"></script>
	</body>
</html>