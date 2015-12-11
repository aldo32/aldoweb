<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CortasarCMS - Antecedentes</title>

    <?php echo $includes?>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

    <!-- DataTables -->
    <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#tablaAntecedentes").DataTable({
                stateSave: true,
            });

            $(".nyroModal").nyroModal({
                closeOnEscape: true,
                closeOnClick: true,
                showCloseButton: false,
                callbacks: {
                    afterClose: function() {
                    }
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
            <h1>Modulo de Antecedentes<small>  </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Administrar Antecedentes</li>
                <!--
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
                -->
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de Antecedentes</h3>
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

                    <a href="<?php echo base_url("antecedentes/nuevo") ?>"><button class="btn btn-primary">Crear nuevo antecedente</button></a>

                    <br><br>

                    <table id="tablaAntecedentes" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>&nbsp;&nbsp;&nbsp;</th>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Creado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($antecedentes)) {
                            foreach ($antecedentes as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs" type="button"><i class="fa fa-fw fa-bars"></i></button>
                                            <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" type="button" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="<?php echo base_url('antecedentes/editar/'.$row->id); ?>">Editar</a></li>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo base_url('antecedentes/eliminar/'.$row->id); ?>" class="elimarCategoria">Eliminar</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo word_limiter($row->descripcion, 8) ?></td>
                                    <td><?php echo $row->creado ?></td>
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
