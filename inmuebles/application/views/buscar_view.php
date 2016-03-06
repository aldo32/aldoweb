<?php
function consumeRest($url, $params) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $res = curl_exec($ch);
    curl_close($ch);

    return $res;
}
?>

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

            $('#bxslider2').bxSlider({
                auto: true,
                autoControls: false
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
    </script>
</head>

<body id="listado" class="Mexico panel-usuario" itemscope="" itemtype="">
<header class="header  -home clearfix oculto-print" style="background: rgba(100, 174, 227, 0.9) none repeat scroll 0 0">
    <div class="container">
        <!--LOGO-->
        <div class="logo-header-wrap" style="width: 100px;">
            <a href="#" title="" class="logo-header inmuebles24  "></a>
        </div>

        <div class="header-searchbox-wrap">
            <div style="position: relative; width: 100%">
                <form id="searchbox" action="<?php echo base_url("inicio/buscar") ?>" method="post">
                    <div style="float: left; margin-left: 50px; margin-right: 5px;">
                        <select name="tipoPropiedad" id="" class="">
                            <option value="1">Casas</option>
                            <option value="2">Bodega</option>
                            <option value="3">Departamentos</option>
                            <option value="4">Locales</option>
                            <option value="5">nave_industrial &nbsp;&nbsp;&nbsp;</option>
                            <option value="6">Oficinas</option>
                            <option value="7">Rancho</option>
                            <option value="8">Terrenos</option>
                        </select>
                    </div>
                    <div style="float: left; margin-right: 5px;">
                        <select name="ventaRenta" id="" class="">
                            <option value="Venta">Venta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                            <option value="Renta">Renta</option>
                        </select>
                    </div>
                    <div style="float: left; margin-right: 5px;">
                        <input type="text" placeholder="Precio" class="" id="" name="precio" spellcheck="false" style="width: 100%; font-size: 16px;">
                    </div>
                    <div style="float: left; margin-right: 5px;">
                        <input type="text" placeholder="C.P." class="" id="" name="cp" spellcheck="false" style="width: 100%; font-size: 16px;">
                    </div>
                    <div style="float: left; margin-top: 2px;"><button class="btn btn-noframe" type="submit">Buscar</button></div>
                </form>
            </div>
        </div>
    </div>
</header>



<div class="content">
    <div class="container">
        <div class="row">
            <!--
            <div class="span24" itemprop="breadcrumb">
                <ul class="breadcrumb pull-left oculto-print">
                    <li><a href="#">Inmuebles</a><span class="divider"></span></li>
                    <li><span>Todos los inmuebles</span></li>
                </ul>
            </div>
            -->
            <!-- MAIN -->
            <div class="span19 pull-right main" style="width: 100%;">

                <!-- banner ZP -->
                <!-- banner ZP -->

                <!-- NAV-->
                <div class="clearfix">
                    <h1 class="pull-left h2">
                        <span id="id-resultado-busqueda"><?php echo sizeof($resultado["inmuebles"]) ?></span> Propiedades e inmuebles encontrados
                    </h1>
                    <!--
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
                    -->
                </div>

                <div class="section-listado" id="vistaList">
                    <div class="clearfix">
                        <ul class="list-posts unstyled clearfix">
                            <?php
                            if (isset($resultado["inmuebles"])) {
                                for ($i=0; $i<sizeof($resultado["inmuebles"]); $i++) {

                                    //obtener detalle del inmueble
                                    $url = "http://sicksadworld.com.mx/servicios/getInmueble.php";
                                    $params = array("id_inmueble"=>$resultado['inmuebles'][$i]["id_inmueble"], "tipo_inmueble"=>$resultado['inmuebles'][$i]["tipo_inmueble"]);
                                    $detalle = json_decode(consumeRest($url, $params), true);
                                    ?>
                                    <li class="post      simple" id="" data-aviso="">
                                        <div class="post-pic" style="margin-left: 0px;">
                                            <div style="height: 200px;" class="royalSlider rsDefault slideme rsHor rs-ld">
                                                <div style="width: 280px; height: 200px;" class="rsOverflow" id="bxslider2">
                                                    <img style="width: 280px; height: 200px; margin-left: 0px; margin-top: 0px;" class="rsImg rsMainSlideImage" src="<?php echo $resultado["inmuebles"][$i]["img_banner"] ?>">
                                                </div>
                                            </div>
                                            <!-- INSERT SLIDER END -->
                                        </div>

                                        <div class="post-text" style="margin-right: 70px;">
                                            <div class="post-text-desc">
                                                <div>
                                                    <h4 class="post-title"><a href="<?php echo base_url() ?>inicio/detalle/<?php echo $resultado['inmuebles'][$i]["id_inmueble"]."/".$resultado['inmuebles'][$i]["tipo_inmueble"] ?>" title=""><?php echo $detalle["detalle_inmueble"]["descripcion"] ?></a></h4>
                                                    <p>
                                                        <?php echo $detalle["detalle_inmueble"]["descripcion"] ?>
                                                    </p>
                                                    <a href="<?php echo base_url() ?>inicio/detalle/<?php echo $resultado['inmuebles'][$i]["id_inmueble"]."/".$resultado['inmuebles'][$i]["tipo_inmueble"] ?>" title="" class="post-link">ver detalles</a>
                                                </div>
                                            </div>

                                            <div class="post-text-pay">
                                                <ul class="misc unstyled">
                                                    <li class="misc-m2totales"><?php echo (isset($detalle["detalle_inmueble"]["terreno_m2"])) ? $detalle["detalle_inmueble"]["terreno_m2"] : "" ?></li>
                                                    <li class="misc-banos"><?php echo (isset($detalle["detalle_inmueble"]["banos"])) ? $detalle["detalle_inmueble"]["banos"] : "0" ?> Baños</li>
                                                </ul>
                                                <div>
                                                    <p class="price"><span>MN $<?php echo (is_numeric($detalle["detalle_inmueble"]["precio"])) ? number_format($detalle["detalle_inmueble"]["banos"], 2) : $detalle["detalle_inmueble"]["banos"]; ?></span></p>

                                                    <div class="buttons">
                                                        <a href="<?php echo base_url() ?>inicio/detalle/<?php echo $resultado['inmuebles'][$i]["id_inmueble"]."/".$resultado['inmuebles'][$i]["tipo_inmueble"] ?>">
                                                        <button class="btn btn-primary btn-large js-contact" data-aviso-id="50861126">
                                                            <i class="ticon-phone"></i>
                                                            Contactar
                                                        </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <!--
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
                    -->

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
            <!--
            <div class="span5 pull-left">

                <div class="section-appliedfilters">
                    <h4>Filtros aplicados</h4>
                    <div class="list list-closeable list-style-a">
                        <ul>
                            <li><h2>renta iztapalapa</h2> <a href="http://www.inmuebles24.com/inmuebles-ordenado-por-precio-ascendente.html">×</a></li>
                        </ul>
                    </div>
                </div>
                -->

                <!--
                <div class="section-filters">
                    <div class="nav-collapsible" data-ui-collapsible="">
                        <ul>
                            <li class="padre  ">
                                <div class="a-title"><h4>Tipo de operacion</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li><a href="" rel="nofollow" title="Renta" data-url-list="" data-url-grid="">Renta <span>(0)</span></a></li>
                                        <li><a href="" rel="nofollow" title="Venta" data-url-list="" data-url-grid="">Venta <span>(0)</span></a></li>
                                    </ul>
                                </div>
                            </li>

                            <li class="padre  ">
                                <div class="a-title"><h4>Tipo de propiedad</h4></div>
                                <div class="facetas-default">
                                    <ul class="facetas-ul">
                                        <li><a href="#" title="casas" id="1">Casas <span>(0)</span></a></li>
                                        <li><a href="#" title="casas" id="2">Bodega <span>(0)</span></a></li>
                                        <li><a href="#" title="casas" id="3">Departamentos <span>(0)</span></a></li>
                                        <li><a href="#" title="casas" id="4">Locales <span>(0)</span></a></li>
                                        <li><a href="#" title="casas" id="5">Nave Industrial <span>(0)</span></a></li>


                                        <li class="padre cerrado">
                                            <ul>
                                                <li><a href="#" title="casas" id="6">Oficinas <span>(0)</span></a></li>
                                                <li><a href="#" title="casas" id="7">Ranchos <span>(0)</span></a></li>
                                                <li><a href="#" title="casas" id="8">Terrenos <span>(0)</span></a></li>
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
            -->
        </div>
    </div>
</div>

<?php echo $footer; ?>

</body>
</html>