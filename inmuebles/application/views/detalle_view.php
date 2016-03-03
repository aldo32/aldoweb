<!DOCTYPE html>
<html>
<head>

    <title>Detalle</title>

    <?php echo $includes; ?>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script>
    $(document).ready(function() {
        //$('#coinslider').coinslider({width: 780, height: 370, delay: 5000,});
        $('#coinslider').bxSlider({
            auto: true,
            autoControls: false
        });
        initMap()
    });

    function initMap() {
        map = new google.maps.Map(document.getElementById('mapa'), {
            center: {lat: 0, lng: 0},
            zoom: 15
        });

        pos = {
            lat: <?php echo $detalle["detalle_inmueble"]["direccion_latitud"] ?>,
            lng: <?php echo $detalle["detalle_inmueble"]["direccion_longitud"] ?>
        };
        map.setCenter(pos);

        marker = new google.maps.Marker({
            position: pos,
            title:"Punto del inmueble"
        });
        marker.setMap(map);
    }
    </script>


</head>

<body id="listado" class="Mexico panel-usuario" itemscope="" itemtype="">
<header class="header  -home clearfix oculto-print" style="background: rgba(100, 174, 227, 0.9) none repeat scroll 0 0">
    <div class="container">
        <!--LOGO-->
        <div class="logo-header-wrap" style="width: 100px;">
            <a href="<?php echo base_url("inicio") ?>" title="" class="logo-header"></a>
        </div>

        <div class="header-searchbox-wrap">
            <div style="position: relative; width: 100%">
                <div style="float: left; margin-right: 15px;"><input type="text" name="search" placeholder="Busca tu inmueble" style="width: 990px; margin-top: 0px;"></div>
                <div style="float: left; margin-top: 2px;"><button data-url-destino="#" data-action="buscar" class="btn btn-noframe">Buscar</button></div>
            </div>
        </div>
    </div>
</header>

