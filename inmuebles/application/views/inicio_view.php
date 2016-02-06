<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Inmuebles</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/pagina/estilo1.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/pagina/estilo2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/pagina/estilo3.css">
    <link href="<?php echo base_url()?>resources/css/font-awesome.css" rel="stylesheet">

    <meta http-equiv="Content-Language" content="es">
    <script src="<?php echo base_url()?>resources/pagina/jquery.js"></script>
    <script src="<?php echo base_url()?>resources/pagina/jquery-ui.js" defer="defer"></script>
    <script src="<?php echo base_url()?>resources/pagina/modernizr.js" defer="defer"></script>

    <script>
        $(function(){
            $(window).load(function(){
                setTimeout(function(){
                    $('.bifurcador-wrap').removeClass('oculto');
                },1000);
                setTimeout(function(){
                    $('.bifurcador-wrap').fadeOut('200');
                },12000);
            });
        });

        var config = {
            numeracion : {
                SEPARADOR_MILES: ","
            },
            idPais: "18",
            locale: "es_LA",
            file:{
                imagenExtensionPermitidas:"jpg,gif,png,jpeg",
                maxCantFile:"24"
            },
            fb_app_id: "0",
            ambiente:"3",
            urlStatic:""
        };

        (function() {
            var script,
                scripts = document.getElementsByTagName('script')[0];
            function loadScript(url) {
                script = document.createElement('script');
                script.async = true;
                script.src = url;
                scripts.parentNode.insertBefore(script, scripts);
            }

            var style,
                styles = document.getElementsByTagName('link')[0];
            function loadCss(url) {
                style = document.createElement('link');
                style.rel = 'stylesheet';
                style.type = 'text/css';
                style.href = url;
                styles.parentNode.insertBefore(style, styles);
            }

            document.onready = function() {
                //LOAD ELEMENTS AFTER DOM READY
            };
            window.onload = function() {
                //LOAD ELEMENTS AFTER PAGE FULL LOAD
                loadScript('http://static2.navent.com/js/plugins/facebook/fb-api_bum_v6f31c671325a8a71f041b1c5ae01c752.js');
            };
        }());
        $(function(){
            //			SI EL USUARIO NO ESTA LOGUEADO Y ESTA GUARDADA LA COOKIE CON UN EMAIL INGRESADO
            //			RELLENO TODOS LOS INPUT CON DICHO EMAIL ASI NO LO TIEN QUE VOLVER A INGRESAR
            $(window).load(function(){
                realestate().auth.updateEmailInputsConCookie();
            });
        });
    </script>
</head>

<body id="home" class="Mexico panel-usuario" style="background: #64aee3;">
<header class="header  -home clearfix oculto-print">
    <div class="container">
        <!--LOGO-->
        <div class="logo-header-wrap">
            <a class="logo-header" href="/"></a>
        </div>
        <!--NAV-->
        <nav class="header-nav">

            <div class="dropdown pull-right position-relative">
                &nbsp;
                <button data-toggle="dropdown" class="btn btn-noframe">
                    <i class="ticon ticon-options"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="/blog">Home</a></li>
                    <li><a href="/blog">Departamentos</a></li>
                    <li><a href="/blog">Terrenos</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- Header End -->

<script type="text/javascript" src="<?php echo base_url()?>resources/pagina/plugin1.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/pagina/plugin2.js" defer="defer"></script>
<script type="text/javascript" src="<?php echo base_url()?>resources/pagina/plugin3.js" defer="defer"></script>

<script>
    //	Cargar elementos no prioritarios

</script>

<script type="text/javascript" src="<?php echo base_url() ?>resources/pagina/conversion.js"></script>

<img src="<?php echo base_url() ?>resources/pagina/home-img-2.jpg" data-real-src="<?php echo base_url() ?>resources/pagina/home-img-2.jpg" class="lazyBg-preload oculto" height="1"
     width="1">

<div class="section-search lazyBg "
     style="background-image: url(&quot;http://akstatic.inmuebles24.com/css/img/home-img-2.jpg&quot;); background-size: cover; max-width: 100%; height: calc(100% - 55px);">

    <!-- Nueva caja logos BEG -->
    <input id="idNameProyecto" value=" - " type="hidden">
    <!-- Nueva caja logos END -->

    <div class="container" id="searchbox-container">
        <div class="searchbox-home-wrap flat" data-provincia="Distrito Federal">
            <div class="searchbox searchbox-home">
                <h1>Busca inmuebles en México</h1>

                <form id="searchbox" action="/listado.bum" method="post">

                    <div class="control-group">
                        <div class="searchbox-tipodeoperacion">
                            <label for="searchbox-home_tipodeoperacion">Operación</label>

                            <div class="input-select">
                                <select name="tipoDeOperacion" id="searchbox-home_tipodeoperacion" class="input-weight-xlarge input-block">
                                    <option selected="selected" value="1">Comprar</option>
                                    <option value="2">Rentar</option>
                                    <option value="4">Temporal/Vacacional</option>
                                    <option value="3">Traspaso</option>
                                    <option value="desarrollosURL">Desarrollos</option>
                                </select>
                            </div>
                        </div>
                        <div class="searchbox-tipodepropiedad">
                            <label for="searchbox-home_tipodepropiedad">Propiedad</label>

                            <div class="input-select">
                                <select name="tipoDePropiedad" id="searchbox-home_tipodepropiedad" class="input-weight-xlarge input-block">
                                    <option selected="selected" value="2">Departamento</option>
                                    <option value="1">Casa</option>
                                    <option value="3">Terreno / Lote</option>
                                    <option value="4">Oficina</option>
                                    <option value="8|21|22">Bodegas</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="searchbox-home.ubicacion">Colonia, Municipio o Delegación, Estado o Proyecto</label>
                        <button class="btn-pointer js-geolocate" data-loadingtext="Cargando"><i class="ticon ticon-pointer"></i></button>

                        <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                            <input type="text" disabled="" spellcheck="off" autocomplete="off" class="tt-hint" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; background: rgb(255, 255, 255) none repeat scroll 0% 0%;">
                            <input type="text" placeholder="Ingresa Colonia, Municipio o Delegación, Estado o Proyecto" class="input-weight-xlarge input-block tt-query" id="searchbox-home_ubicacion" name="ubicacion" autocomplete="off" spellcheck="false" style="position: relative; vertical-align: top; background-color: transparent;" dir="auto">
                            <span style="position: absolute; left: -9999px; visibility: hidden; white-space: nowrap; font-family: Roboto,sans-serif; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></span>
                            <span class="tt-dropdown-menu flat" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto; visibility: visible;">
                                <div class="tt-dataset-zonas" style="display: none;">
                                    <span class="tt-suggestions" style="display: block;"></span>
                                </div>
                            </span>
                        </span>

                        <input name="idZonaCiudad" type="hidden">
                        <input name="idZonaDeValor" type="hidden">
                        <input name="idCiudad" type="hidden">
                        <input name="idProvincia" type="hidden">
                        <input name="idSubZona" type="hidden">
                    </div>

                    <div class="control-group searchbox-precio">

                        <div><p class="subtexto">Presupuesto máximo</p>
                            <span>MN </span>
                            <input id="searchbox-home_precio-input" class="oculto" min="100" max="9999999999999"
                                   step="100" type="number">
											<span id="searchbox-home_precio">
											 <span class="infinito">6,000,000 o más</span></span></div>
                        <div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                             id="slider-precio"><span style="left: 100%;"
                                                      class="ui-slider-handle ui-state-default ui-corner-all"
                                                      tabindex="0"></span></div>
                        <input id="slider-val" name="precio" value="" type="hidden">
                        <input class="sliderVal selected" name="valorSlider['default']" type="hidden">
                        <input class="sliderVal" id="sl-max" name="valorSlider['default']['max']" value="6000000"
                               type="hidden">
                        <input class="sliderVal" id="sl-min" name="valorSlider['default']['min']" value="0"
                               type="hidden">
                        <input class="sliderVal" id="sl-step" name="valorSlider['default']['step']" value="10000"
                               type="hidden">
                        <input class="sliderVal" id="sl-start" name="valorSlider['default']['start']" value="6000000"
                               type="hidden">
                        <input class="sliderVal" name="valorSlider['default']['label']" value="6,000,000 o más"
                               type="hidden">

                        <input class="sliderVal" name="valorSlider[][2]" type="hidden">
                        <input class="sliderVal" name="valorSlider[][2]['max']" value="30000" type="hidden">
                        <input class="sliderVal" name="valorSlider[][2]['min']" value="0" type="hidden">
                        <input class="sliderVal" name="valorSlider[][2]['step']" value="100" type="hidden">
                        <input class="sliderVal" name="valorSlider[][2]['start']" value="30000" type="hidden">
                        <input class="sliderVal" name="valorSlider[][2]['label']" value="30,000 o más" type="hidden">

                    </div>


                    <div class="searchbox-submit">
                        <button type="submit" id="submitBtn" class="btn btn-xlarge btn-block btn-primary">Buscar
                            <span>121490 propiedades</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="content-bar">
    <div class="container">
        <div class="row">
            <div class="span18 offset3">
                <h2>
                    ¡Encuentra las mejores propiedades en venta y renta!
                </h2>
                <p>
                    El mayor portal de bienes raíces en
                    México. Te ayudamos a encontrar el hogar de tus sueños accediendo a las
                    mejores ofertas de casas, departamentos, oficinas, terrenos y otros
                    inmuebles en venta y renta. Utiliza nuestro buscador para filtrar por
                    localidad y definir el rango de precios que sea de tu interés. <strong>¡Encuentra tu próximo inmueble en México desde tu teléfono o desde la web!</strong>
                </p>
            </div>
        </div>
    </div>
</div>








