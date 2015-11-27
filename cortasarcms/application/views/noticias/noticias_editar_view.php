<?php
if ($noticia != "") {
    $title = "Editando noticia: <b>".$noticia->titulo."</b>";
    $type = "update";
}
else {
    $title = "Nueva noticia";
    $type = "insert";
    $noticia = new noticia();
}

class noticia {
    var $id;
    var $titulo;
    var $nota;
    var $descripcion;
    var $autor;
    var $formato;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CortasarCMS - Noticias</title>

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

            $("#nota").wysihtml5();
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
            <h1>Noticias<small> <?php echo $title; ?> </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url("noticias") ?>">Noticias</li></a>
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
                    <?php echo form_open_multipart("noticias/guardar", array("name"=>"newsForm", "id"=>"newsForm"), array("idNoticia"=>$noticia->id, "type"=>$type, "activo"=>1)); ?>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Titulo</label>
                            <?php echo form_input(array('name'=>'titulo','id'=>'titulo', 'class'=>'form-control input-sm', 'value' =>set_value('titulo', $noticia->titulo)));?>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Nota</label>
                            <textarea style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 0px;" name="nota" id="nota" placeholder="Escriba la noticia"><?php echo set_value("nota", $noticia->nota) ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Descripción</label>
                            <?php echo form_input(array('name'=>'descripcion','id'=>'descripcion', 'class'=>'form-control input-sm', 'value' =>set_value('descripcion', $noticia->descripcion)));?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Autor</label>
                            <?php echo form_input(array('name'=>'autor','id'=>'autor', 'class'=>'form-control input-sm', 'value' =>set_value('autor', $noticia->autor)));?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Formato</label>
                            <?php
                            $options = array("-1"=>"Seleccione un formato", "1"=>"Formato 1", "2"=>"Formato 2");
                            echo form_dropdown("formato", $options, set_value("formato", $noticia->formato), "class='form-control input-sm' id='formato'");
                            ?>
                        </div>
                    </div>


                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <br>
                    <?php echo form_close(); ?>

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
            </div>
        </section>
    </div>

    <?php echo $footer;?>

    <?php echo $control_sidebar; ?>
</div>
<!-- ./wrapper -->


</body>
</html>
