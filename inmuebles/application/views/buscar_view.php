<!DOCTYPE html>
<html>
<head>
    <title>Buscar</title>

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

<body id="listado" class="Mexico panel-usuario" itemscope="" itemtype="">
<header class="header  -home clearfix oculto-print" style="background: rgba(100, 174, 227, 0.9) none repeat scroll 0 0">
    <div class="container">
        <!--LOGO-->
        <div class="logo-header-wrap" style="width: 100px;">
            <a href="http://www.inmuebles24.com/" title="Inmuebles24.com" class="logo-header inmuebles24  "></a>
        </div>

        <div class="header-searchbox-wrap">
            <div style="position: relative; width: 100%">
                <div style="float: left; margin-right: 15px;"><input type="text" name="search" placeholder="Busca tu inmueble" style="width: 990px; margin-top: 0px;"></div>
                <div style="float: left; margin-top: 2px;"><button data-url-destino="#" data-action="buscar" class="btn btn-noframe">Buscar</button></div>
            </div>
        </div>
    </div>
</header>



<div class="content">
    <div class="container">
        <div class="row">
            <div class="span24" itemprop="breadcrumb">
                <ul class="breadcrumb pull-left oculto-print">
                    <li><a href="http://www.inmuebles24.com/">Inmuebles24</a><span class="divider"></span></li>
                    <li><span>Todos los inmuebles</span></li>
                </ul>
            </div>

            <!-- MAIN -->
            <div class="span19 pull-right main">

                <!-- banner ZP -->
                <!-- banner ZP -->

                <!-- NAV-->
                <div class="clearfix">
                    <h1 class="pull-left h2">
                        <span id="id-resultado-busqueda">114</span> Propiedades e inmuebles más baratos que contenga "renta iztapalapa" en México
                    </h1>
                    <div class="pull-right acciones-listado">



                            <span class="dropdown-orden">
                            	<span class="hidden-old-desktop hidden-phone hidden-tablet">Ordenar por:</span>
                            </span>
                        <div class="btn-group dropdown-orden">
                            <a class="btn dropdown-toggle btn-small" rel="nofollow" href="#">Menor precio <span class="caret"></span></a>
                            <ul class="dropdown-menu" style="left:inherit;right:0;">
                                <li><a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-descendente-busquedaext-renta-iztapalapa.html">Mayor precio</a></li>
                                <li><a href="http://www.inmuebles24.com/inmuebles-busquedaext-renta-iztapalapa.html">Relevancia</a></li>
                                <li><a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precioxm2-ascendente-busquedaext-renta-iztapalapa.html">Menor precio por m²</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="section-listado" id="vistaList">
                    <div class="clearfix">
                        <ul class="list-posts unstyled clearfix">
                            <li class="post      simple" id="aviso-50861126" data-aviso="50861126" data-href="/propiedades/bodega-en-renta-col.-guadalupe-del-moral-del.-50861126.html">
                                <div class="post-pic">
                                    <span class="post-destacado">Desarrollo</span>
                                    <!-- INSERT SLIDER BEG-->
                                    <div style="height: 200px;" class="royalSlider rsDefault slideme rsHor rs-ld">
                                        <div style="width: 280px; height: 200px;" class="rsOverflow">
                                            <div style="transition-duration: 0s; transform: translate3d(0px, 0px, 0px);" class="rsContainer">
                                                <div style="left: 0px;" class="rsSlide ">
                                                    <div style="visibility: visible; opacity: 1; transition: opacity 400ms ease-in-out 0s;" class="rsContent" data-id="36113560">
                                                        <img style="width: 280px; height: 200px; margin-left: 0px; margin-top: 0px;" class="rsImg rsMainSlideImage" src="<?php echo base_url() ?>resources/images/36113560.jpg">
                                                    </div>
                                                </div>
                                                <div style="left: 288px;" class="rsSlide ">
                                                    <div class="rsContent" data-id="36113561">
                                                        <img style="width: 280px; height: 200px; margin-left: 0px; margin-top: 0px;" class="rsImg rsMainSlideImage" src="<?php echo base_url() ?>resources/images/36113560.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display: block;" class="rsArrow rsArrowLeft rsArrowDisabled">
                                                <div class="rsArrowIcn"></div>
                                            </div>
                                            <div style="display: block;" class="rsArrow rsArrowRight">
                                                <div class="rsArrowIcn"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- INSERT SLIDER END -->
                                </div>

                                <div class="post-text">
                                    <div class="post-text-desc">
                                        <div>
                                            <h4 class="post-title"><a href="http://www.inmuebles24.com/propiedades/bodega-en-renta-col.-guadalupe-del-moral-del.-50861126.html" title="Bodega en Renta, Col. Guadalupe del Moral, Del. iztapalapa">Bodega en Renta, Col. Guadalupe del Moral, Del. Iztapalapa</a></h4>
                                            <p>
                                                Bodega Comercial en renta con excelente ubicación, a
                                                una cuadra de rojo gomez y el eje 6, cerca de la central de abasto, de
                                                1,075m2 y otra de 378m2 se pueden rentar juntas o por separado en $ 100
                                                por m2, Visítelas.
                                            </p>
                                            <a href="http://www.inmuebles24.com/propiedades/bodega-en-renta-col.-guadalupe-del-moral-del.-50861126.html" title="Bodega en Renta, Col. Guadalupe del Moral, Del. Iztapalapa" class="post-link">ver detalles</a>
                                        </div>
                                    </div>

                                    <div class="post-text-pay">
                                        <ul class="misc unstyled">
                                            <li class="misc-m2totales">1075 m²<span>totales</span></li>
                                            <li class="misc-banos">2<span>baños</span></li>
                                        </ul>
                                        <div>
                                            <p class="price"><span> MN 100</span></p>

                                            <div class="buttons">
                                                <!-- bt fav state on -->
                                                <button class="btn ticon-heart-empty" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="50861126" data-loading-text="...">
                                                    <span class="hide">Marcar como favorito</span>
                                                </button>
                                                <!-- bt fav state off -->
                                                <button class="hide btn ticon-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="50861126" data-loading-text="...">
                                                    <span class="hide">Quitar de favoritos</span>
                                                </button>
                                                <!-- bt contact -->
                                                <button class="btn btn-primary btn-large js-contact" data-aviso-id="50861126">
                                                    <i class="ticon-phone"></i>
                                                    Contactar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="pagination pagination-centered">
                        <ul>
                            <li class="pagination-action-prev disabled"><a href="#" rel="prev"><i class="ticon ticon-prev"></i><span>&nbsp;Anterior</span></a></li>
                            <li class="active"><a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html">1</a></li>
                            <li><a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa-pagina-2.html">2</a></li>
                            <li><a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa-pagina-3.html">3</a></li>
                            <li><a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa-pagina-4.html">4</a></li>
                            <li><a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa-pagina-5.html">5</a></li>
                            <li class="pagination-action-next "><a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa-pagina-2.html" rel="next"><span>Siguiente&nbsp;</span><i class="ticon ticon-next"></i></a></li>
                        </ul>
                    </div>

                </div>
                <div class="section-listado oculto" id="map">
                    <div id="overlaymessage" class="map-loader-wrap">
                        <div class="map-loader"><i class="loader-img"></i>Cargando</div>
                    </div>
                    <div id="map_canvas"></div>
                </div>
                <!-- BANNERS -->
            </div>

            <!-- FILTERS -->
            <div class="span5 pull-left">

                <div class="section-appliedfilters">
                    <h4>Filtros aplicados</h4>
                    <div class="list list-closeable list-style-a">
                        <ul>
                            <li><h2>renta iztapalapa</h2> <a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-ascendente.html">×</a></li>
                        </ul>
                    </div>
                </div>


                <div class="section-filters">
                    <div class="nav-collapsible" data-ui-collapsible="">
                        <ul>
                            <li class="padre  ">
                                <div class="a-title"><h4>Estado</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li><a href="http://www.inmuebles24.com/inmuebles-en-distrito-federal-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Distrito Federal (76)" data-url-list="/inmuebles-en-distrito-federal-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-distrito-federal-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Distrito Federal <span>(76)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-en-jalisco-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Jalisco (11)" data-url-list="/inmuebles-en-jalisco-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-jalisco-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Jalisco <span>(11)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-en-puebla-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Puebla (10)" data-url-list="/inmuebles-en-puebla-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-puebla-provincia-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Puebla <span>(10)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-en-edo.-de-mexico-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Edo. de México (6)" data-url-list="/inmuebles-en-edo.-de-mexico-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-edo.-de-mexico-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Edo. de México <span>(6)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-en-veracruz-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Veracruz (3)" data-url-list="/inmuebles-en-veracruz-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-veracruz-provincia-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Veracruz <span>(3)</span></a></li>

                                        <li class="padre cerrado">
                                            <ul>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-en-guanajuato-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Guanajuato (1)" data-url-list="/inmuebles-en-guanajuato-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-guanajuato-provincia-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Guanajuato <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-en-hidalgo-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Hidalgo (1)" data-url-list="/inmuebles-en-hidalgo-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-hidalgo-provincia-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Hidalgo <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-en-michoacan-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Michoacán (1)" data-url-list="/inmuebles-en-michoacan-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-michoacan-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Michoacán <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-en-morelos-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Morelos (1)" data-url-list="/inmuebles-en-morelos-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-morelos-provincia-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Morelos <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-en-nuevo-leon-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Nuevo León (1)" data-url-list="/inmuebles-en-nuevo-leon-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-nuevo-leon-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Nuevo León <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-en-queretaro-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Querétaro (2)" data-url-list="/inmuebles-en-queretaro-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-queretaro-provincia-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Querétaro <span>(2)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-en-quintana-roo-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Quintana Roo (1)" data-url-list="/inmuebles-en-quintana-roo-provincia-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-quintana-roo-provincia-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Quintana Roo <span>(1)</span></a></li>
                                            </ul>
                                            <a href="#" rel="nofollow" class="mas-menos mas"><span class="collapsible-expand"></span>Ver más</a>
                                            <a href="#" rel="nofollow" class="mas-menos menos oculto"><span class="collapsible-collapse"></span>Ver menos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="padre  ">
                                <div class="a-title"><h4>Tipo de operacion</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li><a href="http://www.inmuebles24.com/inmuebles-en-renta-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Renta (110)" data-url-list="/inmuebles-en-renta-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-renta-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Renta <span>(110)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-en-venta-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Venta (11)" data-url-list="/inmuebles-en-venta-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-venta-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Venta <span>(11)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-en-temporal-vacacional-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Temporal/Vacacional (1)" data-url-list="/inmuebles-en-temporal-vacacional-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-en-temporal-vacacional-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Temporal/Vacacional <span>(1)</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="padre  ">
                                <div class="a-title"><h4>Tipo de propiedad</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li><a href="http://www.inmuebles24.com/departamentos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Departamento (44)" data-url-list="/departamentos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/departamentos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Departamento <span>(44)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/casas-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Casa (30)" data-url-list="/casas-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/casas-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Casa <span>(30)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/locales-comerciales-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Local Comercial (12)" data-url-list="/locales-comerciales-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/locales-comerciales-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Local Comercial <span>(12)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/bodegas-comerciales-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Bodega comercial (10)" data-url-list="/bodegas-comerciales-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/bodegas-comerciales-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Bodega comercial <span>(10)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/edificio-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Edificio (8)" data-url-list="/edificio-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/edificio-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Edificio <span>(8)</span></a></li>

                                        <li class="padre cerrado">
                                            <ul>
                                                <li><a href="http://www.inmuebles24.com/oficinas-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Oficina (5)" data-url-list="/oficinas-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/oficinas-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Oficina <span>(5)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/casa-en-condominio-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Casa en condominio (2)" data-url-list="/casa-en-condominio-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/casa-en-condominio-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Casa en condominio <span>(2)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/terrenos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Terreno / Lote (1)" data-url-list="/terrenos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/terrenos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Terreno / Lote <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmueble-productivo-urbano-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Inmueble productivo urbano (1)" data-url-list="/inmueble-productivo-urbano-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmueble-productivo-urbano-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Inmueble productivo urbano <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/bodega-galpon-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Bodega-Galpón (1)" data-url-list="/bodega-galpon-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/bodega-galpon-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Bodega-Galpón <span>(1)</span></a></li>
                                            </ul>
                                            <a href="#" rel="nofollow" class="mas-menos mas"><span class="collapsible-expand"></span>Ver más</a>
                                            <a href="#" rel="nofollow" class="mas-menos menos oculto"><span class="collapsible-collapse"></span>Ver menos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="padre  ">
                                <div class="a-title"><h4>Precio</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li class="price-filter">
                                            <form method="POST">
                                                <div class="input-money">
                                                    <table>
                                                        <tbody><tr class="desde">
                                                            <td class="coin"><span>desde</span><i class="simbolo-moneda">MN</i></td>
                                                            <td class="input-coin"><input placeholder="Min." name="preciomin" id="preciomin" maxlength="15" class="soloEntero formatearPrecio" data-numericoconcomas="numericoconcomas" type="text"></td>
                                                        </tr>
                                                        </tbody></table>
                                                    <table>
                                                        <tbody><tr class="desde">
                                                            <td class="coin"><span>hasta</span><i class="simbolo-moneda">MN</i></td>
                                                            <td class="input-coin"><input placeholder="Max." name="preciomax" id="preciomax" maxlength="15" class="soloEntero formatearPrecio" data-numericoconcomas="numericoconcomas" type="text"></td>
                                                        </tr>
                                                        </tbody></table>
                                                </div>
                                                <div class="aplicar">
                                                    <button type="submit" class="btn btn-medium" id="botonPrecio">Aplicar</button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="padre  ">
                                <div class="a-title"><h4>Recámaras</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-2-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="2 recámaras (29)" data-url-list="/inmuebles-con-2-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-2-recamaras-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">2 recámaras <span>(29)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-3-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="3 recámaras (29)" data-url-list="/inmuebles-con-3-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-3-recamaras-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">3 recámaras <span>(29)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-1-recamara-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="1 recámara (12)" data-url-list="/inmuebles-con-1-recamara-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-1-recamara-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">1 recámara <span>(12)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-4-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="4 recámaras (7)" data-url-list="/inmuebles-con-4-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-4-recamaras-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">4 recámaras <span>(7)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-5-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="5 recámaras (1)" data-url-list="/inmuebles-con-5-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-5-recamaras-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">5 recámaras <span>(1)</span></a></li>


                                        <li class="padre cerrado">
                                            <ul>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-con-10-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Más de 10 recámaras (1)" data-url-list="/inmuebles-con-10-recamaras-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-10-recamaras-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Más de 10 recámaras <span>(1)</span></a></li>
                                            </ul>
                                            <a href="#" rel="nofollow" class="mas-menos mas"><span class="collapsible-expand"></span>Ver más</a>
                                            <a href="#" rel="nofollow" class="mas-menos menos oculto"><span class="collapsible-collapse"></span>Ver menos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="padre cerrado ">
                                <div class="a-title"><h4>Estacionamientos</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-2-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Para 2 autos (29)" data-url-list="/inmuebles-con-2-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-2-estacionamientos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Para 2 autos <span>(29)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-1-estacionamiento-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Para 1 auto (25)" data-url-list="/inmuebles-con-1-estacionamiento-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-1-estacionamiento-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Para 1 auto <span>(25)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-3-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Para 3 autos (13)" data-url-list="/inmuebles-con-3-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-3-estacionamientos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Para 3 autos <span>(13)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-10-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Para más de 10 autos (9)" data-url-list="/inmuebles-con-10-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-10-estacionamientos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Para más de 10 autos <span>(9)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-4-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Para 4 autos (4)" data-url-list="/inmuebles-con-4-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-4-estacionamientos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Para 4 autos <span>(4)</span></a></li>
                                        <li class="padre cerrado">
                                            <ul>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-con-6-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Para 6 autos (3)" data-url-list="/inmuebles-con-6-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-6-estacionamientos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Para 6 autos <span>(3)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-con-5-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Para 5 autos (3)" data-url-list="/inmuebles-con-5-estacionamientos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-5-estacionamientos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Para 5 autos <span>(3)</span></a></li>
                                            </ul>
                                            <a href="#" rel="nofollow" class="mas-menos mas"><span class="collapsible-expand"></span>Ver más</a>
                                            <a href="#" rel="nofollow" class="mas-menos menos oculto"><span class="collapsible-collapse"></span>Ver menos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="padre cerrado ">
                                <div class="a-title"><h4>Baños</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-2-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="2 baños (36)" data-url-list="/inmuebles-con-2-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-2-banos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">2 baños <span>(36)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-1-bano-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="1 baño (29)" data-url-list="/inmuebles-con-1-bano-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-1-bano-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">1 baño <span>(29)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-3-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="3 baños (13)" data-url-list="/inmuebles-con-3-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-3-banos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">3 baños <span>(13)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-4-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="4 baños (11)" data-url-list="/inmuebles-con-4-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-4-banos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">4 baños <span>(11)</span></a></li>
                                        <li><a href="http://www.inmuebles24.com/inmuebles-con-9-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="9 baños (2)" data-url-list="/inmuebles-con-9-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-9-banos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">9 baños <span>(2)</span></a></li>
                                        <li class="padre cerrado">
                                            <ul>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-con-6-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="6 baños (2)" data-url-list="/inmuebles-con-6-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-6-banos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">6 baños <span>(2)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-con-5-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="5 baños (1)" data-url-list="/inmuebles-con-5-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-5-banos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">5 baños <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-con-10-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="Más de 10 baños (1)" data-url-list="/inmuebles-con-10-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-10-banos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">Más de 10 baños <span>(1)</span></a></li>
                                                <li><a href="http://www.inmuebles24.com/inmuebles-con-7-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" rel="nofollow" title="7 baños (1)" data-url-list="/inmuebles-con-7-banos-ordenado-por-precio-ascendente-busquedaext-renta-iztapalapa.html" data-url-grid="/inmuebles-con-7-banos-ordenado-por-precio-ascendente-grid-busquedaext-renta-iztapalapa.html">7 baños <span>(1)</span></a></li>
                                            </ul>
                                            <a href="#" rel="nofollow" class="mas-menos mas"><span class="collapsible-expand"></span>Ver más</a>
                                            <a href="#" rel="nofollow" class="mas-menos menos oculto"><span class="collapsible-collapse"></span>Ver menos</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
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