<div class="container">
    <h3 class="h1">Desarrollos destacados en México <small><a href="#">Ver todos</a></small></h3>
    <div class="row">
        <div class="span24">

            <div style="overflow: hidden;" class="frame" id="slider-desarrollos">
                <div style="transform: translateZ(0px) translateX(-108px); width: 14160px;" class="slidee clearfix">
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo vertical " id="aviso-1029756" data-aviso="1029756">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Garza Sada 1892">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/01/02/97/56/240x342/37732211.jpg" class="foto-principal lazyDesarrollos" alt="Garza Sada 1892" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/01/02/97/56/130x70/9726875.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/15/66/84/130x70/logo_vyve-monterrey.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="#" title="Garza Sada 1892">Garza Sada 1892</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Contry, Monterrey</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Inmediata </b></li>
                                        <li><b>216 unidades</b></li>
                                        <li><b>1</b> a <b>4</b> Recamaras</li>
                                        <li><b>30</b> a <b>134</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 6,427</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="VYVE Monterrey">VYVE Monterrey</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="1029756" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="1029756" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="1029756" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee active">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51246025" data-aviso="51246025">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="" title="Vista Sierra - Deptos. Sobre Viaductos Cerca del Palacio de Los Deportes">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/24/60/25/450x200/41739417.jpg" class="foto-principal lazyDesarrollos" alt="Vista Sierra - Deptos. Sobre Viaductos Cerca del Palacio de Los Deportes" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">

                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/17/29/83/130x70/logo_hogares-sauce.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="#" title="Vista Sierra - Deptos. sobre viaductos cerca del Palacio de los Deportes">Vista Sierra - Deptos. Sobre Viaductos Cerca del Palacio de Los Deportes</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Jardín Balbuena, Venustiano Carranza</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Inmediata </b></li>
                                        <li><b>46 unidades</b></li>
                                        <li><b>2</b> Recamaras</li>
                                        <li><b>61</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 1,896,300</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="RAIZ DIGITAL">RAIZ DIGITAL</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51246025" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51246025" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51246025" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51084703" data-aviso="51084703">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Tolouse Residencial">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/08/47/03/450x200/39914338.jpg" class="foto-principal lazyDesarrollos" alt="Tolouse Residencial" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/08/47/03/130x70/39271591.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/05/20/32/130x70/52032.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="#" title="TOLOUSE RESIDENCIAL">Tolouse Residencial</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Del Valle Centro, Benito Juárez</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Noviembre 2016 </b></li>
                                        <li><b>12 unidades</b></li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>148</b> a <b>173</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 5,393,500</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="AURI">AURI</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51084703" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51084703" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51084703" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo vertical " id="aviso-51332129" data-aviso="51332129">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="" title="José María Rico 625">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/33/21/29/240x342/43041911.jpg" class="foto-principal lazyDesarrollos" alt="José María Rico 625" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/33/21/29/130x70/43041676.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/02/27/90/130x70/22790.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="" title="José María Rico 625">José María Rico 625</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Del Valle Sur, Benito Juárez</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Junio 2017 </b></li>
                                        <li><b>60 unidades</b></li>
                                        <li><b>2</b> Recamaras</li>
                                        <li><b>80</b> a <b>190</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 2,900,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="MP Inmobiliaria">MP Inmobiliaria</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51332129" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51332129" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51332129" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51305519" data-aviso="51305519">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Una Nueva Comunidad en Playa del Carmen Desde 2,360,000 Mxn">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/30/55/19/450x200/42687241.jpg" class="foto-principal lazyDesarrollos" alt="Una Nueva Comunidad en Playa del Carmen Desde 2,360,000 Mxn" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/30/55/19/130x70/42687213.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/10/45/44/130x70/logo_nimbos-realty_4.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="#" title="Una nueva comunidad en Playa del Carmen desde 2,360,000 MXN">Una Nueva Comunidad en Playa del Carmen Desde 2,360,000 Mxn</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Solidaridad, Playa del Carmen</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Febrero 2017 </b></li>
                                        <li><b>182 unidades</b></li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>180</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 2,360,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Nimbos Realty">Nimbos Realty</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51305519" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51305519" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51305519" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-962967" data-aviso="962967">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Zibatá, Planeado Para Vivir Bien.">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/00/96/29/67/450x200/23562657.jpg" class="foto-principal lazyDesarrollos" alt="Zibatá, Planeado Para Vivir Bien." height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/00/96/29/67/130x70/8841322.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/14/68/03/130x70/logo_supraterra.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="#" title="Zibatá, Planeado para vivir BIEN.">Zibatá, Planeado Para Vivir Bien.</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Fraccionamiento Zibatá, El Marqués</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Inmediata </b></li>



                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 4,150</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Supraterra">Supraterra</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="962967" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="962967" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="962967" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51137360" data-aviso="51137360">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="" title="Privada Chaactún">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/13/73/60/450x200/40690746.jpg" class="foto-principal lazyDesarrollos" alt="Privada Chaactún" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/13/73/60/130x70/40690468.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/04/98/29/130x70/49829.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="" title="Privada Chaactún">Privada Chaactún</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Yucatán Country Club, Mérida</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Inmediata </b></li>
                                        <li><b>117 unidades</b></li>

                                        <li><b>390</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 565,500</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Grupo BCI">Grupo BCI</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51137360" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51137360" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51137360" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51340686" data-aviso="51340686">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Hidalgo II">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/34/06/86/450x200/43178571.jpg" class="foto-principal lazyDesarrollos" alt="Hidalgo II" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">

                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/13/80/67/130x70/logo_grupo-coyoacan_7.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="#" title="Hidalgo II">Hidalgo II</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Villa Coyoacán, Coyoacán</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Enero 2017 </b></li>
                                        <li><b>6 unidades</b></li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>351</b> a <b>371</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 18,900,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Grupo Coyoacan">Grupo Coyoacan</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51340686" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51340686" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51340686" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo vertical " id="aviso-915090" data-aviso="915090">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Maria Ribera - Departamentos con Historia a Tu Alrededor.">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/00/91/50/90/240x342/39874379.jpg" class="foto-principal lazyDesarrollos" alt="Maria Ribera - Departamentos con Historia a Tu Alrededor." height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/00/91/50/90/130x70/9361818.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/02/28/04/130x70/22804.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="#" title="MARIA RIBERA - Departamentos con historia a tu alrededor. ">Maria Ribera - Departamentos con Historia a Tu Alrededor.</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Santa Maria La Ribera, Cuauhtémoc</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Inmediata </b></li>

                                        <li><b>2</b> Recamaras</li>
                                        <li><b>55</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 2,000,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Marhnos Habitat">Marhnos Habitat</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="915090" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="915090" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="915090" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51084827" data-aviso="51084827">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="" title="Capri Residencial">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/08/48/27/450x200/39914247.jpg" class="foto-principal lazyDesarrollos" alt="Capri Residencial" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/08/48/27/130x70/39273761.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/05/20/32/130x70/52032.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="" title="CAPRI RESIDENCIAL">Capri Residencial</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Del Valle Sur, Benito Juárez</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Octubre 2016 </b></li>
                                        <li><b>11 unidades</b></li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>122</b> a <b>171</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 5,021,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="AURI">AURI</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51084827" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51084827" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51084827" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51144114" data-aviso="51144114">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="" title="Francia 82">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/14/41/14/450x200/40217044.jpg" class="foto-principal lazyDesarrollos" alt="Francia 82" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">

                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/12/11/33/130x70/logo_hr-promotores_0.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="" title="FRANCIA 82">Francia 82</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Florida, Alvaro Obregón</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Febrero 2017 </b></li>
                                        <li><b>12 unidades</b></li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>321</b> a <b>432</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 16,169,861</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="HR PROMOTORES">HR PROMOTORES</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51144114" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51144114" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51144114" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-1039973" data-aviso="1039973">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Desierto 4373 - Una Mirada a Tu Nueva Vida">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/01/03/99/73/450x200/27334163.jpg" class="foto-principal lazyDesarrollos" alt="Desierto 4373 - Una Mirada a Tu Nueva Vida" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/01/03/99/73/130x70/27981352.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/02/28/04/130x70/22804.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="" title="Desierto 4373 - UNA MIRADA A TU NUEVA VIDA">Desierto 4373 - Una Mirada a Tu Nueva Vida</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Tetelpan, Alvaro Obregón</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Abril 2016 </b></li>
                                        <li><b>66 unidades</b></li>
                                        <li><b>2</b> a <b>3</b> Recamaras</li>
                                        <li><b>101</b> a <b>156</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 3,900,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Marhnos Habitat">Marhnos Habitat</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="1039973" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="1039973" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="1039973" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo vertical " id="aviso-51101306" data-aviso="51101306">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Kansas 18. Nueva Preventa en Nápoles.">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/10/13/06/240x342/39503149.jpg" class="foto-principal lazyDesarrollos" alt="Kansas 18. Nueva Preventa en Nápoles." height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/10/13/06/130x70/39502320.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/02/27/74/130x70/logo_class-bienes-raices_4.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="#" title="KANSAS 18. Nueva Preventa en Nápoles. ">Kansas 18. Nueva Preventa en Nápoles.</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Napoles, Benito Juárez</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>3° trimestre 2016 </b></li>
                                        <li><b>26 unidades</b></li>
                                        <li><b>1</b> a <b>2</b> Recamaras</li>
                                        <li><b>119</b> a <b>186</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 3,191,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="CLASS BIENES RAICES">CLASS BIENES RAICES</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51101306" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51101306" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51101306" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51387039" data-aviso="51387039">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="San José Tulipanes">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/38/70/39/450x200/43973638.jpg" class="foto-principal lazyDesarrollos" alt="San José Tulipanes" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">

                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/04/98/29/130x70/49829.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="" title="San José Tulipanes">San José Tulipanes</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Mérida, Mérida</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Septiembre 2016 </b></li>
                                        <li><b>63 unidades</b></li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>302</b> a <b>732</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 1,590,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Grupo BCI">Grupo BCI</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51387039" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51387039" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51387039" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-50659175" data-aviso="50659175">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="" title="Maranta Bosques">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/65/91/75/450x200/29413412.jpg" class="foto-principal lazyDesarrollos" alt="Maranta Bosques" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/65/91/75/130x70/29411748.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/07/75/17/130x70/logo_parque-reforma_8.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="" title="MARANTA BOSQUES">Maranta Bosques</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Lomas de Vista Hermosa, Cuajimalpa de Morelos</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Enero 2017 </b></li>
                                        <li><b>71 unidades</b></li>
                                        <li><b>2</b> a <b>4</b> Recamaras</li>
                                        <li><b>141</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 6,215,748</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Parque Reforma">Parque Reforma</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50659175" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50659175" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50659175" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-1083135" data-aviso="1083135">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="#" title="Citea_ Casas Frente Al Campo de Golf">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/01/08/31/35/450x200/39082335.jpg" class="foto-principal lazyDesarrollos" alt="Citea_ Casas Frente Al Campo de Golf" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/01/08/31/35/130x70/33955348.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/16/48/19/130x70/164819.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/citea_-casas-frente-al-campo-de-golf-1083135.html" title="CITEA_ Casas  frente al campo de Golf">Citea_ Casas Frente Al Campo de Golf</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Fraccionamiento Zibatá, El Marqués</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Inmediata </b></li>
                                        <li><b>78 unidades</b></li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>115</b> a <b>146</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 1,425,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Grupo Lar">Grupo Lar</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="1083135" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="1083135" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="1083135" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo vertical " id="aviso-989422" data-aviso="989422">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/via-santa-fe-2-989422.html" title="Via Santa Fe 2">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/00/98/94/22/240x342/9042239.jpg" class="foto-principal lazyDesarrollos" alt="Via Santa Fe 2" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/00/98/94/22/130x70/9042238.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/14/36/37/130x70/143637.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/via-santa-fe-2-989422.html" title="Via Santa Fe 2">Via Santa Fe 2</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Santa Fe, Alvaro Obregón</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Junio 2016 </b></li>
                                        <li><b>135 unidades</b></li>
                                        <li><b>2</b> Recamaras</li>
                                        <li><b>80</b> a <b>97</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 3,700,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="M&amp;M Consulores Inmobiliarios">M&amp;M Consulores Inmobiliarios</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="989422" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="989422" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="989422" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51137157" data-aviso="51137157">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/aldea-conkal-51137157.html" title="Aldea Conkal">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/13/71/57/450x200/40867184.jpg" class="foto-principal lazyDesarrollos" alt="Aldea Conkal" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/13/71/57/130x70/40121653.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/04/98/29/130x70/49829.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/aldea-conkal-51137157.html" title="Aldea Conkal">Aldea Conkal</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Yucatan, Mérida</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Inmediata </b></li>
                                        <li><b>70 unidades</b></li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>504</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 275,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Grupo BCI">Grupo BCI</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51137157" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51137157" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51137157" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51352309" data-aviso="51352309">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/departamentos-en-preventa-en-playa-del-carmen-51352309.html" title="Departamentos en Preventa en Playa del Carmen">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/35/23/09/450x200/43448765.jpg" class="foto-principal lazyDesarrollos" alt="Departamentos en Preventa en Playa del Carmen" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/35/23/09/130x70/43383908.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/12/54/93/130x70/logo_vrico-inmobiliaria_7.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/departamentos-en-preventa-en-playa-del-carmen-51352309.html" title="Departamentos en preventa en Playa del Carmen">Departamentos en Preventa en Playa del Carmen</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Playa del Carmen Centro, Solidaridad</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Diciembre 2016 </b></li>
                                        <li><b>8 unidades</b></li>
                                        <li><b>2</b> Recamaras</li>
                                        <li><b>88</b> a <b>105</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">U$D 177,900</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Vrico Inmobiliaria">Vrico Inmobiliaria</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51352309" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51352309" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51352309" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51373865" data-aviso="51373865">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/pachuca-02-51373865.html" title="Pachuca 02">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/37/38/65/450x200/43694816.jpg" class="foto-principal lazyDesarrollos" alt="Pachuca 02" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/37/38/65/130x70/43692985.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/11/27/42/130x70/logo_jsa-arquitectos_4.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/pachuca-02-51373865.html" title="Pachuca 02">Pachuca 02</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Condesa, Cuauhtémoc</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Junio 2016 </b></li>
                                        <li><b>28 unidades</b></li>
                                        <li><b>1</b> a <b>2</b> Recamaras</li>
                                        <li><b>103</b> a <b>165</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 7,486,600</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="JSA arquitectos">JSA arquitectos</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51373865" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51373865" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51373865" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51129183" data-aviso="51129183">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/city-towers-green-51129183.html" title="City Towers Green">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/12/91/83/450x200/40427735.jpg" class="foto-principal lazyDesarrollos" alt="City Towers Green" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/12/91/83/130x70/40423746.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/11/89/91/130x70/logo_gap-inmobiliaria_7.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/city-towers-green-51129183.html" title="City Towers Green">City Towers Green</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Santa Cruz Atoyac, Benito Juárez</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Octubre 2018 </b></li>
                                        <li><b>783 unidades</b></li>
                                        <li><b>2</b> a <b>3</b> Recamaras</li>
                                        <li><b>74</b> a <b>112</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 2,904,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="City Towers">City Towers</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51129183" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51129183" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51129183" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-50308326" data-aviso="50308326">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/lopez-cotilla-50308326.html" title="López Cotilla">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/30/83/26/450x200/42201824.jpg" class="foto-principal lazyDesarrollos" alt="López Cotilla" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/30/83/26/130x70/24230210.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/16/48/19/130x70/164819.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/lopez-cotilla-50308326.html" title="LÓPEZ COTILLA">López Cotilla</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Arcos Vallarta, Guadalajara</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>2° trimestre 2017 </b></li>
                                        <li><b>145 unidades</b></li>
                                        <li><b>2</b> a <b>3</b> Recamaras</li>
                                        <li><b>81</b> a <b>139</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 2,500,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Grupo Lar">Grupo Lar</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50308326" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50308326" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50308326" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo vertical " id="aviso-51299383" data-aviso="51299383">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/hightower-vertical-lifestyle-51299383.html" title="Hightower - Vertical Lifestyle">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/29/93/83/240x342/42513140.jpg" class="foto-principal lazyDesarrollos" alt="Hightower - Vertical Lifestyle" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/29/93/83/130x70/42518462.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/13/41/65/130x70/logo_black-sheep_5.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/hightower-vertical-lifestyle-51299383.html" title="Hightower - Vertical Lifestyle">Hightower - Vertical Lifestyle</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Providencia, Guadalajara</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Mayo 2017 </b></li>
                                        <li><b>66 unidades</b></li>
                                        <li><b>2</b> a <b>4</b> Recamaras</li>
                                        <li><b>84</b> a <b>172</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 2,705,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Black Sheep">Black Sheep</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51299383" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51299383" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51299383" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo vertical " id="aviso-284459" data-aviso="284459">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/puerta-toreo-el-valor-de-estar-cerca.-284459.html" title="Puerta Toreo - El Valor de Estar Cerca.">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/00/28/44/59/240x342/38254323.jpg" class="foto-principal lazyDesarrollos" alt="Puerta Toreo - El Valor de Estar Cerca." height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/00/28/44/59/130x70/501927.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/00/02/28/04/130x70/22804.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/puerta-toreo-el-valor-de-estar-cerca.-284459.html" title="PUERTA TOREO - El valor de estar cerca. ">Puerta Toreo - El Valor de Estar Cerca.</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Argentina Poniente, Miguel Hidalgo</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>4° trimestre 2016 </b></li>
                                        <li><b>605 unidades</b></li>
                                        <li><b>2</b> Recamaras</li>
                                        <li><b>54</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 1,400,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Marhnos Habitat">Marhnos Habitat</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="284459" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="284459" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="284459" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-50677525" data-aviso="50677525">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/ventanas-coyoacan-un-lugar-singular-que-te-permitira-50677525.html" title="Ventanas Coyoacan, un Lugar Singular Que Te Permitirá Vivir a Plenitud.">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/67/75/25/450x200/29755441.jpg" class="foto-principal lazyDesarrollos" alt="Ventanas Coyoacan, un Lugar Singular Que Te Permitirá Vivir a Plenitud." height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/67/75/25/130x70/29635451.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/07/97/34/130x70/logo_ventas-inmobiliarias-vita-sa-de-cv_8.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/ventanas-coyoacan-un-lugar-singular-que-te-permitira-50677525.html" title=" VENTANAS COYOACAN, un lugar singular que te permitirá vivir a plenitud.">Ventanas Coyoacan, un Lugar Singular Que Te Permitirá Vivir a Plenitud.</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Ex-Hacienda Coapa, Coyoacán</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Inmediata </b></li>
                                        <li><b>99 unidades</b></li>
                                        <li><b>2</b> a <b>3</b> Recamaras</li>
                                        <li><b>88</b> a <b>124</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 3,265,666</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Ventas Inmobiliarias VITA SA de CV">Ventas Inmobiliarias VITA SA de CV</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50677525" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50677525" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50677525" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51280761" data-aviso="51280761">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/vidaltus-residencial-central-51280761.html" title="Vidaltus Residencial Central">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/28/07/61/450x200/42240084.jpg" class="foto-principal lazyDesarrollos" alt="Vidaltus Residencial Central" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/28/07/61/130x70/42239865.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/13/28/83/130x70/logo_vidaltus_2.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/vidaltus-residencial-central-51280761.html" title="Vidaltus Residencial Central">Vidaltus Residencial Central</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Santa Anita, Iztacalco</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Agosto 2016 </b></li>
                                        <li><b>15 unidades</b></li>
                                        <li><b>1</b> a <b>3</b> Recamaras</li>
                                        <li><b>59</b> a <b>127</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 1,510,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Vidaltus ">Vidaltus </strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51280761" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51280761" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51280761" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51373971" data-aviso="51373971">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/juan-de-la-barrera-51373971.html" title="Juan de La Barrera">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/37/39/71/450x200/43718061.jpg" class="foto-principal lazyDesarrollos" alt="Juan de La Barrera" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/37/39/71/130x70/43693717.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/11/27/42/130x70/logo_jsa-arquitectos_4.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/juan-de-la-barrera-51373971.html" title="Juan de la Barrera">Juan de La Barrera</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Condesa, Cuauhtémoc</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Junio 2017 </b></li>
                                        <li><b>57 unidades</b></li>
                                        <li><b>1</b> a <b>3</b> Recamaras</li>
                                        <li><b>64</b> a <b>366</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 4,827,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="JSA arquitectos">JSA arquitectos</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51373971" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51373971" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51373971" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51121687" data-aviso="51121687">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/arago-lifestyle-concept-51121687.html" title="Árago - Lifestyle Concept">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/12/16/87/450x200/40149113.jpg" class="foto-principal lazyDesarrollos" alt="Árago - Lifestyle Concept" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/12/16/87/130x70/39893328.jpg" class="lazyDesarrollos" height="55" width="102"></div>

                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/arago-lifestyle-concept-51121687.html" title="Árago - LifeStyle Concept">Árago - Lifestyle Concept</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Fraccionamiento Zibatá, El Marqués</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Octubre 2016 </b></li>
                                        <li><b>40 unidades</b></li>
                                        <li><b>2</b> a <b>3</b> Recamaras</li>
                                        <li><b>167</b> a <b>285</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 2,348,335</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Árago ">Árago </strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51121687" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51121687" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51121687" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-51376392" data-aviso="51376392">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/zuri-lifestyle-house-zibata-51376392.html" title="Zuri Lifestyle House Zibata">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/37/63/92/450x200/43741233.jpg" class="foto-principal lazyDesarrollos" alt="Zuri Lifestyle House Zibata" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/37/63/92/130x70/43740847.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                    <div class="post-logo-inmobiliaria"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/empresas/18/00/50/13/44/51/130x70/logo_zuri_0.jpg" class="lazyDesarrollos" height="55" width="102"></div>
                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/zuri-lifestyle-house-zibata-51376392.html" title="Zuri Lifestyle House Zibata">Zuri Lifestyle House Zibata</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; Fraccionamiento Zibatá, El Marqués</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Mayo 2016 </b></li>
                                        <li><b>33 unidades</b></li>
                                        <li><b>3</b> a <b>4</b> Recamaras</li>
                                        <li><b>132</b> a <b>184</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 1,730,000</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Quid Vivienda">Quid Vivienda</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51376392" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51376392" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51376392" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-desarrollo  " id="aviso-50633943" data-aviso="50633943">
                                <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/periferico-180-50633943.html" title="Periferico 180">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/63/39/43/450x200/29139837.jpg" class="foto-principal lazyDesarrollos" alt="Periferico 180" height="100%" width="100%">
                                    </a>
                                </div>
                                <div class="post-logos">
                                    <div class="post-logo-desarrollo"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/63/39/43/130x70/29186800.jpg" class="lazyDesarrollos" height="55" width="102"></div>

                                </div>
                                <!--Tag desarrollo-->
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/periferico-180-50633943.html" title="PERIFERICO 180">Periferico 180</a></h4>
                                    <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; San Pedro de los Pinos, Alvaro Obregón</span>
                                    <ul class="post-content">
                                        <li>Entrega <b>Diciembre 2016 </b></li>
                                        <li><b>404 unidades</b></li>
                                        <li><b>2</b> a <b>3</b> Recamaras</li>
                                        <li><b>58</b> a <b>99</b> m²</li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">MN 1,671,880</span>


                                    </div>
                                    <div class="post-comercializa">
                                        <span class="coment">Comercializa</span> <strong title="Inmobiliaria IHM">Inmobiliaria IHM</strong>
                                    </div>
                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50633943" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50633943" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50633943" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="slidee-buttons">
                <button class="btn btn-large prev"><i class="ticon ticon-prev"></i> Anterior</button>
                <button class="btn btn-large next">Siguiente <i class="ticon ticon-next"></i></button>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <h3 class="h1">Propiedades destacadas en México <small>
            <a href="/inmuebles.html" title="Propiedades destacadas en México">Ver todas</a></small></h3>


    <div class="row">
        <div class="span24">
            <div style="overflow: hidden;" class="frame" id="slider-destacadas">
                <div style="transform: translateZ(0px) translateX(-237px); width: 11850px;" class="slidee clearfix">
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51159357" data-aviso="51159357">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/bodega-en-renta-naucalpan-calle-3-51159357.html" title="Bodega en Renta, Naucalpan Calle 3">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/15/93/57/215x159/40438177.jpg" class="lazy foto-principal" alt="Bodega en Renta, Naucalpan Calle 3" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/bodega-en-renta-naucalpan-calle-3-51159357.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/bodega-en-renta-naucalpan-calle-3-51159357.html" title="Bodega en Renta, Naucalpan Calle 3">Bodega en Renta, Naucalpan Calle 3</a></h4>
                                    <!-- Bodega en Renta, Naucalpan Calle 3 -->
                                    <ul class="post-content">
                                        <li><b>2920</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 130,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51159357" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51159357" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51159357" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee active">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51278523" data-aviso="51278523">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/casa-en-renta-chapala-jalisco-51278523.html" title="Casa en Renta Chapala, Jalisco">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/27/85/23/215x159/42207967.jpg" class="lazy foto-principal" alt="Casa en Renta Chapala, Jalisco" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/casa-en-renta-chapala-jalisco-51278523.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/casa-en-renta-chapala-jalisco-51278523.html" title="Casa en Renta Chapala, Jalisco ">Casa en Renta Chapala, Jalisco</a></h4>
                                    <!-- Casa en Renta Chapala, Jalisco -->
                                    <ul class="post-content">
                                        <li><b>98</b> m² (<b>95</b> m² construidos)</li>
                                        <li><b>1</b> recamara</li>
                                        <li><b>1</b> baño </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">U$D 620</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51278523" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51278523" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51278523" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50725061" data-aviso="50725061">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-bodega-con-oficinas-en-cd.-juarez-50725061.html" title="Excelente Bodega con Oficinas en Cd. Juarez">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/72/50/61/215x159/43632735.jpg" class="lazy foto-principal" alt="Excelente Bodega con Oficinas en Cd. Juarez" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-bodega-con-oficinas-en-cd.-juarez-50725061.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-bodega-con-oficinas-en-cd.-juarez-50725061.html" title="EXCELENTE BODEGA CON OFICINAS EN CD. JUAREZ">Excelente Bodega con Oficinas en Cd. Juarez</a></h4>
                                    <!-- Excelente Bodega con Oficinas en Cd. <span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>3388</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 80</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50725061" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50725061" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50725061" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51039651" data-aviso="51039651">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/nave-industrial-en-renta-51039651.html" title="Nave Industrial en Renta">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/03/96/51/215x159/38633294.jpg" class="lazy foto-principal" alt="Nave Industrial en Renta" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/nave-industrial-en-renta-51039651.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/nave-industrial-en-renta-51039651.html" title="Nave Industrial en renta ">Nave Industrial en Renta</a></h4>
                                    <!-- Nave Industrial en Renta -->
                                    <ul class="post-content">
                                        <li><b>6000</b> m² (<b>3612</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 1</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51039651" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51039651" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51039651" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51262177" data-aviso="51262177">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/renta-solo-en-plaza-carso-todas-las-medidas-y-precios-51262177.html" title="Renta Solo en Plaza Carso Todas Las Medidas y Precios">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/26/21/77/215x159/41978617.jpg" class="lazy foto-principal" alt="Renta Solo en Plaza Carso Todas Las Medidas y Precios" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/renta-solo-en-plaza-carso-todas-las-medidas-y-precios-51262177.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/renta-solo-en-plaza-carso-todas-las-medidas-y-precios-51262177.html" title="RENTA SOLO EN PLAZA CARSO TODAS LAS MEDIDAS Y PRECIOS">Renta Solo en Plaza Carso Todas Las Medidas y Precios</a></h4>
                                    <!-- Renta Solo en Plaza Carso Todas Las M<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>300</b> m² (<b>56</b> m² construidos)</li>
                                        <li><b>1</b> recamara</li>
                                        <li><b>1</b> baño </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 20,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51262177" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51262177" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51262177" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51281213" data-aviso="51281213">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-locales-en-zamora-mich.-51281213.html" title="Excelentes Locales en Zamora Mich.">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/28/12/13/215x159/43883191.jpg" class="lazy foto-principal" alt="Excelentes Locales en Zamora Mich." height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-locales-en-zamora-mich.-51281213.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-locales-en-zamora-mich.-51281213.html" title="Excelentes locales en Zamora Mich.">Excelentes Locales en Zamora Mich.</a></h4>
                                    <!-- Excelentes Locales en Zamora Mich. -->
                                    <ul class="post-content">
                                        <li><b>20000</b> m² (<b>6626</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 260</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51281213" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51281213" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51281213" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50407627" data-aviso="50407627">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-la-del.-cuauhtemoc-morelos-20-50407627.html" title="Excelente Edificio en La Del. Cuauhtemoc (Morelos 20)">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/40/76/27/215x159/43883144.jpg" class="lazy foto-principal" alt="Excelente Edificio en La Del. Cuauhtemoc (Morelos 20)" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-la-del.-cuauhtemoc-morelos-20-50407627.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-la-del.-cuauhtemoc-morelos-20-50407627.html" title="EXCELENTE EDIFICIO EN LA DEL. CUAUHTEMOC (MORELOS 20)">Excelente Edificio en La Del. Cuauhtemoc (Morelos 20)</a></h4>
                                    <!-- Excelente Edificio en La Del. Cuauhte<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>4300</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 200</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50407627" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50407627" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50407627" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51409453" data-aviso="51409453">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-casa-en-venta-santa-monica-51409453.html" title="Excelente Casa en Venta, Santa Monica">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/40/94/53/215x159/44316242.jpg" class="lazy foto-principal" alt="Excelente Casa en Venta, Santa Monica" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-casa-en-venta-santa-monica-51409453.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-casa-en-venta-santa-monica-51409453.html" title="EXCELENTE CASA EN VENTA, SANTA MONICA">Excelente Casa en Venta, Santa Monica</a></h4>
                                    <!-- Excelente Casa en Venta, Santa Monica -->
                                    <ul class="post-content">
                                        <li><b>140</b> m² (<b>180</b> m² construidos)</li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>2</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 2,800,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51409453" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51409453" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51409453" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51224321" data-aviso="51224321">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/bodega-en-renta-av-presidente-juarez-tlalnepantla-51224321.html" title="Bodega en Renta Av Presidente Juárez, Tlalnepantla">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/22/43/21/215x159/41372924.jpg" class="lazy foto-principal" alt="Bodega en Renta Av Presidente Juárez, Tlalnepantla" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/bodega-en-renta-av-presidente-juarez-tlalnepantla-51224321.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/bodega-en-renta-av-presidente-juarez-tlalnepantla-51224321.html" title="Bodega en Renta Av. Presidente Juárez, Tlalnepantla">Bodega en Renta Av Presidente Juárez, Tlalnepantla</a></h4>
                                    <!-- Bodega en Renta Av Presidente Juárez,<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>3932</b> m² (<b>3468</b> m² construidos)</li>

                                        <li><b>10</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 260,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51224321" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51224321" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51224321" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50686920" data-aviso="50686920">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-miguel-hidalgo-50686920.html" title="Excelente Edificio en Miguel Hidalgo">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/68/69/20/215x159/43632727.jpg" class="lazy foto-principal" alt="Excelente Edificio en Miguel Hidalgo" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-miguel-hidalgo-50686920.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-miguel-hidalgo-50686920.html" title="Excelente Edificio en Miguel Hidalgo">Excelente Edificio en Miguel Hidalgo</a></h4>
                                    <!-- Excelente Edificio en Miguel Hidalgo -->
                                    <ul class="post-content">
                                        <li><b>10267</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 100</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50686920" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50686920" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50686920" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50686716" data-aviso="50686716">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-oficinas-en-cancun-50686716.html" title="Excelentes Oficinas en Cancún">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/68/67/16/215x159/43627722.jpg" class="lazy foto-principal" alt="Excelentes Oficinas en Cancún" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-oficinas-en-cancun-50686716.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-oficinas-en-cancun-50686716.html" title="EXCELENTES OFICINAS EN CANCÚN">Excelentes Oficinas en Cancún</a></h4>
                                    <!-- Excelentes Oficinas en Cancún -->
                                    <ul class="post-content">
                                        <li><b>4543</b> m² (<b>8964</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">U$D 22</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50686716" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50686716" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50686716" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50621883" data-aviso="50621883">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/local-atizapan-excelente-ubicacion%21-50621883.html" title="Local Atizapan Excelente Ubicación!">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/62/18/83/215x159/43883305.jpg" class="lazy foto-principal" alt="Local Atizapan Excelente Ubicación!" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/local-atizapan-excelente-ubicacion!-50621883.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/local-atizapan-excelente-ubicacion%21-50621883.html" title="Local Atizapan excelente ubicación!">Local Atizapan Excelente Ubicación!</a></h4>
                                    <!-- Local Atizapan Excelente Ubicación! -->
                                    <ul class="post-content">
                                        <li><b>640</b> m² (<b>425</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 200</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50621883" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50621883" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50621883" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51047959" data-aviso="51047959">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-oficinas-en-mayorazgo-del.-benito-juarez-51047959.html" title="Excelentes Oficinas en Mayorazgo Del. Benito Juarez">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/04/79/59/215x159/43883173.jpg" class="lazy foto-principal" alt="Excelentes Oficinas en Mayorazgo Del. Benito Juarez" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-oficinas-en-mayorazgo-del.-benito-juarez-51047959.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-oficinas-en-mayorazgo-del.-benito-juarez-51047959.html" title="EXCELENTES OFICINAS EN MAYORAZGO DEL. BENITO JUAREZ">Excelentes Oficinas en Mayorazgo Del. Benito Juarez</a></h4>
                                    <!-- Excelentes Oficinas en Mayorazgo Del<span class="elipsis">...</span>. -->
                                    <ul class="post-content">
                                        <li><b>4728</b> m² </li>

                                        <li><b>3</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 200</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51047959" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51047959" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51047959" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51076499" data-aviso="51076499">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/casa-en-vista-hermosa-con-918-m2-de-terreno-y-490-m2-51076499.html" title="Casa en Vista Hermosa con 918 m&amp;sup2; de Terreno y 490 m&amp;sup2; de Construccion">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/07/64/99/215x159/39140133.jpg" class="lazy foto-principal" alt="Casa en Vista Hermosa con 918 m&amp;sup2; de Terreno y 490 m&amp;sup2; de Construccion" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/casa-en-vista-hermosa-con-918-m2-de-terreno-y-490-m2-51076499.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/casa-en-vista-hermosa-con-918-m2-de-terreno-y-490-m2-51076499.html" title=" casa en Vista Hermosa con 918m2 de terreno y 490m2 de construccion">Casa en Vista Hermosa con 918 m² de Terreno y 490 m² de Construccion</a></h4>
                                    <!-- Casa en Vista Hermosa con 918 m&sup2;<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>918</b> m² (<b>490</b> m² construidos)</li>
                                        <li><b>4</b> Recamaras</li>
                                        <li><b>3</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 7,680,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51076499" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51076499" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51076499" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50861141" data-aviso="50861141">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-oficina-en-insurgentes-sur-50861141.html" title="Excelente Oficina en Insurgentes Sur">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/86/11/41/215x159/43883181.jpg" class="lazy foto-principal" alt="Excelente Oficina en Insurgentes Sur" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-oficina-en-insurgentes-sur-50861141.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-oficina-en-insurgentes-sur-50861141.html" title="EXCELENTE OFICINA EN INSURGENTES SUR">Excelente Oficina en Insurgentes Sur</a></h4>
                                    <!-- Excelente Oficina en Insurgentes Sur -->
                                    <ul class="post-content">
                                        <li><b>517</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 260</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50861141" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50861141" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50861141" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51196414" data-aviso="51196414">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/maravilloso-departamento-en-santa-fe-51196414.html" title="Maravilloso Departamento en Santa Fe">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/19/64/14/215x159/40971756.jpg" class="lazy foto-principal" alt="Maravilloso Departamento en Santa Fe" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/maravilloso-departamento-en-santa-fe-51196414.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/maravilloso-departamento-en-santa-fe-51196414.html" title="Maravilloso Departamento en Santa Fe">Maravilloso Departamento en Santa Fe</a></h4>
                                    <!-- Maravilloso Departamento en Santa Fe -->
                                    <ul class="post-content">
                                        <li><b>164</b> m² </li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>3</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 34,900</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51196414" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51196414" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51196414" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51158020" data-aviso="51158020">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/bodega-en-naucalpan-51158020.html" title="Bodega en Naucalpan">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/15/80/20/215x159/43826425.jpg" class="lazy foto-principal" alt="Bodega en Naucalpan" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/bodega-en-naucalpan-51158020.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/bodega-en-naucalpan-51158020.html" title="BODEGA EN NAUCALPAN">Bodega en Naucalpan</a></h4>
                                    <!-- Bodega en Naucalpan -->
                                    <ul class="post-content">
                                        <li><b>35165</b> m² (<b>38610</b> m² construidos)</li>

                                        <li><b>1</b> baño </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 80</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51158020" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51158020" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51158020" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51335981" data-aviso="51335981">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/oficinas-calz-mexico-xochimilco-51335981.html" title="Oficinas Calz Mexico Xochimilco">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/33/59/81/215x159/43883246.jpg" class="lazy foto-principal" alt="Oficinas Calz Mexico Xochimilco" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/oficinas-calz-mexico-xochimilco-51335981.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/oficinas-calz-mexico-xochimilco-51335981.html" title="Oficinas Calz Mexico Xochimilco">Oficinas Calz Mexico Xochimilco</a></h4>
                                    <!-- Oficinas Calz Mexico Xochimilco -->
                                    <ul class="post-content">
                                        <li><b>24000</b> m² </li>

                                        <li><b>10</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 280</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51335981" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51335981" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51335981" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51281013" data-aviso="51281013">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/oficinas-en-la-col.-doctores-51281013.html" title="Oficinas en La Col. Doctores">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/28/10/13/215x159/43632689.jpg" class="lazy foto-principal" alt="Oficinas en La Col. Doctores" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/oficinas-en-la-col.-doctores-51281013.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/oficinas-en-la-col.-doctores-51281013.html" title="Oficinas en la Col.Doctores">Oficinas en La Col. Doctores</a></h4>
                                    <!-- Oficinas en La Col. Doctores -->
                                    <ul class="post-content">
                                        <li><b>1000</b> m² (<b>1220</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 130</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51281013" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51281013" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51281013" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50724081" data-aviso="50724081">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-bodegas-en-mexicali-50724081.html" title="Excelentes Bodegas en Mexicali">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/72/40/81/215x159/43632800.jpg" class="lazy foto-principal" alt="Excelentes Bodegas en Mexicali" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-bodegas-en-mexicali-50724081.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-bodegas-en-mexicali-50724081.html" title="EXCELENTES BODEGAS EN MEXICALI">Excelentes Bodegas en Mexicali</a></h4>
                                    <!-- Excelentes Bodegas en Mexicali -->
                                    <ul class="post-content">
                                        <li><b>16306</b> m² (<b>7145</b> m² construidos)</li>

                                        <li><b>10</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 60</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50724081" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50724081" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50724081" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50686907" data-aviso="50686907">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-oficinas-en-del.-cuauhtemoc-morelos-20-50686907.html" title="Excelentes Oficinas en Del. Cuauhtemoc (Morelos 20)">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/68/69/07/215x159/43883156.jpg" class="lazy foto-principal" alt="Excelentes Oficinas en Del. Cuauhtemoc (Morelos 20)" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-oficinas-en-del.-cuauhtemoc-morelos-20-50686907.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-oficinas-en-del.-cuauhtemoc-morelos-20-50686907.html" title="EXCELENTES OFICINAS EN DEL. CUAUHTEMOC (MORELOS 20)">Excelentes Oficinas en Del. Cuauhtemoc (Morelos 20)</a></h4>
                                    <!-- Excelentes Oficinas en Del. Cuauhtemo<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>3240</b> m² (<b>4300</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 280</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50686907" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50686907" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50686907" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50082992" data-aviso="50082992">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/bodega-naucalpan-16-de-septiembre-50082992.html" title="Bodega Naucalpan 16 de Septiembre">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/08/29/92/215x159/43632761.jpg" class="lazy foto-principal" alt="Bodega Naucalpan 16 de Septiembre" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/bodega-naucalpan-16-de-septiembre-50082992.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/bodega-naucalpan-16-de-septiembre-50082992.html" title="Bodega naucalpan 16 de Septiembre">Bodega Naucalpan 16 de Septiembre</a></h4>
                                    <!-- Bodega Naucalpan 16 de Septiembre -->
                                    <ul class="post-content">
                                        <li><b>35165</b> m² (<b>38610</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 80</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50082992" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50082992" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50082992" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50081278" data-aviso="50081278">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-tecamachalco-50081278.html" title="Excelente Edificio en Tecamachalco">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/08/12/78/215x159/43826524.jpg" class="lazy foto-principal" alt="Excelente Edificio en Tecamachalco" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-tecamachalco-50081278.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-tecamachalco-50081278.html" title="EXCELENTE EDIFICIO EN TECAMACHALCO">Excelente Edificio en Tecamachalco</a></h4>
                                    <!-- Excelente Edificio en Tecamachalco -->
                                    <ul class="post-content">
                                        <li><b>185840</b> m² (<b>13870</b> m² construidos)</li>

                                        <li><b>10</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">U$D 25</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50081278" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50081278" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50081278" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50765508" data-aviso="50765508">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-mayorazgo-del.-benito-juarez-50765508.html" title="Excelente Edificio en Mayorazgo (Del. Benito Juarez)">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/76/55/08/215x159/43883136.jpg" class="lazy foto-principal" alt="Excelente Edificio en Mayorazgo (Del. Benito Juarez)" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-mayorazgo-del.-benito-juarez-50765508.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-mayorazgo-del.-benito-juarez-50765508.html" title="EXCELENTE EDIFICIO EN MAYORAZGO (DEL. BENITO JUAREZ)">Excelente Edificio en Mayorazgo (Del. Benito Juarez)</a></h4>
                                    <!-- Excelente Edificio en Mayorazgo (Del<span class="elipsis">...</span>. -->
                                    <ul class="post-content">
                                        <li><b>4728</b> m² </li>

                                        <li><b>5</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 200</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50765508" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50765508" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50765508" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50621844" data-aviso="50621844">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-locales-plaza-el-punto-queretaro-50621844.html" title="Excelentes Locales (Plaza El Punto Queretaro)">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/62/18/44/215x159/43883079.jpg" class="lazy foto-principal" alt="Excelentes Locales (Plaza El Punto Queretaro)" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-locales-plaza-el-punto-queretaro-50621844.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-locales-plaza-el-punto-queretaro-50621844.html" title="Excelentes Locales  (Plaza El Punto Queretaro)">Excelentes Locales (Plaza El Punto Queretaro)</a></h4>
                                    <!-- Excelentes Locales (Plaza El Punto Qu<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>11579</b> m² (<b>8046</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 5,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50621844" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50621844" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50621844" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51213746" data-aviso="51213746">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/casa-en-venta-colonia-jurica-queretaro-51213746.html" title="Casa en Venta Colonia Jurica Querétaro">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/21/37/46/215x159/41221178.jpg" class="lazy foto-principal" alt="Casa en Venta Colonia Jurica Querétaro" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/casa-en-venta-colonia-jurica-queretaro-51213746.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/casa-en-venta-colonia-jurica-queretaro-51213746.html" title="Casa en venta Colonia Jurica Querétaro">Casa en Venta Colonia Jurica Querétaro</a></h4>
                                    <!-- Casa en Venta Colonia Jurica Querétaro -->
                                    <ul class="post-content">
                                        <li><b>2220</b> m² (<b>780</b> m² construidos)</li>
                                        <li><b>4</b> Recamaras</li>
                                        <li><b>7</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 12,500,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51213746" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51213746" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51213746" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50724516" data-aviso="50724516">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-locales-en-el-estado-de-mexico-ojo-de-50724516.html" title="Excelentes Locales en El Estado de Mexico (Ojo de Agua)">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/72/45/16/215x159/43632588.jpg" class="lazy foto-principal" alt="Excelentes Locales en El Estado de Mexico (Ojo de Agua)" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-locales-en-el-estado-de-mexico-ojo-de-50724516.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-locales-en-el-estado-de-mexico-ojo-de-50724516.html" title="Excelentes Locales en el Estado de Mexico (Ojo de Agua)">Excelentes Locales en El Estado de Mexico (Ojo de Agua)</a></h4>
                                    <!-- Excelentes Locales en El Estado de Me<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>3248</b> m² (<b>1895</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 150</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50724516" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50724516" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50724516" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50979134" data-aviso="50979134">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/terreno-tepeapulco-cd-sahagun-hidalgo-ideal-50979134.html" title="Terreno Tepeapulco Cd Sahagun, Hidalgo Ideal Desarrollos">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/97/91/34/215x159/41131465.jpg" class="lazy foto-principal" alt="Terreno Tepeapulco Cd Sahagun, Hidalgo Ideal Desarrollos" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/terreno-tepeapulco-cd-sahagun-hidalgo-ideal-50979134.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/terreno-tepeapulco-cd-sahagun-hidalgo-ideal-50979134.html" title="Terreno Tepeapulco   Cd Sahagun, Hidalgo     Ideal Desarrollos">Terreno Tepeapulco Cd Sahagun, Hidalgo Ideal Desarrollos</a></h4>
                                    <!-- Terreno Tepeapulco Cd Sahagun, Hidalg<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>1640000</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 77,000,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50979134" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50979134" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50979134" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51342365" data-aviso="51342365">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/edificio-costera-miguel-aleman-acapulco-gro.-51342365.html" title="Edificio Costera Miguel Aleman Acapulco Gro.">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/34/23/65/215x159/43883294.jpg" class="lazy foto-principal" alt="Edificio Costera Miguel Aleman Acapulco Gro." height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/edificio-costera-miguel-aleman-acapulco-gro.-51342365.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/edificio-costera-miguel-aleman-acapulco-gro.-51342365.html" title="Edificio Costera Miguel Aleman Acapulco GRO.">Edificio Costera Miguel Aleman Acapulco Gro.</a></h4>
                                    <!-- Edificio Costera Miguel Aleman Acapul<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>1500</b> m² (<b>2000</b> m² construidos)</li>

                                        <li><b>5</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 42,000,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51342365" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51342365" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51342365" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51368065" data-aviso="51368065">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/bodega-en-renta-en-naucalpan-51368065.html" title="Bodega en Renta en Naucalpan">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/36/80/65/215x159/43616079.jpg" class="lazy foto-principal" alt="Bodega en Renta en Naucalpan" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/bodega-en-renta-en-naucalpan-51368065.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/bodega-en-renta-en-naucalpan-51368065.html" title="Bodega en renta en Naucalpan">Bodega en Renta en Naucalpan</a></h4>
                                    <!-- Bodega en Renta en Naucalpan -->
                                    <ul class="post-content">
                                        <li><b>1200</b> m² </li>

                                        <li><b>1</b> baño </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 110,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51368065" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51368065" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51368065" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50084186" data-aviso="50084186">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/plaza-venezia-leon-guanajuato-locales-disponibles%21-50084186.html" title="Plaza Venezia, León Guanajuato Locales Disponibles!">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/08/41/86/215x159/43632535.jpg" class="lazy foto-principal" alt="Plaza Venezia, León Guanajuato Locales Disponibles!" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/plaza-venezia-leon-guanajuato-locales-disponibles!-50084186.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/plaza-venezia-leon-guanajuato-locales-disponibles%21-50084186.html" title="Plaza Venezia, León Guanajuato Locales disponibles!">Plaza Venezia, León Guanajuato Locales Disponibles!</a></h4>
                                    <!-- Plaza Venezia, León Guanajuato Locale<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>17209</b> m² (<b>24071</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 180</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50084186" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50084186" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50084186" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51176504" data-aviso="51176504">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/bodega-en-lagos-de-moreno-51176504.html" title="Bodega en Lagos de Moreno">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/17/65/04/215x159/40686106.jpg" class="lazy foto-principal" alt="Bodega en Lagos de Moreno" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/bodega-en-lagos-de-moreno-51176504.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/bodega-en-lagos-de-moreno-51176504.html" title="Bodega en Lagos de Moreno">Bodega en Lagos de Moreno</a></h4>
                                    <!-- Bodega en Lagos de Moreno -->
                                    <ul class="post-content">
                                        <li><b>400</b> m² </li>

                                        <li><b>1</b> baño </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 3,000,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51176504" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51176504" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51176504" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50831701" data-aviso="50831701">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-oficina-plaza-polanco-50831701.html" title="Excelente Oficina Plaza Polanco">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/83/17/01/215x159/43632877.jpg" class="lazy foto-principal" alt="Excelente Oficina Plaza Polanco" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-oficina-plaza-polanco-50831701.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-oficina-plaza-polanco-50831701.html" title="EXCELENTE OFICINA PLAZA POLANCO">Excelente Oficina Plaza Polanco</a></h4>
                                    <!-- Excelente Oficina Plaza Polanco -->
                                    <ul class="post-content">
                                        <li><b>650</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">U$D 25</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50831701" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50831701" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50831701" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50082283" data-aviso="50082283">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-san-antonio-abad-50082283.html" title="Excelente Edificio en San Antonio Abad">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/08/22/83/215x159/43883309.jpg" class="lazy foto-principal" alt="Excelente Edificio en San Antonio Abad" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-san-antonio-abad-50082283.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-san-antonio-abad-50082283.html" title="EXCELENTE EDIFICIO EN SAN ANTONIO ABAD">Excelente Edificio en San Antonio Abad</a></h4>
                                    <!-- Excelente Edificio en San Antonio Abad -->
                                    <ul class="post-content">
                                        <li><b>1728</b> m² (<b>17074</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 280</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50082283" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50082283" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50082283" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50085930" data-aviso="50085930">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/locales-hipocampo-insurgentes-sur-50085930.html" title="Locales Hipocampo, Insurgentes Sur">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/08/59/30/215x159/43883071.jpg" class="lazy foto-principal" alt="Locales Hipocampo, Insurgentes Sur" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/locales-hipocampo-insurgentes-sur-50085930.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/locales-hipocampo-insurgentes-sur-50085930.html" title="LOCALES HIPOCAMPO, INSURGENTES SUR">Locales Hipocampo, Insurgentes Sur</a></h4>
                                    <!-- Locales Hipocampo, Insurgentes Sur -->
                                    <ul class="post-content">
                                        <li><b>4000</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 260</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50085930" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50085930" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50085930" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51342342" data-aviso="51342342">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/edificio-calz.-mexico-xochimilco-51342342.html" title="Edificio Calz. Mexico Xochimilco">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/34/23/42/215x159/43883276.jpg" class="lazy foto-principal" alt="Edificio Calz. Mexico Xochimilco" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/edificio-calz.-mexico-xochimilco-51342342.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/edificio-calz.-mexico-xochimilco-51342342.html" title="EDIFICIO CALZ. MEXICO XOCHIMILCO">Edificio Calz. Mexico Xochimilco</a></h4>
                                    <!-- Edificio Calz. Mexico Xochimilco -->
                                    <ul class="post-content">
                                        <li><b>24000</b> m² </li>

                                        <li><b>10</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 280</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51342342" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51342342" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51342342" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50724340" data-aviso="50724340">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-locales-en-cuautitlan-plaza-la-joya-50724340.html" title="Excelentes Locales en Cuautitlan (Plaza La Joya)">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/72/43/40/215x159/43883119.jpg" class="lazy foto-principal" alt="Excelentes Locales en Cuautitlan (Plaza La Joya)" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-locales-en-cuautitlan-plaza-la-joya-50724340.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-locales-en-cuautitlan-plaza-la-joya-50724340.html" title="Excelentes Locales en Cuautitlan (Plaza la Joya)">Excelentes Locales en Cuautitlan (Plaza La Joya)</a></h4>
                                    <!-- Excelentes Locales en Cuautitlan (Pla<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>50000</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 250</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50724340" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50724340" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50724340" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50082341" data-aviso="50082341">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-cd.-juarez-50082341.html" title="Excelente Edificio en Cd. Juarez">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/08/23/41/215x159/43632594.jpg" class="lazy foto-principal" alt="Excelente Edificio en Cd. Juarez" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-cd.-juarez-50082341.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-cd.-juarez-50082341.html" title="EXCELENTE EDIFICIO EN CD. JUAREZ">Excelente Edificio en Cd. Juarez</a></h4>
                                    <!-- Excelente Edificio en Cd. Juarez -->
                                    <ul class="post-content">
                                        <li><b>2976</b> m² (<b>4209</b> m² construidos)</li>

                                        <li><b>3</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 130</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50082341" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50082341" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50082341" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51214701" data-aviso="51214701">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/increible-precio%21-torre-nueva-2-recamaras-29.000-51214701.html" title="Increible Precio! Torre Nueva, 2 Recamaras, 29.000 Pesos!">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/21/47/01/215x159/43120669.jpg" class="lazy foto-principal" alt="Increible Precio! Torre Nueva, 2 Recamaras, 29.000 Pesos!" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/increible-precio!-torre-nueva-2-recamaras-29.000-51214701.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/increible-precio%21-torre-nueva-2-recamaras-29.000-51214701.html" title="INCREIBLE PRECIO!!! TORRE NUEVA, 2 RECAMARAS, 29.000 PESOS!">Increible Precio! Torre Nueva, 2 Recamaras, 29.000 Pesos!</a></h4>
                                    <!-- Increible Precio! Torre Nueva, 2 Reca<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>118</b> m² </li>
                                        <li><b>2</b> Recamaras</li>
                                        <li><b>3</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 29,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51214701" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51214701" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51214701" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51336357" data-aviso="51336357">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-paseo-montejo-merida-yucatan-51336357.html" title="Excelente Edificio en Paseo Montejo Merida Yucatan">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/33/63/57/215x159/43883268.jpg" class="lazy foto-principal" alt="Excelente Edificio en Paseo Montejo Merida Yucatan" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-paseo-montejo-merida-yucatan-51336357.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-paseo-montejo-merida-yucatan-51336357.html" title="EXCELENTE EDIFICIO EN PASEO MONTEJO MERIDA YUCATAN">Excelente Edificio en Paseo Montejo Merida Yucatan</a></h4>
                                    <!-- Excelente Edificio en Paseo Montejo M<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>2000</b> m² </li>

                                        <li><b>5</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 300,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51336357" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51336357" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51336357" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50687042" data-aviso="50687042">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-locales-en-plaza-venecia-leon.-gto-50687042.html" title="Excelentes Locales en Plaza Venecia Leon. Gto">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/68/70/42/215x159/43883095.jpg" class="lazy foto-principal" alt="Excelentes Locales en Plaza Venecia Leon. Gto" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-locales-en-plaza-venecia-leon.-gto-50687042.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-locales-en-plaza-venecia-leon.-gto-50687042.html" title="EXCELENTES LOCALES EN  PLAZA VENECIA LEON.GTO">Excelentes Locales en Plaza Venecia Leon. Gto</a></h4>
                                    <!-- Excelentes Locales en Plaza Venecia L<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>17000</b> m² (<b>24071</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 180</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50687042" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50687042" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50687042" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50084147" data-aviso="50084147">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-cancun-50084147.html" title="Excelente Edificio en Cancún">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/08/41/47/215x159/43632891.jpg" class="lazy foto-principal" alt="Excelente Edificio en Cancún" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-cancun-50084147.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-cancun-50084147.html" title="EXCELENTE EDIFICIO EN CANCÚN">Excelente Edificio en Cancún</a></h4>
                                    <!-- Excelente Edificio en Cancún -->
                                    <ul class="post-content">
                                        <li><b>4543</b> m² (<b>8964</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">U$D 22</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50084147" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50084147" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50084147" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51417100" data-aviso="51417100">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/terreno-prolong.-av-el-jacal-corregidora-qro.-51417100.html" title="Terreno Prolong. Av El Jacal, Corregidora, Qro.">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/41/71/00/215x159/44441009.jpg" class="lazy foto-principal" alt="Terreno Prolong. Av El Jacal, Corregidora, Qro." height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/terreno-prolong.-av-el-jacal-corregidora-qro.-51417100.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/terreno-prolong.-av-el-jacal-corregidora-qro.-51417100.html" title="Terreno Prolong. Av. El Jacal, Corregidora, Qro.">Terreno Prolong. Av El Jacal, Corregidora, Qro.</a></h4>
                                    <!-- Terreno Prolong. Av El Jacal, Corregi<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>27000</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 40,500,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51417100" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51417100" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51417100" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51336342" data-aviso="51336342">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-en-paseo-montejo-merida-yucatan-51336342.html" title="Excelente Edificio en Paseo Montejo Merida Yucatan">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/33/63/42/215x159/43883260.jpg" class="lazy foto-principal" alt="Excelente Edificio en Paseo Montejo Merida Yucatan" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-en-paseo-montejo-merida-yucatan-51336342.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-en-paseo-montejo-merida-yucatan-51336342.html" title="EXCELENTE EDIFICIO EN PASEO MONTEJO MERIDA YUCATAN">Excelente Edificio en Paseo Montejo Merida Yucatan</a></h4>
                                    <!-- Excelente Edificio en Paseo Montejo M<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>2000</b> m² </li>

                                        <li><b>5</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 300,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51336342" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51336342" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51336342" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50921956" data-aviso="50921956">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/-plaza-el-campestre-brindamos-seguridad-en-necesidad-50921956.html" title="&quot;Plaza El Campestre&quot; Brindamos Seguridad en Necesidad Comercial">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/92/19/56/215x159/40828531.jpg" class="lazy foto-principal" alt="&quot;Plaza El Campestre&quot; Brindamos Seguridad en Necesidad Comercial" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/-plaza-el-campestre-brindamos-seguridad-en-necesidad-50921956.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/-plaza-el-campestre-brindamos-seguridad-en-necesidad-50921956.html" title="&quot;PLAZA EL CAMPESTRE&quot; Brindamos seguridad en necesidad comercial">"Plaza El Campestre" Brindamos Seguridad en Necesidad Comercial</a></h4>
                                    <!-- "Plaza El Campestre" Brindamos Seguri<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>63</b> m² </li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 2,904,443</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50921956" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50921956" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50921956" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50740416" data-aviso="50740416">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-oficinas-en-cd-juarez-50740416.html" title="Excelentes Oficinas en Cd Juarez">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/74/04/16/215x159/43632640.jpg" class="lazy foto-principal" alt="Excelentes Oficinas en Cd Juarez" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-oficinas-en-cd-juarez-50740416.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-oficinas-en-cd-juarez-50740416.html" title="EXCELENTES OFICINAS EN CD JUAREZ">Excelentes Oficinas en Cd Juarez</a></h4>
                                    <!-- Excelentes Oficinas en Cd Juarez -->
                                    <ul class="post-content">
                                        <li><b>4000</b> m² (<b>4209</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 130</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50740416" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50740416" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50740416" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50724205" data-aviso="50724205">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-bodega-en-mexicali-b.-c-50724205.html" title="Excelente Bodega en Mexicali B. C">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/72/42/05/215x159/43632823.jpg" class="lazy foto-principal" alt="Excelente Bodega en Mexicali B. C" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-bodega-en-mexicali-b.-c-50724205.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-bodega-en-mexicali-b.-c-50724205.html" title="EXCELENTE BODEGA EN MEXICALI B.C">Excelente Bodega en Mexicali B. C</a></h4>
                                    <!-- Excelente Bodega en Mexicali B. C -->
                                    <ul class="post-content">
                                        <li><b>13000</b> m² (<b>7000</b> m² construidos)</li>


                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 50</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50724205" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50724205" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50724205" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50673248" data-aviso="50673248">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-edificio-plaza-polanco-50673248.html" title="Excelente Edificio Plaza Polanco">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/67/32/48/215x159/43632837.jpg" class="lazy foto-principal" alt="Excelente Edificio Plaza Polanco" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-edificio-plaza-polanco-50673248.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-edificio-plaza-polanco-50673248.html" title="EXCELENTE EDIFICIO PLAZA POLANCO">Excelente Edificio Plaza Polanco</a></h4>
                                    <!-- Excelente Edificio Plaza Polanco -->
                                    <ul class="post-content">
                                        <li><b>650</b> m² </li>

                                        <li><b>2</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">U$D 25</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50673248" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50673248" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50673248" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-50621739" data-aviso="50621739">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelentes-oficinas-en-miguel-hidalgo-50621739.html" title="Excelentes Oficinas en Miguel Hidalgo">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/50/62/17/39/215x159/43632564.jpg" class="lazy foto-principal" alt="Excelentes Oficinas en Miguel Hidalgo" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelentes-oficinas-en-miguel-hidalgo-50621739.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-oficinas-en-miguel-hidalgo-50621739.html" title="EXCELENTES OFICINAS EN Miguel Hidalgo">Excelentes Oficinas en Miguel Hidalgo</a></h4>
                                    <!-- Excelentes Oficinas en Miguel Hidalgo -->
                                    <ul class="post-content">
                                        <li><b>10267</b> m² </li>

                                        <li><b>10</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 140</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50621739" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50621739" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50621739" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slideee">
                        <ul class="grid-posts unstyled">
                            <li class="post post-destacado " id="aviso-51323629" data-aviso="51323629">
                                <label class="post-action post-action-check"><input checked="checked" type="checkbox"></label>
                                <div class="post-thumb">
                                    <a href="/propiedades/excelente-departamento-en-palmas-hills-interlomas-51323629.html" title="Excelente Departamento en Palmas Hills Interlomas">
                                        <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/avisos/18/00/51/32/36/29/215x159/42907478.jpg" class="lazy foto-principal" alt="Excelente Departamento en Palmas Hills Interlomas" height="100%" width="100%">
                                    </a>

                                    <!--<a href="/propiedades/excelente-departamento-en-palmas-hills-interlomas-51323629.html?verTelefono=true" class="contact-mail visible-phone"><i class="heart fa fa-envelope"></i></a>-->



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-departamento-en-palmas-hills-interlomas-51323629.html" title="Excelente departamento en Palmas Hills Interlomas">Excelente Departamento en Palmas Hills Interlomas</a></h4>
                                    <!-- Excelente Departamento en Palmas Hill<span class="elipsis">...</span> -->
                                    <ul class="post-content">
                                        <li><b>258</b> m² </li>
                                        <li><b>3</b> Recamaras</li>
                                        <li><b>3</b> baños </li>
                                    </ul>
                                    <div data-lt-model="usuario" data-lt-bind="{nombre:&quot;text&quot;}">

                                    </div>
                                    <div class="post-price">
                                        <span class="precio-valor ">MN 5,500,000</span>


                                    </div>

                                </div>
                                <div class="post-actions-wrap">
                                    <div class="post-actions">
                                        <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51323629" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                        <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51323629" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                        <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51323629" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="slidee-buttons">
                <button class="btn btn-large prev"><i class="ticon ticon-prev"></i> Anterior</button>
                <button class="btn btn-large next">Siguiente <i class="ticon ticon-next"></i></button>
            </div>

        </div>
    </div>
</div>




<div class="section-ciudades">
    <div class="container">
        <h3 class="h1">Propiedades por ciudad <small><a href="/inmuebles.html" title="Propiedades por ciudad">Ver todas</a></small></h3>
        <div class="row unstyled">
            <div class="span8">
                <div class="box">
                    <div class="box-thumb">
                        <a href="/inmuebles-en-monterrey.html"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/css/img/ciudades_monterey.jpg" class="lazyFoot" alt="Monterrey" height="94" width="264"></a>
                    </div>
                    <div class="box-info">
                        <h3 class="box-title"><a href="/inmuebles-en-monterrey.html">Monterrey</a></h3>
                        <ul class="box-content">
                            <li><a href="/departamentos-en-venta-en-monterrey.html">Departamentos en venta en Monterrey</a></li>
                            <li><a href="/departamentos-en-renta-en-monterrey.html">Departamentos en renta en Monterrey</a></li>
                            <li><a href="/casas-en-venta-en-monterrey.html">Casas en venta en Monterrey</a></li>
                            <li><a href="/casas-en-renta-en-monterrey.html">Casas en renta en Monterrey</a></li>
                            <li><a href="/locales-comerciales-en-renta-en-monterrey.html">Locales Comerciales en renta en Monterrey</a></li>
                            <li><a href="/oficinas-en-renta-en-monterrey.html">Oficinas en renta en Monterrey</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span8">
                <div class="box">
                    <div class="box-thumb">
                        <a href="/inmuebles-en-miguel-hidalgo.html"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/css/img/ciudades_miguelhidalgo.jpg" class="lazyFoot" alt="Miguel Hidalgo" height="94" width="264"></a>
                    </div>
                    <div class="box-info">
                        <h3 class="box-title"><a href="/inmuebles-en-miguel-hidalgo.html">Miguel Hidalgo</a></h3>
                        <ul class="box-content">
                            <li><a href="/departamentos-en-venta-en-miguel-hidalgo.html">Departamentos en venta en Miguel Hidalgo</a></li>
                            <li><a href="/departamentos-en-renta-en-miguel-hidalgo.html">Departamentos en renta en Miguel Hidalgo</a></li>
                            <li><a href="/casas-en-venta-en-miguel-hidalgo.html">Casas en venta en Miguel Hidalgo</a></li>
                            <li><a href="/casas-en-renta-en-miguel-hidalgo.html">Casas en renta en Miguel Hidalgo</a></li>
                            <li><a href="/locales-comerciales-en-renta-en-miguel-hidalgo.html">Locales Comerciales en renta en Miguel Hidalgo</a></li>
                            <li><a href="/oficinas-en-renta-en-miguel-hidalgo.html">Oficinas en renta en Miguel Hidalgo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span8">
                <div class="box">
                    <div class="box-thumb">
                        <a href="/inmuebles-en-huixquilucan.html"><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="http://akstatic.inmuebles24.com/css/img/ciudades_huixquilucan.jpg" class="lazyFoot" alt="Huixquilucan" height="94" width="264"></a>
                    </div>
                    <div class="box-info">
                        <h3 class="box-title"><a href="/inmuebles-en-huixquilucan.html">Huixquilucan</a></h3>
                        <ul class="box-content">
                            <li><a href="/departamentos-en-venta-en-huixquilucan.html">Departamentos en venta en Huixquilucan</a></li>
                            <li><a href="/departamentos-en-renta-en-huixquilucan.html">Departamentos en renta en Huixquilucan</a></li>
                            <li><a href="/casas-en-venta-en-huixquilucan.html">Casas en venta en Huixquilucan</a></li>
                            <li><a href="/casas-en-renta-en-huixquilucan.html">Casas en renta en Huixquilucan</a></li>
                            <li><a href="/locales-comerciales-en-renta-en-huixquilucan.html">Locales Comerciales en renta en Huixquilucan</a></li>
                            <li><a href="/oficinas-en-renta-en-huixquilucan.html">Oficinas en renta en Huixquilucan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<script type="text/javascript" src="<?php  echo base_url()?>resources/pagina/plugin4.js" defer="defer"></script>





<!--este es el footer visible-->
<div class="contenedor-footer footer-oculto">
    <div class="footer-visible">

        <button class="js-show-footer display-buttom"><i class="fa fa-chevron-down fa-2x"></i></button>


        <!--data fiscal-->

        <div class="social-icons">
            <span class="siga-nos">Síguenos</span>
            <a href="https://twitter.com/inmuebles24" rel="nofollow" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="http://instagram.com/inmuebles24" rel="nofollow" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="https://www.facebook.com/inmuebles24.com.mx" rel="nofollow" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
            <a href="https://plus.google.com/+Inmuebles24/posts" rel="nofollow" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>

            <span class="copyright-text">© Copyright 2016</span>
        </div>
    </div>

    <!--este es la parte desplegable del footer-->
    <div class="footer-desplegable" style="background: #fff;">
        <div class="footer-content clearfix">
            <div class="container">
                <div class="footer-options">
                    <ul>
                        <li>
                            <a title="Busca inmuebles en tu Android" href="https://play.google.com/store/apps/details?id=com.navent.realestate.inmuebles24&amp;referrer=utm_source%3DWebSite%26utm_medium%3DfooterText%26utm_term%3Dinstalls%26utm_content%3Dfooter%26utm_campaign%3DfooterLink">
                                Descarga la app Android
                            </a>
                        </li>
                        <li>
                            <a title="Busca inmuebles en tu iPhone" href="https://click.google-analytics.com/redirect?tid=UA-10030475-5&amp;url=https%3A%2F%2Fitunes.apple.com%2Fmx%2Fapp%2Finmuebles24%2Fid643973960&amp;aid=com.navent.realestate.inmuebles24&amp;idfa=id643973960&amp;cs=WebSite&amp;cm=footerText&amp;cn=footerLink&amp;cc=footer&amp;ck=installs">
                                Descarga la app iPhone
                            </a>
                        </li>
                        <li><a href="http://m.inmuebles24.com/" rel="alternate" class="visible-phone">Versión móvil</a> </li>

                        <li>
                            <a href="/inmuebles.html">
                                Inmuebles
                                <span> en México</span>







                            </a>
                        </li>
                        <li>
                            <a href="/publicar.bum" rel="nofollow">Publicar tu Inmueble</a>
                        </li>


                        <li><a href="/contacto.bum" rel="nofollow">Contacto</a></li>
                        <li><a href="/panel.bum" rel="nofollow">Regístrate</a></li>
                    </ul>
                </div>

                <div class="search-options">
                    <ul>

                        <li><a href="http://www.adondevivir.com/" title="Inmuebles en Perú">Buscar inmuebles en Perú</a></li>
                        <li><a href="http://www.conlallave.com/" title="Bienes raíces en Venezuela">Buscar inmuebles en Venezuela</a></li>
                        <li><a href="http://www.plusvalia.com/" title="Inmuebles en Ecuador">Buscar inmuebles en Ecuador</a></li>
                        <li><a href="http://www.compreoalquile.com/" title="Propiedades en Panamá">Buscar inmuebles en Panamá</a></li>
                        <li><a href="http://www.zonaprop.com.ar/" title="Inmuebles en Argentina">Buscar inmuebles en Argentina</a></li>
                        <li><a href="http://www.compreoalquile.co.cr/" title="Inmuebles en Costa Rica">Buscar inmuebles en Costa Rica</a></li>
                        <li><a href="http://www.inmuebles24.co/" title="Inmuebles en Colombia">Buscar inmuebles en Colombia</a></li>
                        <li><a href="http://www.imovelweb.com/" title="Propiedades en Brasil">Buscar inmuebles en Brasil</a></li>
                        <li><a href="http://www.zonaprop.com.ar/uruguay" title="Propiedades en Uruguay">Buscar propiedades en Uruguay</a></li>
                    </ul>
                </div>





                <div class="footer-legal">
                    <ul>
                        <li><a href="/terminos.bum">Términos y condiciones</a></li>

                        <li><a href="/politicas.bum">Política de Privacidad</a></li>








                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.contenedor-footer').addClass('footer-oculto');

        $('button.js-show-footer').on('click', function(e){
            e.preventDefault();
            $('.contenedor-footer').toggleClass('footer-oculto');
            if(!$('.contenedor-footer').hasClass('footer-oculto')){
                scrollToElemnt('.footer-options',600);
            }
        });
    });
</script>




<div class="_templates">
    <div class="form-login-wrap" id="formLoginEmergente" style="margin:0 auto;"><div class="form-login">
            <form id="login">
                <div class="login-campos clearfix">
                    <h4>Ingresar a mi cuenta</h4>
                    <label for="username" class="ico-input label-block"><i class="ticon ticon-user"></i>
                        <input class="unido-top input-block" id="usuario.email" name="username" placeholder="usuario / e-mail" type="text">
                    </label>
                    <label for="password" class="ico-input label-block"><i class="ticon ticon-lock"></i>
                        <input class="unido-bottom input-block" id="usuario.password" name="password" placeholder="contraseña" type="password">
                    </label>
                    <p><input class="btn btn-primary btn-large btn-block" value="Iniciar sesión" type="submit"></p>
                    <label class="pull-left"><input id="recordarme" name="recordarme" type="checkbox"> Recordarme</label>
                    <label class="pull-right"><a href="#" class="recuperar-pw">Recuperar mi contraseña</a></label>
                </div>
            </form>
            <form id="registracion" class="cerrado" style="display:none">
                <div class="registracion-campos">
                    <h4>Nuevo usuario</h4>
                    <label for="tipoUsuario" class="label-block">
                        <div class="input-select">
                            <select tabindex="2" class="input-block" id="tipoUsuario" name="tipoUsuario">
                                <option selected="selected" value="0">Tipo de usuario</option>
                                <option value="1">Usuario particular</option>
                                <option value="2">Inmobiliaria</option>
                                <option value="3">Constructora</option>
                                <option value="4">Corredor</option>
                            </select>
                        </div>
                    </label>
                    <label for="email" class="ico-input label-block"><i class="ticon ticon-mail"></i>
                        <input class="input-block" id="e-mail" name="email" placeholder="e-mail" type="email">
                    </label>
                    <label for="password" class="ico-input label-block"><i class="ticon ticon-lock"></i>
                        <input class="input-block" id="password" name="password" placeholder="contraseña" type="password">
                        <div class="switch switch-on" title="Mostrar contraseña">
                            <a href="#" class="btn-switch">|||</a>
                            <span class="on">ABC</span>
                            <span class="off">•••</span>
                        </div>
                    </label>
                    <label for="nombre" class="label-block oculto">
                        <input class="input-block" id="nombre" name="nombre" placeholder="Nombre" type="text">
                    </label>
                    <label for="cuit" class="label-block oculto">
                        <input class="input-block" id="cuit" name="cuit" placeholder="RFC" type="text">
                    </label>
                    <label for="telefono" class="label-block oculto">
                        <input class="input-block" id="telefono" name="telefono" placeholder="Teléfono" type="text">
                    </label>

                    <label for="celNumero" class="label-block"><input class="input-block" id="celNumero" name="celNumero" placeholder="Teléfono móvil" type="text"></label>
                    <p><input class="btn btn-primary btn-large btn-block registrarme" value="Registrarme" type="submit"></p>
                    <small>Al hacer click en "Registrarme" aceptas los <a href="/terminos.bum" target="_blank">términos y condiciones</a></small>
                </div>
            </form>
            <div class="switch-login clearfix" style="display:none">
                <h4>Ya tengo una cuenta</h4>
                <a href="#" class="btn btn-block" id="btn-login">Iniciar sesión</a>
            </div>
            <div class="switch-registracion clearfix">
                <h4>No estoy registrado</h4>
                <a href="#" class="btn btn-block" id="btn-registracion">Registrarme</a>
            </div>
        </div>
        <div class="form-recuperar hide">
            <form id="recuperar" class="clearfix">
                <h4>Recuperar mi contraseña</h4>
                <label for="recpwd.email" class="ico-input label-block">
                    <i class="ticon ticon-user"></i>
                    <input class="unido-top input-block" id="recpwd.email" name="recpwd.email" placeholder="usuario / e-mail" type="text">
                </label>
                <p><input class="btn btn-primary btn-large btn-block" value="Enviar" data-action="recuperarpwd" type="submit"></p>
                <label class="pull-right"><a href="#" class="volver-login">Volver</a></label>
            </form>
        </div>
        <style>
            #recaptcha_area{margin:0 auto}
            #recaptcha_area, #recaptcha_table { line-height: 0!important;}
            #recaptcha_response_field { height: 25px!important; border-radius:3px;}
        </style>

        <script type="text/javascript" src="<?php echo base_url()?>resources/pagina/recaptcha_ajax.js"></script>

        <!-- Wrapping the Recaptcha create method in a javascript function -->
        <script type="text/javascript">
            function showRecaptcha(element, selectByThisClass) {
                Recaptcha.create('6LfavfISAAAAAIkTO--MYJx7StUG0EYR3D5TjlpO', element, {
                    theme : 'white',
                    custom_theme_widget: '',
                    callback: Recaptcha.focus_response_field});
                if (selectByThisClass){
                    $("#submit-captcha").addClass(selectByThisClass);
                }
            }

            function recaptchaUrlParameter(){
                return "recaptcha_challenge_field=" + Recaptcha.get_challenge() + "&recaptcha_response_field=" + Recaptcha.get_response();
            }

        </script>

        <div class="captcha-wrapper hide">
            <div id="id-div-captcha" class="modal">
                <div class="modal-header">
                    <p class="h3 no-margin">Complete el siguiente texto para continuar.</p>
                </div>
                <div class="modal-body">
                    <div id="recaptcha_div" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;">

                    </div>
                    <p id="id-captcha-error" class="oculto error">El texto ingresado no coincide, intente de nuevo</p>
                </div>
                <div class="modal-footer">
                    <form id="submit-captcha" class="clearfix no-margin">
                        <button class="btn btn-primary btn-large btn-block no-margin" type="submit">Continuar</button>
                        <input id="id-captcha-hidden-data" value="" type="hidden">
                    </form>
                </div>
            </div>
        </div></div>
</div>