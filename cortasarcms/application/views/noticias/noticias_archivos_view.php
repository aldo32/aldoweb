<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CortazarCMS - Noticias - Multimedia</title>

    <?php echo $includes?>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

    <!-- DataTables -->
    <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#tablaNoticiasArchivos").DataTable({
                stateSave: true,
            });

            $("#messageAlert").delay(<?php echo TIMER_ALERT ?>).fadeOut("slow");

            $(".nyroModal").nyroModal({
                closeOnEscape: true,
                closeOnClick: true,
                showCloseButton: true,
                callbacks: {
                    afterClose: function() {
                    }
                }
            });

            $(document).on("click", ".eliminarImagen", function(e) {
                vid = $(this).attr("vid");
                tmp = vid.split("-");
                idArchivo = tmp[0];
                idNoticia = tmp[1];

                if (confirm("realmente desea aliminar el archivo?")) {
                    $.ajax({
                        url: "<?php echo base_url("noticias/eliminarArchivo") ?>",
                        data: "idNoticia="+idNoticia+"&idArchivo="+idArchivo+"&<?php echo $this->security->get_csrf_token_name()?>=<?php echo $this->security->get_csrf_hash()?>",
                        dataType: "html",
                        success: function(datos) {
                            window.location = "<?php echo base_url("noticias/multimedia/".$noticia->id); ?>";
                        },
                        type: "POST"
                    });
                }
            });

            $("#subirarchivo").click(function(e) {
                e.preventDefault();

                if($("#upload").val() == "") alert("Debe seleccionar un archivo para continuar");
                else {
                    $(this).attr("disable", true);
                    $("#uploadForm").submit();
                }
            });
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <?php echo $header?>

    <?php echo $sidebar?>

    <div class="content-wrapper">
        <section class="content-header" style="margin-left: 0px;">
            <h1><?php echo $noticia->titulo ?><small> Archivos multimedia </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url("noticias") ?>">Noticias</li></a>
                <li class="active">Archivos multimedia</li>
                <!--
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
                -->
            </ol>
        </section>

        <section class="content">
                <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo "Noticia: ".$noticia->titulo ?></h3>
                </div>

                <div class="box-body">
                    <?php
                    if (isset($message)) {
                        ?>
                        <div><?php echo $message ?></div>
                        <?php
                    }
                    ?>

                    <?php echo form_open_multipart("noticias/subirarchivo", array("name"=>"uploadForm", "id"=>"uploadForm"), array("idNoticia"=>$noticia->id)) ?>
                        Solo formato pdf|mov|avi|mp4|jpg|png|jpeg
                        <input type="file" name="upload[]" id="upload" multiple>
                        <br>
                        <button class="btn btn-primary btn-xs" id="subirarchivo">Agregar archivo multimedia</button>
                    <?php echo form_close(); ?>
                    <br><br>

                    <table id="tablaNoticiasArchivos" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Archivo</th>
                            <th>Ver</th>
                            <th>Creado</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($archivos)) {
                            foreach ($archivos as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->archivo ?></td>
                                    <?php
                                    $tmp = explode(".", $row->archivo);
                                    ?>
                                    <td><a href="<?php echo base_url().$row->archivo?>" class="<?php echo ($tmp[1] == "jpg" || $tmp[1] == "png" || $tmp[1] == "jpeg") ? "nyroModal" : ""; ?>">Ver archivo</a></td>
                                    <td><?php echo $row->creado ?></td>
                                    <td><button class="btn btn-danger btn-xs eliminarImagen" type="button" vid="<?php echo $row->id."-".$noticia->id ?>">Eliminar archivo</button></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <?php echo $footer;?>

    <?php echo $control_sidebar; ?>
</div>
<!-- ./wrapper -->


</body>
</html>
