<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="aldosword, sitio web que muestra los proyectos más importantes de mi carrera">
    <meta name="author" content="Aldo Marañon Andrade">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript,PHP,aldo,aldo marañon,aldosworld,desaroollo,pagina,web,css,proyecto,programación,codeigniter">
    <link rel="icon" href="<?php echo base_url() ?>resources/img/favicon.ico">

    <title>Aldo's world</title>

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

            $(document).on('click', '.item-menu', function(event){
                event.preventDefault();

                $('html, body').animate({
                    scrollTop: $( $.attr(this, 'href') ).offset().top
                }, 500);
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
                <li><a href="#inicio" class="item-menu">Inicio</a></li>
                <li><a href="#conocimientos" class="item-menu">Conocimientos</a></li>
                <li><a href="#acerca" class="item-menu">Acerca de mi</a></li>
                <li><a href="#blog" class="item-menu">Blog</a></li>
                <li><a href="#contacto" class="item-menu">Contacto</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="https://www.facebook.com/aldomaranon" target="_blank">
                        <i class="fa fa-facebook-square hvr-grow icon-social" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/isc_aldo_ma" target="_blank">
                        <i class="fa fa-twitter-square hvr-grow icon-social" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="https://mx.linkedin.com/in/aldo-mara%C3%B1on-andrade-89b13014" target="_blank">
                        <i class="fa fa-linkedin-square hvr-grow icon-social" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<a id="inicio"></a>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-centered text-center">
            <br><br>
            <img src="<?php echo base_url() ?>resources/img/logoaldo.png">
            <br><br>
            <p>
                <h1>Portafolio de trabajo</h1>
                Estos son algunos de los proyectos más representativos que he desarrollado<br>
            </p>
        </div>
    </div>
</div>

<ul id="hexGrid">
    <?php
    if (isset($projects)) {
        foreach ($projects AS $project) {
            ?>
            <li class="hex">
                <a class="hexIn nyroModal" href="<?php echo base_url()."inicio/showProject/".$project->id ?>">
                    <img src="<?php echo base_url().$project->image_thumb?>" alt="<?php echo $project->name ?>" />
                    <h1><?php echo $project->name ?></h1>
                    <p><?php echo word_limiter($project->description, 10) ?></p>
                </a>
            </li>
            <?php
        }
    }
    else {
        ?>
        <li class="hex">
            <a class="hexIn" href="#">
                <img src="https://farm3.staticflickr.com/2827/10384422264_d9c7299146.jpg" alt="" />
                <h1>No hay proyectos</h1>
                <p>I'm sorry</p>
            </a>
        </li>
        <?php
    }
    ?>
</ul>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-centered text-center">
            <br><br>
            <p>
                La mayoría de los proyectos ya no estan en linea ya que por fechas de término o cambio de directivos se tuvieron que dar de baja<br>
            </p>
        </div>
    </div>
</div>

<a id="conocimientos"></a>
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
        <?php
        if (isset($skills)) {
            foreach ($skills AS $skill) {
                $col = rand(3, 5);
                ?>
                <div class="col-md-<?php echo $col ?>"> <div class="hvr-overline-from-left" data-count="<?php echo $skill->porcent ?>"><?php echo $skill->name ?> <span></span></div> </div>
                <?php
            }
        }
        else {
            ?><div class="col-md-3"> <div class="hvr-overline-from-left" data-count="100">NO SKILLS<span></span></div> </div><?php
        }
        ?>
    </div>
</div>

<a id="acerca"></a>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="<?php echo base_url()?>resources/img/key_open.png" class="me-image" />
        </div>
        <div class="col-md-8">
            <h1>Acerca de mi</h1>
            <p>Diez años de experiencia en desarrollo, mantenimiento y administración de tecnologías de información, administración de proyectos, líder técnico, lider de proyectos, Lider de Area, experiencia en desarrollo de aplicaciones web bajo plataformas Linux, Mac y Windows bajo esquema MVC, desarrollo de aplicaciones en plataforma .NET, programación Orientada a Objetos y SQL avanzado.</p>
            <p>Me considero una persona profesional que sabe manejar la presión laboral y canalizarla hacia el aumento de la experiencia, además de ser autodidacta e ir aprendiendo las nuevas tecnologías que surgen el ambiente de las tecnologías de la información y el web. Además de buscar las metodologías y técnicas para un desarrollo eficiente y ágil.</p>
            <p>Administración de proyectos: Metodologías para el desarrollo de software que lleven al proyecto a la finalización correcta en tiempo y forma mediante la documentación de requerimientos y aplicación de estándares de desarrollo. Líder de proyectos: Administración de equipos de desarrollo mediante metodologías agiles para una mejor calidad en los productos terminados.</p>
            <p>Administración de redes: Administración de redes y servidores en diferentes sistemas operativos, manejo de pfsense como adminitrador de redes y balanceo de cargas para estas</p>
        </div>
        <div class="col-md-2">
            <img src="<?php echo base_url()?>resources/img/key_close.png" class="me-image" />
        </div>
    </div>
</div>

<a id="blog"></a>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Blog, noticias y algo más</h1>
            <br>
        </div>

        <?php
        if (isset($blogs)) {
            foreach ($blogs AS $blog) {
                ?>
                <div class="col-md-4">
                    <p><img class="proyect-image" src="<?php echo base_url().$blog->image_thumb ?>" style="height: 250px;" /></p>
                    <div style="height: 50px;">
                        <h3><?php echo word_limiter($blog->name, 11) ?></h3>
                    </div>
                    <p><?php echo word_limiter($blog->body, 20) ?></p>
                    <a href="<?php echo base_url("inicio/blog/".$blog->id)?>"><button type="submit" class="btn btn-primary btn-sm">Leer más</button></a>
                    <div class="fb-share-button pull-right" data-href="<?php echo base_url("inicio/blog/".$blog->id) ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Faldosworld.com%2F&amp;src=sdkpreparse">Compartir</a></div>
                    <p>&nbsp;</p>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<a id="contacto"></a>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Contacto</h1>
            <p>Necesitas información para que juntos desarrollemos una solución web? Escríbeme!!</p>
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

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-40966556-2', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>