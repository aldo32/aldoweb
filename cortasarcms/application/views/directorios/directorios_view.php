<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CortasarCMS - Directorios</title>

    <?php echo $includes?>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

    <!-- DataTables -->
    <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#tablaDirectorios").DataTable({
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

            $(document).on("click", ".elimarUsuario", function(e) {

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
            <h1>Modulo de directorio<small>  </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Administrar directorio</li>
                <!--
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
                -->
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Directorio</h3>
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

                    <a href="<?php echo base_url("directorios/nuevo") ?>"><button class="btn btn-primary">Agregar persona a directorio</button></a>
                    <br><br>

                    <table id="tablaDirectorios" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>&nbsp;&nbsp;&nbsp;</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Foto</th>
                            <th>Activo</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($directorios)) {
                            foreach ($directorios as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs" type="button"><i class="fa fa-fw fa-bars"></i></button>
                                            <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" type="button" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <?php
                                            $activo = ($row->activo == 1) ? 0 : 1;
                                            $messageActivo = ($row->activo == 1) ? "Dessactivar" : "Activar";
                                            ?>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="<?php echo base_url('directorios/editar/'.$row->id); ?>">Editar</a></li>
                                                <li><a href="<?php echo base_url('directorios/desactivar/'.$row->id.'/'.$activo); ?>"><?php echo $messageActivo ?></a></li>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo base_url('directorios/eliminar/'.$row->id); ?>" class="elimarDirectorio">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->nombre." ".$row->apellidos ?></td>
                                    <td><?php echo $row->telefono ?></td>
                                    <td><?php echo $row->correo ?></td>
                                    <td>
                                        <?php
                                        if ($row->foto == "") {
                                            ?>Sin foto<?php
                                        }
                                        else {
                                            ?>
                                            <a href="<?php echo $row->foto?>" class="nyroModal">ver foto</a></td>
                                            <?php
                                        }
                                        ?>
                                    <td><?php echo ($row->activo == 1) ? "Si" : "No" ?></td>
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
