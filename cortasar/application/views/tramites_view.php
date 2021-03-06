<?php
function consumeRest($url, $params) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $res = curl_exec($ch);
    curl_close($ch);

    return $res;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Cortazar - Tramites y servicios</title>

    <?php echo $includes ?>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //$('#comboTramites').multipleSelect({single: true, placeholder: 'Buscar tramite', filter: true});

            $( "#accordion" ).accordion();

            $('.seleccionarTramite').click(function(){
                var idTramite = $(this).attr("id");
                $("#idTramite").val(idTramite);

                //get tramite info
                $("#response").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;Cargando...");
                $.ajax({
                    url: "<?php echo base_url("tramites/getTramite") ?>",
                    data: "idTramite="+idTramite,
                    dataType: "html",
                    success: function(datos) {
                        $("#response").html(datos);
                        $('html, body').animate({
                            scrollTop: 600
                        }, 1000);
                    },
                    type: "POST"
                });
                initMap();
            });

            $(document).on("click", "#nextTramite", function() {
                if ($("#lat").val() == "" || $("#lng").val() == "") alert("debe seleccionar un punto en el mapa");
                else {
                    $("#archivosForm").submit();
                }
            });
        });

        var markersArray = [];
        var map;
        var marker;
        function initMap() {

            map = new google.maps.Map(document.getElementById('mapa'), {
                center: {lat: 0, lng: 0},
                zoom: 15
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);

                    marker = new google.maps.Marker({
                        position: pos,
                        title:"Aqui estas"
                    });
                    marker.setMap(map);
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                handleLocationError(false, infoWindow, map.getCenter());
            }

            google.maps.event.addListener(map, "click", function(event) {
                // place a marker
                marker.setMap(null);
                placeMarker(event.latLng);

                $("#lat").val(event.latLng.lat());
                $("#lng").val(event.latLng.lng());
            });
        }

        function placeMarker(location) {
            deleteOverlays();

            var marker = new google.maps.Marker({
                position: location,
                map: map
            });

            markersArray.push(marker);
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
        }
    </script>

    <style>
        .fleft { float: left; }
        .fright { float: right; }
        .titulo_tramite { width: 100%; height: 38px; line-height: 38px; color: #fff; font-weight: bold; padding-left: 5px; margin-bottom: 20px; background: url('resources/images/back_titulo.png') no-repeat; }
    </style>
</head>
<body>

<?php echo $header; ?>

<br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <?php
            if ($alert != "") {
                echo "<h3>".$alert["message"]."</h3>";
            }
            ?>
            <div class="titulo_tramite">Encuentra aquí el tipo de tramite</div>
            <?php //echo form_dropdown("comboTramites", $comboTramites, set_value("comboTramites"), "class='' style='width: 100%' id='comboTramites'");?>
            <input type="hidden" name="archivos" id="archivos" val="" />

            <div id="accordion">
                <?php
                if (isset($categorias)) {
                    foreach ($categorias->categoria AS $categoria) {
                        //obteniendo tramites de la categoria
                        $url = URL_CMS."RestCategorias/obtenerTramitesPorCategoria";
                        $params = array("idCategoria"=>$categoria->id);
                        $tramites = json_decode(consumeRest($url, $params));
                        ?>
                        <h3><?php echo $categoria->nombre ?></h3>
                        <div style="font-size: 11px;">
                            <?php
                            foreach ($tramites AS $row) {
                                ?>
                                <p>
                                    <button class="btn btn-default btn-sm seleccionarTramite" type="button" id="<?php echo $row->id ?>">Iniciar</button>
                                    <?php echo $row->nombre ?>
                                </p>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1" id="response"></div>
        <br>
        <div class="col-lg-10 col-lg-offset-1" id="mapa" style="height: 400px; margin-top: 20px;">

        </div>
    </div>

    <?php echo form_open("tramites/tramitesDocumentos", array("id"=>"archivosForm", "name"=>"archivosForm")) ?>
        <input type="hidden" name="lat" id="lat" value="" />
        <input type="hidden" name="lng" id="lng" value="" />
        <input type="hidden" name="idTramite" id="idTramite" value="" />
    <?php echo form_close(); ?>
</div>
<br><br>

<?php echo $footer; ?>
</body>
</html>