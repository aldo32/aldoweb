<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>resources/img/favicon.ico">

    <title>Test</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>resources/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/css/hexagons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/css/hover.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/nyroModal/styles/nyroModal.css">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:200" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url() ?>resources/js/jquery-3.1.1.js"></script>
    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script><!-- Tether for Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url() ?>resources/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>resources/nyroModal/js/jquery.nyroModal.custom.js"></script>

    <script>
        $(function() {
            $('.nyroModal').nyroModal({
                showCloseButton: false,
            });

            hex = $('.hex');
            for(var i = 0; i < hex.length; i = i + 1)
            {
                $(hex[i]).delay(50 * i).fadeIn();
            }

            $('.hvr-overline-from-left').mouseover(function() {
                porcent = $(this).attr('data-count');
                $(this).find("span").hide().html(porcent+"%").fadeIn();
            });
            $('.hvr-overline-from-left').mouseout(function() {
                porcent = $(this).attr('data-count');
                $(this).find("span").html("");
            });

            /*$('.hvr-overline-from-left').each(function(i) {
                porcent = $(this).attr('data-count');
                $(this).find("span").hide().html(porcent+"%").fadeIn();
            });*/

            $(window).scroll(function() {
                if ($(this).scrollTop() == 1415) {

                }
            });
        });
    </script>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="#about">Conocimientos</a></li>
                <li><a href="#contact">Acerca de mi</a></li>
                <li><a href="#contact">Contacto</a></li>
                <li><a href="#contact">Blog</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <i class="fa fa-facebook-square hvr-grow icon-social" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter-square hvr-grow icon-social" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-linkedin-square hvr-grow icon-social" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-centered text-center">
            <br><br>
            <img src="<?php echo base_url() ?>resources/img/logoaldo.png">
            <br><br>
            <p>
                <h1>Portafolio de trabajo</h1>
                ISC Aldo Marañon Andrade<br>
            </p>
        </div>
    </div>
</div>

<ul id="hexGrid">
    <li class="hex">
        <a class="hexIn nyroModal" href="<?php echo base_url("inicio/showProject/1") ?>">
            <img src="<?php echo base_url()?>resources/proyectos/azteca_movil_thumb.png" alt="Azteca movil" />
            <h1>Azteca movil</h1>
            <p>Portal web que con información acerca de las diferentes promociones que ofrecen</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm3.staticflickr.com/2827/10384422264_d9c7299146.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm8.staticflickr.com/7187/6895047173_d4b1a0d798.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm4.staticflickr.com/3766/12953056854_b8cdf14f21.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm7.staticflickr.com/6139/5986939269_10721b8017.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm4.staticflickr.com/3165/5733278274_2626612c70.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm8.staticflickr.com/7163/6822904141_50277565c3.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm4.staticflickr.com/3771/13199704015_72aa535bd7.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm7.staticflickr.com/6083/6055581292_d94c2d90e3.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm8.staticflickr.com/7187/6895047173_d4b1a0d798.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm3.staticflickr.com/2878/10944255073_973d2cd25c.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm9.staticflickr.com/8461/8048823381_0fbc2d8efb.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm5.staticflickr.com/4144/5053682635_b348b24698.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm3.staticflickr.com/2827/10384422264_d9c7299146.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm7.staticflickr.com/6217/6216951796_e50778255c.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm7.staticflickr.com/6083/6055581292_d94c2d90e3.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm3.staticflickr.com/2827/10384422264_d9c7299146.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm8.staticflickr.com/7187/6895047173_d4b1a0d798.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm4.staticflickr.com/3766/12953056854_b8cdf14f21.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm3.staticflickr.com/2878/10944255073_973d2cd25c.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
    <li class="hex">
        <a class="hexIn" href="#">
            <img src="https://farm9.staticflickr.com/8461/8048823381_0fbc2d8efb.jpg" alt="" />
            <h1>This is a title</h1>
            <p>Some sample text about the article this hexagon leads to</p>
        </a>
    </li>
</ul>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Conocimientos</h1>
            <p>Tecnologías que he utilizado en todos los proyectos que he desarrollado y el porcentaje de habilidad en cada uno de ellos</p>
            <br>
        </div>
        <div class="col-md-12">
            <div class="col-md-4" style="border-top: 10px solid #D75F17; padding-bottom: 10px;">
                <strong>Porcentaje de conocimiento adquirido</strong>
            </div>
        </div>
        <?php $col = rand(3, 5) ?>
        <div class="col-md-3"> <div class="hvr-overline-from-left" data-count="25">PHP <span></span></div> </div>
        <div class="col-md-5"> <div class="hvr-overline-from-left" data-count="50">Codeigniter <span></span></div> </div>
        <div class="col-md-4"> <div class="hvr-overline-from-left" data-count="100">Administración de servidores <span></span></div> </div>
        <div class="col-md-4"> <div class="hvr-overline-from-left" data-count="75">SQL <span></span></div> </div>
        <div class="col-md-5"> <div class="hvr-overline-from-left" data-count="50">Laravel <span></span></div> </div>
        <div class="col-md-3"> <div class="hvr-overline-from-left" data-count="80">Mysql <span></span></div> </div>
        <div class="col-md-4"> <div class="hvr-overline-from-left" data-count="25">Postgres <span></span></div> </div>
        <div class="col-md-4"> <div class="hvr-overline-from-left" data-count="50">Desarrollo API <span></span></div> </div>
        <div class="col-md-3"> <div class="hvr-overline-from-left" data-count="75">PHP <span></span></div> </div>
        <div class="col-md-5"> <div class="hvr-overline-from-left" data-count="50">Codeigniter <span></span></div> </div>
        <div class="col-md-3"> <div class="hvr-overline-from-left" data-count="100">Administración de servidores <span></span></div> </div>
        <div class="col-md-4"> <div class="hvr-overline-from-left" data-count="75">SQL <span></span></div> </div>
        <div class="col-md-3"> <div class="hvr-overline-from-left" data-count="25">Laravel <span></span></div> </div>
        <div class="col-md-5"> <div class="hvr-overline-from-left" data-count="80">Mysql <span></span></div> </div>
        <div class="col-md-5"> <div class="hvr-overline-from-left" data-count="25">Postgres <span></span></div> </div>
        <div class="col-md-4"> <div class="hvr-overline-from-left" data-count="50">Desarrollo API <span></span></div> </div>
    </div>
