<!DOCTYPE html>
<html>
<head>
    <title>Inmuebles</title>

    <?php echo $includes; ?>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

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
            };
        }());
        $(function(){
            //			SI EL USUARIO NO ESTA LOGUEADO Y ESTA GUARDADA LA COOKIE CON UN EMAIL INGRESADO
            //			RELLENO TODOS LOS INPUT CON DICHO EMAIL ASI NO LO TIEN QUE VOLVER A INGRESAR
            $(window).load(function(){
                realestate().auth.updateEmailInputsConCookie();
            });
        });

        function initMap() {
            var latitude = 0;
            var longitude = 0;

            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 19.436499, lng: -99.143655},
                zoom: 8
            });
            var infoWindow = new google.maps.InfoWindow({map: map});

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url("inicio/obtenerBanners") ?>",
                        data: {
                            latitud: position.coords.latitude,
                            longitud: position.coords.longitude
                        },
                        success: function (data) {
                            $("#inmueblesDestacados").html(data);
                        }
                    });
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

    </script>

    <style>
        .searchbox-home-wrap.flat input[name=precio1]{width:427px;border:0;box-shadow:none;height:45px;float:left}
        .searchbox-home-wrap.flat input[name=precio2]{width:427px;border:0;box-shadow:none;height:45px;float:left}
        .searchbox-home-wrap.flat input[name=cp]{width:427px;border:0;box-shadow:none;height:45px;float:left}
    </style>
</head>

<body id="home" class="Mexico panel-usuario" style="background: #64aee3;">
<div id="map"></div>
<header class="header  -home clearfix oculto-print">
    <div class="container">
        <!--LOGO-->
        <div class="logo-header-wrap">
            <a class="logo-header" href="<?php echo base_url("inicio") ?>"></a>
        </div>
    </div>
</header>

