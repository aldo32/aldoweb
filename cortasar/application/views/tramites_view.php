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
            $('#comboTramites').multipleSelect({single: true, placeholder: 'Buscar tramite', filter: true});

            $('#comboTramites').change(function(){
                var idTramite = $(this).val();
                $("#idTramite").val(idTramite);

                //get tramite info
                $("#response").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;Cargando...");
                $.ajax({
                    url: "<?php echo base_url("tramites/getTramite") ?>",
                    data: "idTramite="+idTramite,
                    dataType: "html",
                    success: function(datos) {
                        $("#response").html(datos);
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
    </style>
</head>
<body>

<?php echo $header; ?>

<br><br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <?php
            if ($alert != "") {
                echo "<h3>".$alert["message"]."</h3>";
            }
            ?>
            <label>Encuentra aquí el tipo de tramite</label>
            <?php echo form_dropdown("comboTramites", $comboTramites, set_value("comboTramites"), "class='' style='width: 100%' id='comboTramites'");?>
            <input type="hidden" name="archivos" id="archivos" val="" />
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

<?php echo $footer; ?>
</body>
</html>