<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<title>Cortasar - Inicio</title>

		<link href="<?php echo base_url()?>/resources/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>/resources/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>/resources/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>/resources/js/jqueryui/jquery-ui.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>/resources/css/carrusel.css" rel="stylesheet" type="text/css" />


		<script src="<?php echo base_url()?>/resources/js/jquery-1.11.3.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>/resources/bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>/resources/js/tether.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>/resources/js/jquery.dataTables.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>/resources/js/jqueryui/jquery-ui.js" type="text/javascript"></script>

		<script type="text/javascript">		
		$(document).ready(function() {

		});
		</script>

		<style>

		</style>
	</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="navbar-wrapper">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div><a class="navbar-brand" href="#">Cortazar</a></div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Antecedentes</a></li>
						<li><a href="#">Plan municipal</a></li>
						<li><a href="#">Por que invertir</a></li>
						<li><a href="#">Tramites y servicios</a></li>
						<li><a href="#">Consulta y recomendación</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>

<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Example headline.</h1>
					<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>Another example headline.</h1>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
			<div class="container">
				<div class="carousel-caption">
					<h1>One more for good measure.</h1>
					<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
					<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div><!-- /.carousel -->

</body>
</html>
