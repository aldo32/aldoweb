<?php
if ($antecedente != "") {
    $title = "Editando antecedente";
    $type = "update";
}
else {
    $title = "Nuevo antecedente";
    $type = "insert";
    $antecedente = new antecedente();
}

class antecedente {
    var $id;
    var $descripcion;
    var $fecha;
}
?>

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

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="<?php echo base_url()?>/resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".nyroModal").nyroModal({
                closeOnEscape: true,
                closeOnClick: true,
                showCloseButton: false,
                callbacks: {
                    afterClose: function() {
                    }
                }
            });

            <?php
            if (validation_errors() != "") {
                ?>
            $.nmManual('#test', {
                    closeOnEscape: true,
                    closeOnClick: true,
                    showCloseButton: false,
                    callbacks: {
                        afterClose: function() {
                        }
                    }
                }
            );
            <?php
            }
            ?>

            $("#descripcion").wysihtml5();

            $("#tablaBanners").DataTable({
                stateSave: true,
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
            <h1>Antecedentes<small> <?php echo $title; ?> </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url("antecedentes") ?>">Antecedentes</li></a>
                <li class="active"><a href="#"><?php echo $title; ?></a></li>
                <!--
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
                -->
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body">
                    <?php echo form_open("antecedentes/guardar", array("name"=>"antForm", "id"=>"antForm"), array("id"=>$antecedente->id, "type"=>$type)); ?>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Descripción</label>
                                <textarea style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 0px;" name="descripcion" id="descripcion" placeholder="Escriba la noticia"><?php echo set_value("nota", $antecedente->descripcion) ?></textarea>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <br>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Nuestras Fiestas [Galeria]</h3>
                </div>

                <div class="box-body">
                    <?php echo form_open_multipart("antecedentes/guardarImagen", array("name"=>"imageForm", "id"=>"imageForm"), array("id"=>$antecedente->id, "type"=>$type)); ?>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Titulo</label>
                            <?php echo form_input(array('name'=>'titulo','id'=>'titulo', 'class'=>'form-control input-sm', 'value' =>set_value('titulo')));?>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Imagen</label>
                            <input type="file" name="imagen" id="imagen">
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <br>
                    <?php echo form_close(); ?>
                    <br><br>

                    <table id="tablaBanners" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Imagen</th>
                            <th>Creado</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($bannersFiestas)) {
                            foreach ($bannersFiestas as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->id ?></td>
                                    <td><?php echo $row->titulo ?></td>
                                    <td><a href="<?php echo base_url().$row->archivo ?>">Ver imagen</a></td>
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

        <!-- Modal window to messages -->
        <div id="test" style="display: none;">
            <div class="<?php echo MODAL_CLASS ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a onclick="$.nmTop().close(); clear();"><button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button></a>
                            <h4 class="modal-title">Advertencia</h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo (validation_errors() != "") ? validation_errors() : ""; ?></p>
                        </div>
                        <div class="modal-footer">
                            <a onclick="$.nmTop().close(); clear();"><button data-dismiss="modal" class="btn btn-outline pull-left" type="button">Close</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal window -->
    </div>

    <?php echo $footer;?>

    <?php echo $control_sidebar; ?>
</div>
<!-- ./wrapper -->


</body>
</html>