<?php
$banner = array_rand($banners["inmuebles"], 1);
?>
<div class="section-search lazyBg " style="background-image: url('<?php echo $banners["inmuebles"][$banner]["img_banner"] ?>'); background-size: cover; max-width: 100%; height: calc(100% - 55px);">

    <!-- Nueva caja logos BEG -->
    <input id="idNameProyecto" value=" - " type="hidden">
    <!-- Nueva caja logos END -->

    <div class="container" id="searchbox-container">
        <div class="searchbox-home-wrap flat" data-provincia="Distrito Federal">
            <div class="searchbox searchbox-home">
                <h1>Busca inmuebles en México</h1>
                <form id="searchbox" action="<?php echo base_url("inicio/buscar") ?>" method="post">
                    <div style="width: 100%; position: relative;">
                        <div style="float: left;">
                            <div class="input-select">
                                <select name="tipoPropiedad" id="" class="input-weight-xlarge input-block" style="height: 45px; font-size: 18px;">
                                    <option value="1">Casas</option>
                                    <option value="9">Fraccionamientos</option>
                                    <option value="6">Oficinas</option>
                                    <option value="3">Departamentos</option>
                                    <option value="6">Oficinas</option>
                                    <option value="4">Locales</option>
                                    <option value="2">Bodega</option>
                                    <option value="5">Naves industriales &nbsp;&nbsp;&nbsp;</option>
                                    <option value="7">Rancho</option>
                                    <option value="8">Terrenos</option>
                                    <option value="10">Desarrollos</option>
                                </select>
                            </div>
                        </div>
                        <div style="float: left; margin-right: 20px;">
                            <div class="input-select">
                                <select name="ventaRenta" id="" class="input-weight-xlarge input-block" style="height: 45px; font-size: 18px;">
                                    <option value="Venta">Venta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="Renta">Renta</option>
                                    <option value="Traspaso">Traspaso</option>
                                    <option value="Vacaciones/Intercambio">Vacaciones/Intercambio</option>
                                    <option value="Desarrollos">Desarrollos</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <input type="text" placeholder="Precio desde" class="" id="" name="precio1" autocomplete="off" spellcheck="false" style="width: 15%; font-size: 16px;">
                        </div>
                        <div class="control-group">
                            <input type="text" placeholder="Hasta" class="" id="" name="precio2" autocomplete="off" spellcheck="false" style="width: 15%; font-size: 16px;">
                        </div>
                        <div class="control-group">
                            <input type="text" placeholder="Id, Ciudad, C.P." class="idCpCiudad" id="" name="cp" autocomplete="off" spellcheck="false" style="width: 20%; font-size: 16px;">
                        </div>

                        <div class="searchbox-submit">
                            <button type="submit" id="submitBtn" class="btn btn-xlarge btn-block btn-primary buttonBuscarInm">Buscar</button>
                        </div>
                    </div>
                </form>
                <div style="width: 100%; position: relative; text-align: center;">
                    <div style="width: 300px; margin: 0 auto;">
                        <div style="text-shadow: 2px 2px 2px rgba(150, 150, 150, 1); font-weight: bold; font-size: 20px;">
                            <?php if(isset($mensajeError)) { echo $mensajeError["mensaje"]; } ?>
                        </div>
                    </div>
                </div>
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
    <h3 class="h1">Desarrollos destacados en México</h3>
    <div class="row">
        <div class="span24">
            <div style="overflow: hidden;" class="frame" id="slider-desarrollos">
                <div id="inmueblesDestacados" style="transform: translateZ(0px) translateX(-108px); width: 14160px;" class="slidee clearfix">

                    <?php
                    if (isset($banners)) {
                        foreach($banners["inmuebles"] as $row) {
                            ?>
                            <div class="slideee">
                                <ul class="grid-posts unstyled">
                                    <li class="post post-desarrollo  ">
                                        <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                                        <div class="post-thumb">
                                            <a href="<?php echo base_url() ?>inicio/detalle/<?php echo $row['id_inmueble']."/".$row['tipo_inmueble'] ?>" title="<?php echo $row["descripcion"] ?>">
                                                <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="<?php echo $row["img_banner"] ?>" class="foto-principal lazyDesarrollos" alt="" height="100%" width="100%">
                                            </a>
                                        </div>

                                        <!--Tag desarrollo-->
                                        <div class="post-info">
                                            <h4 class="post-title"><a href="<?php echo base_url() ?>inicio/detalle/<?php echo $row['id_inmueble']."/".$row['tipo_inmueble'] ?>" title=""><?php echo $row["descripcion"] ?></a></h4>
                                            <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; <?php echo $row['direccion_calle'] ?></span>
                                            <ul class="post-content">
                                                <li>Tipo <b><?php echo $row['venta_renta'] ?></b></li>
                                                <li><b><?php echo $row['recamaras'] ?></b> Recamaras</li>
                                                <li><b><?php echo $row['banos'] ?></b> Baños</li>
                                                <li><b><?php echo $row['terreno_m2'] ?> metros</b> de terreno</li>
                                            </ul>

                                            <div class="post-price">
                                                <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">$<?php echo (is_numeric($row['precio'])) ? number_format($row['precio'], 2) : $row['precio'] ?></span>
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
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="slidee-buttons">
                <button class="btn btn-large prev"><i class="ticon ticon-prev"></i> Anterior</button>
                <button class="btn btn-large next">Siguiente <i class="ticon ticon-next"></i></button>
            </div>
        </div>
    </div>
</div>

<!--
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





                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/casa-en-renta-chapala-jalisco-51278523.html" title="Casa en Renta Chapala, Jalisco ">Casa en Renta Chapala, Jalisco</a></h4>

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





                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelente-bodega-con-oficinas-en-cd.-juarez-50725061.html" title="EXCELENTE BODEGA CON OFICINAS EN CD. JUAREZ">Excelente Bodega con Oficinas en Cd. Juarez</a></h4>

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




                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/nave-industrial-en-renta-51039651.html" title="Nave Industrial en renta ">Nave Industrial en Renta</a></h4>
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



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/renta-solo-en-plaza-carso-todas-las-medidas-y-precios-51262177.html" title="RENTA SOLO EN PLAZA CARSO TODAS LAS MEDIDAS Y PRECIOS">Renta Solo en Plaza Carso Todas Las Medidas y Precios</a></h4>

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



                                </div>
                                <div class="post-info">
                                    <h4 class="post-title"><a href="/propiedades/excelentes-locales-en-zamora-mich.-51281213.html" title="Excelentes locales en Zamora Mich.">Excelentes Locales en Zamora Mich.</a></h4>
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
-->



<div class="section-ciudades">
    <div class="container">
        <h3 class="h1">Propiedades por categoria</h3>
        <div class="row unstyled">
            <div class="span8">
                <div class="box">
                    <div class="box-thumb">
                        <a href=""><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="<?php echo base_url() ?>resources/images/categoria_casas.jpg" class="lazyFoot" alt="Monterrey" height="94" width="264"></a>
                    </div>
                    <div class="box-info">
                        <h3 class="box-title">Casas</h3>
                        <ul class="box-content">
                            <?php
                            if (isset($inmueblesCasas)) {
                                for ($i=0; $i<sizeof($inmueblesCasas["inmuebles"]); $i++) {
                                    ?>
                                    <li><a href="<?php echo base_url() ?>inicio/detalle/<?php echo $inmueblesCasas["inmuebles"][$i]['id_inmueble']."/".$inmueblesCasas["inmuebles"][$i]['tipo_inmueble'] ?>"><?php echo $inmueblesCasas["inmuebles"][$i]['descripcion'] ?></a></li>
                                    <?php
                                    if ($i > 5 ) break;
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span8">
                <div class="box">
                    <div class="box-thumb">
                        <a href=""><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="<?php echo base_url() ?>resources/images/categoria_departamentos.jpg" class="lazyFoot" alt="Miguel Hidalgo" height="94" width="264"></a>
                    </div>
                    <div class="box-info">
                        <h3 class="box-title">Departamentos</h3>
                        <ul class="box-content">
                            <?php
                            if (isset($inmueblesDepartamentos)) {
                                for ($i=0; $i<sizeof($inmueblesDepartamentos["inmuebles"]); $i++) {
                                    ?>
                                    <li><a href="<?php echo base_url() ?>inicio/detalle/<?php echo $inmueblesDepartamentos["inmuebles"][$i]['id_inmueble']."/".$inmueblesDepartamentos["inmuebles"][$i]['tipo_inmueble'] ?>"><?php echo $inmueblesDepartamentos["inmuebles"][$i]['descripcion'] ?></a></li>
                                    <?php
                                    if ($i > 5 ) break;
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span8">
                <div class="box">
                    <div class="box-thumb">
                        <a href=""><img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="<?php echo base_url() ?>resources/images/categoria_oficinas.jpg" class="lazyFoot" alt="Huixquilucan" height="94" width="264"></a>
                    </div>
                    <div class="box-info">
                        <h3 class="box-title">Oficinas</h3>
                        <ul class="box-content">
                            <?php
                            if (isset($inmueblesOficinas)) {
                                for ($i=0; $i<sizeof($inmueblesOficinas["inmuebles"]); $i++) {
                                    ?>
                                    <li><a href="<?php echo base_url() ?>inicio/detalle/<?php echo $inmueblesOficinas["inmuebles"][$i]['id_inmueble']."/".$inmueblesOficinas["inmuebles"][$i]['tipo_inmueble'] ?>"><?php echo $inmueblesOficinas["inmuebles"][$i]['descripcion'] ?></a></li>
                                    <?php
                                    if ($i > 5 ) break;
                                }
                            }
                            ?>
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