<div class="content" data-aviso="1011368">
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="span24"></div>
        </div>

        <div class="row sticky-holder">
            <div class="span16">
                <div class="card">
                    <div class="card-content no-padding-bottom">
                        <div class="clearfix">
                            <!-- TITULO -->
                            <h1><?php echo $detalle["detalle_inmueble"]["descripcion"] ?></h1>
                        </div>
                    </div>

                    <!-- GALERIA -->
                    <div id="coinslider">
                        <?php
                        for ($i=0; $i<sizeof($detalle["imagenes"]); $i++) {
                            ?>
                            <img src='<?php echo $detalle["imagenes"][$i]["imagen"];?>'>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="card-content">
                        <!-- BRADCRUMBS -->
                        <div itemprop="breadcrumb">
                            <ul class="breadcrumb no-margin pull-left oculto-print">
                                <li>
                                    <a href="<?php echo base_url("inicio")?>">Inmuebles</a>
                                    <span class="divider"></span>
                                </li>
                                <span><?php echo $detalle["detalle_inmueble"]["descripcion"] ?></span>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="span8">
                        <div class="card aviso-datos">
                            <div class="card-content">
                                <h3>Datos principales</h3>
                                <ul>
                                    <li>
									    <span class="nombre"><i class="licon licon-ficha_precio"></i>Precio  desde</span>
                                        <span class="valor"><?php echo $detalle["detalle_inmueble"]["precio"] ?></span>
                                    </li>
                                    <li>
                                        <span class="nombre"><i class="licon licon-dormitorios"></i><?php echo $detalle["detalle_inmueble"]["recamaras"] ?> Recamaras</span>
                                    </li>
                                    <li>
                                        <span class="nombre"><i class="licon licon-banos"></i>Hasta <?php echo $detalle["detalle_inmueble"]["banos"] ?> Baños</span>
                                    </li>
                                    <li>
                                        <span class="nombre"><i class="licon licon-garages"></i>Hasta <?php echo $detalle["detalle_inmueble"]["accesos_estacionamiento"] ?> Estacionamientos</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-content">
                                <ul>
                                    <li>
                                        <span class="nombre">Entrega</span>
                                        <span class="valor" title="Entrega Inmediata">Inmediata</span>
                                    </li>
                                    <li>
                                        <span class="nombre">Desde</span>
                                        <span class="valor" title="">MN $<?php echo number_format($detalle["detalle_inmueble"]["precio"], 2) ?></span>
                                        <br>
                                        <button class="btn btn-link no-padding-left"></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--
                        <div class="card aviso-desde">
                            <div class="card-content">
                                <h3 class="no-margin">Publicado hace 32 días</h3>
                            </div>
                        </div>
                        -->
                        <!-- MAPA -->
                        <div class="card location">
                            <div class="card-content no-padding-bottom">
                                <h3>Ubicación</h3>
                                <div class="list list-directions">
                                    <ul>
                                        <li><?php echo $detalle["detalle_inmueble"]["direccion_calle"]." ".$detalle["detalle_inmueble"]["direccion_numero"]." ".$detalle["detalle_inmueble"]["direccion_colonia"]." ".$detalle["detalle_inmueble"]["direccion_municipio"]." ".$detalle["detalle_inmueble"]["direccion_estado"]  ?></li>
                                    </ul>
                                </div>
                            </div>

                            <div id="mapa" class="clicvermapa" data-text="Haga click para habilitar" style="width:auto; height:300px">

                            </div>
                        </div>
                    </div>
                    <div class="span8">
                        <!-- DESCRIPCIÓN -->
                        <div class="card description">
                            <div class="card-content">
                                <h3 class="clearfix">Descripción</h3>
                                <span class="description-body " id="id-descipcion-aviso">
								    <?php echo $detalle["detalle_inmueble"]["descripcion"] ?>
                                </span>
                            </div>
                        </div>
                        <!-- CARACTERISTICAS -->
                        <div class="card aviso-caracteristicas">
                            <div class="card-content">
                                <h3>Generales</h3>
                                <div class="list list-checkmark no-margin">
                                    <ul>
                                        <li><?php echo $detalle["detalle_inmueble"]["venta_renta"] ?></li>
                                        <li>Terreno <?php echo $detalle["detalle_inmueble"]["terreno_m2"] ?>m</li>
                                        <li>Construido <?php echo $detalle["detalle_inmueble"]["construccion_m2"] ?>m</li>
                                        <li>Patios: <?php echo $detalle["detalle_inmueble"]["patios"] ?></li>
                                        <li><?php echo $detalle["detalle_inmueble"]["condicion"] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card aviso-caracteristicas">
                            <div class="card-content">
                                <h3>Contacto</h3>
                                <div class="list list-checkmark no-margin">
                                    <ul>
                                        <li>Tel:<?php echo $detalle["detalle_inmueble"]["contacto_telefono"] ?></li>
                                        <li>Email: <?php echo $detalle["detalle_inmueble"]["contacto_email"] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span8">
                <!-- PRECIOS -->
                <div class="card zona-precios">
                    <div class="card-content">
                        <p class="h2 precios no-margin">
                            <span class="nombre">Precio  Desde</span>
                            <span class="valor pull-right" title="">MN $<?php echo number_format($detalle["detalle_inmueble"]["precio"], 2) ?></span>
                        </p>
                        <div class="precios">
                        </div>
                    </div>
                </div>
                <!-- FORMULARIO -->
                <div style="z-index: 10; position: sticky; top: 20px;" class="sticky">
                    <div class="card aviso-contacto">
                        <div class="card-content form-contacto-wrap" style="color: #000;">
                            <div class=" ">
                                <div class="form-contacto contacto-propiedad module">

                                    <div class="consultarAviso-formulario">
                                        <form class="consultarAviso" id="id-consultar-aviso-1" action="<?php echo base_url("inicio/informacionInmueble") ?>" method="post">
                                            <?php
                                            if (validation_errors() != "") {
                                                echo "<p class='valError'>".validation_errors()."</p>";
                                            }
                                            ?>

                                            <input type="hidden" name="idInmueble" value="<?php echo $idInmueble ?>">
                                            <input type="hidden" name="tipoInmueble" value="<?php echo $tipoInmueble ?>">

                                            <div class="control-group">
                                                <div class="controls">
                                                    <textarea name="mensaje" placeholder="Mensaje" class="input-block open-form"><?php echo set_value("mensaje") ?></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input name="nombre" value="<?php echo set_value("nombre") ?>" placeholder="Nombre y Apellido" class="input-block " maxlength="180" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input name="telefono" value="<?php echo set_value("telefono") ?>" placeholder="Teléfono" class="input-block " maxlength="50" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input required="" name="email" value="<?php echo set_value("email") ?>" placeholder="E-mail" class="input-block close-form" id="emailFormConsulta" maxlength="110" type="email">
                                                </div>
                                            </div>
                                            <div class="control-group clearfix">
                                                <button type="submit" class="btn btn-primary btn-large btn-block" data-action="consultaraviso" data-tipo-anunciante="lancamentos">
                                                    Contactar anunciante
                                                </button>
                                                <small class="coment no-margin" style="color: #000;">
                                                    Al hacer click en "Enviar" aceptas los
                                                    <a href="<?php echo base_url("inicio/terminos") ?>" class="nyroModal">
                                                    términos y condiciones</a> de Inmuebles2
                                                </small>
                                            </div>
                                        </form>
                                        <div class="consultarAviso-enviando">
                                            <div>
                                                <img
                                                    src="<?php echo base_url()  ?>resources/images/ajax-loader-2k.gif"
                                                    height="52" width="52">

                                                <p>Enviando mensaje...</p>
                                                <span class="a cancelarEnvio">Cancelar</span>
                                            </div>
                                        </div>
                                        <div class="consultarAviso-enviado">
                                            <div>
                                                <i class="ticon ticon-ready"></i>

                                                <p>Mensaje enviado</p>
                                                <span class="a cancelarEnvio">Enviar otro mensaje</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $footer; ?>

</body>
</html>