<!DOCTYPE html>
<html>
<head>

    <title>Detalle</title>

    <?php echo $includes; ?>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script>
    $(document).ready(function() {
        //$('#coinslider').coinslider({width: 780, height: 370, delay: 5000,});
        $('#bxslider').bxSlider({
            auto: true,
            autoControls: false
        });
        initMap()

        $("#enviarInformacionInmueble").click(function(e) {
            e.preventDefault();

            idInmueble = $("#idInmueble").val();
            tipoInmueble = $("#tipoInmueble").val();
            mensaje = $("#mensaje").val();
            nombre = $("#nombre").val();
            telefono = $("#telefono").val();
            email = $("#email").val();

            $("#messageInfo").html("Enviando...");
            $.ajax({
                url: "<?php echo base_url("inicio/enviarInformacionInmueble") ?>",
                data: "idInmueble="+idInmueble+"&tipoInmueble="+tipoInmueble+"&mensaje="+mensaje+"&nombre="+nombre+"&telefono="+telefono+"&email="+email,
                dataType: "html",
                success: function(datos) {
                    //$("#mensaje").val("");
                    //$("#nombre").val("");
                    //$("#telefono").val("");
                    //$("#email").val("");
                    $("#messageInfo").html(datos);
                },
                type: "POST"
            });
        });
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
                <form id="searchbox" action="<?php echo base_url("inicio/buscar") ?>" method="post">
                    <div style="float: left; margin-left: 20px; margin-right: 5px;">
                        <select name="tipoPropiedad" id="" class="">
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
                    <div style="float: left; margin-right: 5px;">
                        <select name="ventaRenta" id="" class="">
                            <option value="Venta">Venta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                            <option value="Renta">Renta</option>
                            <option value="Traspaso">Traspaso</option>
                            <option value="Vacaciones/Intercambio">Vacaciones/Intercambio</option>
                            <option value="Desarrollos">Desarrollos</option>
                        </select>
                    </div>
                    <div style="float: left; margin-left: 0px;">
                        <input type="text" placeholder="Precio desde" class="" id="" name="precio1" spellcheck="false" style="width: 80%; font-size: 16px;">
                    </div>
                    <div style="float: left; margin-left: -35px;">
                        <input type="text" placeholder="Hasta" class="" id="" name="precio2" spellcheck="false" style="width: 80%; font-size: 16px;">
                    </div>
                    <div style="float: left; margin-left: -35px;">
                        <input type="text" placeholder="Id, Ciudad, C.P." class="idCpCiudad" id="" name="cp" spellcheck="false" style="width: 100%; font-size: 16px;">
                    </div>
                    <div style="float: left; margin-top: 2px;"><button class="btn btn-noframe buttonBuscarInm" type="submit">Buscar</button></div>
                </form>
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
                    <div id="bxslider">
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
                                <div class="list list-checkmark no-margin">
                                    <ul>
                                        <li><b><i class="licon licon-ficha_precio"></i>ID </b><?php echo $detalle["detalle_inmueble"]["idcasa"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Promotor </b><?php echo $detalle["detalle_inmueble"]["promotor"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Tipo de operación </b><?php echo $detalle["detalle_inmueble"]["venta_renta"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Crédito </b><?php echo $detalle["detalle_inmueble"]["credito"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Precio </b><?php echo $detalle["detalle_inmueble"]["precio"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Tipo de inmueble </b><?php echo $nombreTipoInmueble ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Información extra </b><?php echo $detalle["detalle_inmueble"]["descripcion"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Dirección </b><?php echo $detalle["detalle_inmueble"]["direccion_calle"]." #".$detalle["detalle_inmueble"]["direccion_numero"]." C.P.".$detalle["detalle_inmueble"]["direccion_codigo_postal"]." ".$detalle["detalle_inmueble"]["direccion_municipio"]." ".$detalle["detalle_inmueble"]["direccion_estado"]." ".$detalle["detalle_inmueble"]["direccion_pais"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Contrucción en m2 </b><?php echo $detalle["detalle_inmueble"]["terreno_m2"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Cocina </b><?php echo $detalle["detalle_inmueble"]["cocina_equipada"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Recamaras </b><?php echo $detalle["detalle_inmueble"]["recamaras"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Baños </b><?php echo $detalle["detalle_inmueble"]["banos"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Servicios básicos </b><?php echo $detalle["detalle_inmueble"]["servicios_basicos"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Alberca </b><?php echo $detalle["detalle_inmueble"]["alberca"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Amueblada </b><?php echo $detalle["detalle_inmueble"]["amueblada"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Mascotas </b><?php echo $detalle["detalle_inmueble"]["mascotas"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Mantenimiento y vigilancia </b><?php echo $detalle["detalle_inmueble"]["mantenimiento_vigilancia"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Accesos y estacionamientos </b><?php echo $detalle["detalle_inmueble"]["accesos_estacionamiento"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Escuelas </b><?php echo $detalle["detalle_inmueble"]["escuelas_cercanas"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Gasolinerias </b><?php echo $detalle["detalle_inmueble"]["gasolineras"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Tiendas de conveniencia </b><?php echo $detalle["detalle_inmueble"]["tiendas_conveniencia"] ?></li>
                                        <li><b><i class="licon licon-ficha_precio"></i>Parques </b><?php echo $detalle["detalle_inmueble"]["parques_cercanos"] ?></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content">
                                <ul>
                                    <li>
                                        <span class="nombre">Entrega</span>
                                        <span class="valor" title="Entrega Inmediata">Inmediata</span>
                                    </li>
                                    <li>
                                        <span class="nombre">Desde</span>
                                        <span class="valor" title="">MN $<?php echo (is_numeric($detalle["detalle_inmueble"]["precio"])) ? number_format($detalle["detalle_inmueble"]["precio"], 2) : $detalle["detalle_inmueble"]["precio"] ?></span>
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
                                        <li>Construido <?php echo (isset($detalle["detalle_inmueble"]["construccion_m2"])) ? $detalle["detalle_inmueble"]["construccion_m2"] : "0" ?>m</li>
                                        <li>Patios: <?php echo (isset($detalle["detalle_inmueble"]["patios"])) ? $detalle["detalle_inmueble"]["patios"] : 0; ?></li>
                                        <?php echo (isset($detalle["detalle_inmueble"]["condicion"])) ? "<li>".$detalle["detalle_inmueble"]["condicion"]."</li>" : "" ?></li>
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
                            <span class="valor pull-right" title="">MN $<?php echo (is_numeric($detalle["detalle_inmueble"]["precio"])) ? number_format($detalle["detalle_inmueble"]["precio"], 2) : $detalle["detalle_inmueble"]["precio"] ?></span>
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
                                            <div id="messageInfo"></div>

                                            <input type="hidden" id="idInmueble" name="idInmueble" value="<?php echo $idInmueble ?>">
                                            <input type="hidden" id="tipoInmueble" name="tipoInmueble" value="<?php echo $tipoInmueble ?>">

                                            <div class="control-group">
                                                <div class="controls">
                                                    <textarea name="mensaje" id="mensaje" placeholder="Mensaje" class="input-block open-form"><?php echo set_value("mensaje") ?></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input name="nombre" id="nombre" value="<?php echo set_value("nombre") ?>" placeholder="Nombre y Apellido" class="input-block " maxlength="180" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input name="telefono" id="telefono" value="<?php echo set_value("telefono") ?>" placeholder="Teléfono" class="input-block " maxlength="50" type="text">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <input required="" name="email" id="email" value="<?php echo set_value("email") ?>" placeholder="E-mail" class="input-block close-form" id="emailFormConsulta" maxlength="110" type="email">
                                                </div>
                                            </div>
                                            <div class="control-group clearfix">
                                                <button type="submit" class="btn btn-primary btn-large btn-block" data-action="consultaraviso" data-tipo-anunciante="" id="enviarInformacionInmueble">
                                                    Contactar anunciante
                                                </button>
                                                <small class="coment no-margin" style="color: #000;">
                                                    Al hacer click en "Enviar" aceptas los
                                                    <a href="<?php echo base_url("inicio/terminos") ?>" class="nyroModal">
                                                    términos y condiciones</a> de Inmuebles2
                                                </small>
                                            </div>
                                        </form>
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