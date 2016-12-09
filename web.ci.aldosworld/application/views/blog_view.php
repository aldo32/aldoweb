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

    <title>Blog</title>

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
                <li><a href="<?php echo base_url()?>#blog" class="item-menu">Regresar</a></li>
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

<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-centered text-center">
            <img src="<?php echo base_url().$blog->image ?>" style="width: 100%;" class="proyect-image">
            <br>
            &nbsp;
        </div>
        <div class="col-md-10">
            <h2><?php echo $blog->name ?></h2>
            <br>
        </div>
        <div class="col-md-10">
            <?php echo $blog->body ?>
            <br>
        </div>
        <div class="col-md-8">
            <?php
            $tmp = str_replace('width="560"', 'width="100%"', $blog->video_embed);
            $tmp = str_replace('height="315"', 'height="415"', $tmp);
            echo html_entity_decode($tmp);
            ?>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <br>
        <p class="text-center footer-text">
            ISC Aldo Marañon Andrade<br>
            Desarrollador de software y aplicaciones web
        </p>
    </div>
</footer>

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