</div>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="<?php echo base_url()?>resources/img/key_open.png" class="me-image" />
        </div>
        <div class="col-md-8">
            <h1>Acerce de mi</h1>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</p>
        </div>
        <div class="col-md-2">
            <img src="<?php echo base_url()?>resources/img/key_close.png" class="me-image" />
        </div>
    </div>
</div>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Blog, noticias y algo más</h1>
            <br>
        </div>

        <div class="col-md-4">
            <p><img class="proyect-image" src="<?php echo base_url() ?>resources/proyectos/azteca_movil_thumb.png" /></p>
            <h3>Titulo de articulo</h3>
            <p><?php echo word_limiter("Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500", 20) ?></p>
            <a href="<?php echo base_url("inicio/blog/1")?>" target="_blank"><button type="submit" class="btn btn-primary btn-sm">Leer más</button></a>
            <div class="fb-share-button pull-right" data-href="http://aldosworld.com" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Faldosworld.com%2F&amp;src=sdkpreparse">Compartir</a></div>
            <p>&nbsp;</p>
        </div>

        <div class="col-md-4">
            <p><img class="proyect-image" src="<?php echo base_url() ?>resources/proyectos/azteca_movil_thumb.png" /></p>
            <h3>Titulo de articulo</h3>
            <p><?php echo word_limiter("Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500", 20) ?></p>
            <a href="<?php echo base_url("inicio/blog/1")?>" target="_blank"><button type="submit" class="btn btn-primary btn-sm">Leer más</button></a>
            <div class="fb-share-button pull-right" data-href="http://aldosworld.com" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Faldosworld.com%2F&amp;src=sdkpreparse">Compartir</a></div>
            <p>&nbsp;</p>
        </div>

        <div class="col-md-4">
            <p><img class="proyect-image" src="<?php echo base_url() ?>resources/proyectos/azteca_movil_thumb.png" /></p>
            <h3>Titulo de articulo</h3>
            <p><?php echo word_limiter("Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500", 20) ?></p>
            <a href="<?php echo base_url("inicio/blog/1")?>" target="_blank"><button type="submit" class="btn btn-primary btn-sm">Leer más</button></a>
            <div class="fb-share-button pull-right" data-href="http://aldosworld.com" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Faldosworld.com%2F&amp;src=sdkpreparse">Compartir</a></div>
            <p>&nbsp;</p>
        </div>

        <div class="col-md-4">
            <p><img class="proyect-image" src="<?php echo base_url() ?>resources/proyectos/azteca_movil_thumb.png" /></p>
            <h3>Titulo de articulo</h3>
            <p><?php echo word_limiter("Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500", 20) ?></p>
            <a href="<?php echo base_url("inicio/blog/1")?>" target="_blank"><button type="submit" class="btn btn-primary btn-sm">Leer más</button></a>
            <div class="fb-share-button pull-right" data-href="http://aldosworld.com" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Faldosworld.com%2F&amp;src=sdkpreparse">Compartir</a></div>
            <p>&nbsp;</p>
        </div>

        <div class="col-md-4">
            <p><img class="proyect-image" src="<?php echo base_url() ?>resources/proyectos/azteca_movil_thumb.png" /></p>
            <h3>Titulo de articulo</h3>
            <p><?php echo word_limiter("Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500", 20) ?></p>
            <a href="<?php echo base_url("inicio/blog/1")?>" target="_blank"><button type="submit" class="btn btn-primary btn-sm">Leer más</button></a>
            <div class="fb-share-button pull-right" data-href="http://aldosworld.com" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Faldosworld.com%2F&amp;src=sdkpreparse">Compartir</a></div>
            <p>&nbsp;</p>
        </div>

        <div class="col-md-4">
            <p><img class="proyect-image" src="<?php echo base_url() ?>resources/proyectos/azteca_movil_thumb.png" /></p>
            <h3>Titulo de articulo</h3>
            <p><?php echo word_limiter("Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500 Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500", 20) ?></p>
            <a href="<?php echo base_url("inicio/blog/1")?>" target="_blank"><button type="submit" class="btn btn-primary btn-sm">Leer más</button></a>
            <div class="fb-share-button pull-right" data-href="http://aldosworld.com" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Faldosworld.com%2F&amp;src=sdkpreparse">Compartir</a></div>
            <p>&nbsp;</p>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Contacto</h1>
            <p>Necesitas información para que juntos desarrollemos una solución web? Escribeme!!</p>
            <br>
        </div>
        <div class="col-md-6 col-centered">
            <form>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="asunto">Asunto:</label>
                    <textarea class="form-control" id="asunto"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
<br><br>

<footer class="footer">
    <div class="container">
        <br>
        <p class="text-center footer-text">
            ISC Aldo Marañon Andrade<br>
            Desarrollador de software y aplicaciones web
        </p>
    </div>
</footer>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=406258719451778";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>