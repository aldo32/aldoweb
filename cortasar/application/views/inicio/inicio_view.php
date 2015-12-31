<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<title>Cortasar - Inicio</title>

        <?php echo $includes ?>

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
<body>

<?php echo $header; ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom: 30px">
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
                <?php
                if (isset($noticias)) {
                    foreach ($noticias AS $row) {
                        if ($row->archivo != "") {
                            ?>
                            <a href="<?php echo base_url("noticias/".$row->id) ?>"><div class="slide"><img src="<?php echo URL_CMS.$row->archivo ?>"><?php echo $row->titulo ?></div></a>
                            <?php
                        }
                        else {
                            ?>
                            <a href="<?php echo base_url("noticias/".$row->id) ?>"><div class="slide"><img src="<?php echo base_url() ?>resources/images/default.png" alt=""><?php echo $row->titulo ?></div></a>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php echo $footer; ?>

</div>

</body>
</html>