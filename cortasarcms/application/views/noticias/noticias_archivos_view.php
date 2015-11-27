<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CortasarCMS - Noticias - Multimedia</title>

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
                showCloseButton: false,
                callbacks: {
                    afterClose: function() {
                    }
                }
            });

            $(document).on("click", ".class", function(e) {

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
                    if ($alert != "") {
                        ?>
                        <div class="alert <?php echo $alert["type"] ?> alert-dismissable" id="messageAlert">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="icon fa <?php echo $alert["image"] ?>"></i> Mensaje!</h4>
                            <?php echo $alert["message"]; ?>
                        </div>
                        <?php
                    }
                    ?>

                    <a href="<?php echo base_url("noticias/nuevoarchivo") ?>"><button class="btn btn-primary">Nueva Noticia</button></a>
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
                                    <td><a href="<?php echo base_url().$row->archivo?>">Ver archivo</a></td>
                                    <td><?php echo $row->creado ?></td>
                                    <td><button class="btn btn-danger btn-xs" type="button" id="eliminarImagen" vid="<?php echo $row->id ?>">Eliminar archivo</button></td>
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
