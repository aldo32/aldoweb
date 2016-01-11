<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<title>Cortazar - Inicio</title>

        <?php echo $includes ?>

		<script type="text/javascript">		
		$(document).ready(function() {
            $('#noticias').bxSlider({
                slideWidth: 560,
                minSlides: 4,
                maxSlides: 4,
                moveSlides: 4,
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
            .slide p { font-size: 12px; font-weight: bold; }
            #news-title { background: #222; padding: 3px; color: #FFFFFF; font-weight: bold; margin-bottom: 15px; }

            #app-wrap { background: url("resources/images/back_app.jpg") #222 repeat-x; height: 233px; }
            #app-content { width: 750px; margin: 0 auto; margin-top: 30px; position: relative; }

            .button-general { width: 130px; height: 29px; color: #000000; font-weight: bold; padding: 3px; background: url("resources/images/bg-button.png"); }
            #download-app-content { position: absolute; top: 100px; left: 570px; }

            #app-img { width: 1038px; margin: 0 auto; position: relative; }
            #app-img-text { width: 400px; position: absolute; top: 350px; left: 610px; font-weight: bold; }
		</style>
	</head>
<body>

<?php echo $header; ?>

<div id="myCarousel" class="carousel slide clearfix" data-ride="carousel" style="width: 80%; margin: 0 auto; margin-bottom: 30px; margin-top: 30px;">
	<!-- Indicators -->
	<ol class="carousel-indicators" style="bottom: 0px;">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
        <?php
        if (isset($banners)) {
            $i=0;
            foreach ($banners as $row) {
                ?>
                <div class="item <?php echo ($i == 0) ? "active" : ""; ?>">
                    <img class="first-slide" src="<?php echo URL_CMS.$row->archivo?>" alt="<?php echo $row->titulo ?>">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 style="margin: 0px;"><?php echo $row->titulo ?></h1>
                            <p><?php echo $row->autor." [".$row->creado."]" ?></p>
                            <p><a class="btn btn-sm btn-primary" href="<?php echo base_url("noticias/".$row->id)?>" role="button">ver mas</a></p>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
        }
        ?>
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Anterior</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Siguiente</span>
	</a>
</div>

<div class="container-fluid">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-12" id="news-title">Noticias más recientes</div>
            <div id="noticias">
                <?php
                if (isset($noticias)) {
                    foreach ($noticias AS $row) {
                        if ($row->archivo != "") {
                            ?>
                            <a href="<?php echo base_url("noticias/".$row->id) ?>"><div class="slide"><img src="<?php echo URL_CMS.$row->archivo ?>"><p><?php echo $row->titulo ?></p></div></a>
                            <?php
                        }
                        else {
                            ?>
                            <a href="<?php echo base_url("noticias/".$row->id) ?>"><div class="slide"><img src="<?php echo base_url() ?>resources/images/default.png" alt=""><p><?php echo $row->titulo ?></p></div></a>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row" id="app-wrap">
        <div id="app-content" class="clearfix">
            <img src="<?php echo base_url() ?>resources/images/content_app.png" width="700" height="165" />

            <div id="download-app-content">
                <input type="button" name="download-app" id="download-app" class="button-general" value="DESCARGAR" />
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row" id="app-img">
        <img src="<?php echo base_url() ?>resources/images/bg-app.png" width="1038" height="721" />
        <div id="app-img-text">
            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta)
            Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta)
        </div>
    </div>
</div>

<?php echo $footer; ?>

</body>
</html>