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
        <link href="<?php echo base_url()?>/resources/css/jquery.bxslider.css" rel="stylesheet" type="text/css" />


		<script src="<?php echo base_url()?>/resources/js/jquery-1.11.3.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>/resources/bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>/resources/js/tether.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>/resources/js/jquery.dataTables.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>/resources/js/jqueryui/jquery-ui.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/jquery.bxslider.js" type="text/javascript"></script>

		<script type="text/javascript">		
		$(document).ready(function() {
            $('#noticias').bxSlider({
                slideWidth: 560,
                minSlides: 3,
                maxSlides: 3,
                moveSlides: 3,
                slideMargin: 10,
                ticker: false,
            });
		});
		</script>

		<style>
            .carousel-caption {padding: 0px;}
            .fleft { float: left; }
            .fright { float: right; }
            .marginR20 { margin-right: 20px; }
            .lineH50 { line-height: 50px; }
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
					<div><img src="<?php echo base_url() ?>resources/images/logo.jpg" width="150" height="50" /></div>
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

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom: 30px">
	<!-- Indicators -->
	<ol class="carousel-indicators" style="bottom: 0px;">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="<?php echo base_url()?>resources/4.jpg" alt="uno">
            <div class="container">
                <div class="carousel-caption">
                    <h1 style="margin: 0px;">Titulo</h1>
                    <p>Pequeña descripcion del banner</p>
                    <p><a class="btn btn-sm btn-primary" href="#" role="button">ver mas</a></p>
                </div>
            </div>
        </div>
		<div class="item">
			<img class="second-slide" src="<?php echo base_url()?>resources/3.jpg" alt="dos">
			<div class="container">
				<div class="carousel-caption">
                    <h1 style="margin: 0px;">Titulo</h1>
                    <p>Pequeña descripcion del banner</p>
					<p><a class="btn btn-sm btn-primary" href="#" role="button">Learn more</a></p>
				</div>
			</div>
		</div>
		<div class="item">
			<img class="third-slide" src="<?php echo base_url()?>resources/2.jpg" alt="3">
			<div class="container">
				<div class="carousel-caption">
                    <h1 style="margin: 0px;">Titulo</h1>
                    <p>Pequeña descripcion del banner</p>
					<p><a class="btn btn-sm btn-primary" href="#" role="button">Browse gallery</a></p>
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
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="fleft marginR20"><img src="<?php echo base_url()?>resources/images/download.png" width="50" height="50"/></div>
            <div class="fleft"><p class="lineH50">Descargar la aplicación de cortazar</p></div>
            <div class="fright"><button class="btn btn-default" type="button">Descargar</button></div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <p><h2 class="text-center">Noticias</h2></p>
            <div id="noticias">
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
                <div class="slide"><img src="http://placehold.it/560x300&text=FooBar1"></div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div style="width: 100%; text-align: center;" class="clearfix">
                <a href="#">Terminos y condiciones</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">Giros</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">Estadisticas</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">Directorio</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">Contactanos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#">Politicas de privacidad</a>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div style="width: 100%; height: 60px; line-height: 60px; background: silver;">
                copyright
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Siguenos:  Facebook    twitter    google
            </div>
        </div>
    </div>
</div>

</body>
</html>
meridian_ozero hotmail
conbustion
