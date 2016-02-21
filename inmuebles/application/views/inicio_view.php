<!DOCTYPE html>
<html>
<head>
    <title>Inmuebles</title>

    <?php echo $includes; ?>

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

<div class="section-search lazyBg " style="background-image: url(&quot;http://akstatic.inmuebles24.com/css/img/home-img-2.jpg&quot;); background-size: cover; max-width: 100%; height: calc(100% - 55px);">

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
                    </div>

                    <div class="searchbox-submit">
                        <button type="submit" id="submitBtn" class="btn btn-xlarge btn-block btn-primary">Buscar</button>
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
    <h3 class="h1">
        Propiedades destacadas en México
        <small>
            <a href="/inmuebles.html" title="Propiedades destacadas en México">Ver todas</a>
        </small>
    </h3>

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

<?php echo $footer; ?>

</body>
</html>
