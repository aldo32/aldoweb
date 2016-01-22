<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CortazarCMS - Secciones</title>

    <?php echo $includes?>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

    <!-- DataTables -->
    <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            <?php
            if (isset($seccion)) echo "CKEDITOR.replace('descripcion');";
            ?>

            $('.nyroModal').nyroModal({
                closeOnEscape: true,
                closeOnClick: true,
                showCloseButton: true,
                callbacks: {
                    afterClose: function() {
                    }
                }
            });

            $("#seccion").change(function() {
                $("#formGetSection").submit();
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
            <h1>Modulo de secciones<small>  </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url("secciones") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Administrar secciones</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Secciones</h3>
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
                    <?php echo form_open("secciones/getSection", array("id"=>"formGetSection"))?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Categoria</label>
                                <?php echo form_dropdown("seccion", $comboSecciones, set_value("seccion"), "class='form-control input-sm' id='seccion'");?>
                            </div>
                        </div>
                        <br>
                    <?php echo form_close(); ?>

                    <?php echo form_open("secciones/saveSection", array("id"=>"formSaveSection"))?>
                        <div id="contentSection">
                            <?php
                            if (isset($seccion)) {
                                ?>
                                <input type="hidden" name="seccion" value="<?php echo $seccion->seccion ?>">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Titulo</label>
                                        <?php echo form_input(array('name'=>'titulo','id'=>'titulo', 'class'=>'form-control input-sm', 'value' =>set_value('titulo', $seccion->titulo)));?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Descripción</label>
                                        <textarea style="" name="descripcion" id="descripcion" placeholder="Escriba la descrición"><?php echo $seccion->descripcion ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Activo&nbsp;&nbsp;</label>
                                        Si&nbsp;&nbsp;
                                        <input type="radio" name="activo" value="1" <?php if ($seccion->activo == 1) { echo "checked"; }  ?>  />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        No&nbsp;&nbsp;
                                        <input type="radio" name="activo" value="0" <?php if ($seccion->activo == 0) { echo "checked"; }  ?>  />
                                    </div>
                                </div>

                                <button class="btn btn-primary" id="saveSection" type="submit">Guardar</button>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                <?php echo form_close(); ?>
        </section>
    </div>

    <?php echo $footer;?>

    <?php echo $control_sidebar; ?>
</div>
<!-- ./wrapper -->


</body>
</html>
