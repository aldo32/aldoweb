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
            $("#saveTramite").click(function() {
                if (confirm("Esta seguro que desea continuar con el tramite?")) {
                    if ($("#nombre").val() == "") alert("Debe ingresar su nombre completo");
                    else if ($("#correo").val() == "") alert("debe ingresar una cuenta de correo");
                    else {
                        $("#saveForm").submit();
                    }
                }
            });
        });
    </script>

    <style>
        .fleft { float: left; }
        .fright { float: right; }
        .titulo_tramite { width: 100%; height: 38px; line-height: 38px; color: #fff; font-weight: bold; padding-left: 5px; margin-bottom: 20px; background: url('../resources/images/back_titulo.png') no-repeat; }
    </style>
</head>
<body>

<?php echo $header; ?>

<br><br><br><br>
<?php
//print_r($documentos);
?>
<div class="container-fluid">
    <?php echo form_open_multipart("tramites/guardarTramite", array("name"=>"saveForm", "id"=>"saveForm"), array("idTramite"=>$idTramite, "lat"=>$lat, "lng"=>$lng)); ?>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1><?php echo $tramite->nombre ?></h1>
                <div class="titulo_tramite">Datos generales</div>
                <div class="form-group col-md-12">
                    <label>Nombre completo</label>
                    <?php echo form_input(array('name'=>'nombre','id'=>'nombre', 'class'=>'form-control input-sm', 'value' =>set_value('nombre')));?>
                </div>
                <div class="form-group col-md-12" style="margin-bottom: 50px;">
                    <label>Correo</label>
                    <?php echo form_input(array('name'=>'correo','id'=>'correo', 'class'=>'form-control input-sm', 'value' =>set_value('correo')));?>
                </div>

                <h2 style="margin: 0px; padding: 0px;">&nbsp;</h2>
                <div class="titulo_tramite">Documentos para el tramite</div>
                <p>Archivos validos: pdf|doc|docx|xls|xlsx|jpg|png|jpeg</p>
                <br>
                <?php
                if (isset($documentos)) {
                    foreach ($documentos AS $row) {
                        ?>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-2 clearfix">
                                <img src="<?php echo base_url()?>resources/images/icono_documento.png" width="103" height="123">
                            </div>
                            <div class="col-md-10 clearfix">
                                <label><?php echo $row->nombreArchivo ?></label>
                                <?php echo form_input(array('name'=>"documentos[]", 'class'=>'', "type"=>"file"));?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>&nbsp;</h2>
                <div class="titulo_tramite">Reglas del tramite</div>
                <br>
                <?php
                if (!empty($reglas)) {
                    foreach ($reglas AS $row) {
                        ?>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-10" style="margin-bottom: 0px;">
                                <label><?php echo $row->regla ?></label>
                                <?php
                                //get reglas para tramite
                                $url = URL_CMS."RestTramites/documentosReglasTramite";
                                $params = array("idTramite"=>$idTramite, "idRegla"=>$row->id);
                                $res = $controller->consumeRest($url, $params);

                                $reglasDocumentos = json_decode($res);

                                if (!empty($reglasDocumentos)) {
                                    foreach ($reglasDocumentos AS $row) {
                                        ?>
                                        <div class="clearfix" style="margin-bottom: 10px;">
                                            <div class="col-md-2 clearfix" style="margin-right: 35px;">
                                                <img src="<?php echo base_url()?>resources/images/icono_documento.png" width="103" height="123">
                                            </div>
                                            <?php
                                            echo "<br>".$row->nombreArchivo;
                                            echo form_input(array('name'=>"documentos[]", 'class'=>'', "type"=>"file"));
                                            ?>
                                            </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                else echo "Ninguna regla para este tramite";
                ?>

                <br><br>
                <button class="btn btn-default" type="button" id="saveTramite">Iniciar tramite</button>
            </div>
        </div>
    <?php echo form_close(); ?>
</div>

<br>
<?php echo $footer; ?>
</body>
</html>