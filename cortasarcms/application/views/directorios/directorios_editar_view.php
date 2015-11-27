<?php
if ($directorio != "") {
    $title = "Editando <b>".$directorio->nombre."</b> en el directorio";
    $type = "update";
}
else {
    $title = "Nuevo registro";
    $type = "insert";
    $directorio = new directorio();
}

class directorio {
    var $id;
    var $nombre;
    var $apellidos;
    var $direccion;
    var $correo;
    var $puesto;
    var $horario;
    var $foto;
    var $telefono;
    var $activo;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CortasarCMS - Directorio</title>

    <?php echo $includes?>


    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

    <!-- DataTables -->
    <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

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

            $("#eliminarImagen").click(function() {
                idDirectorio = $(this).attr("vid");

                $.ajax({
                    url: "<?php echo base_url("directorios/eliminarImagen") ?>",
                    data: "idDirectorio="+idDirectorio+"&<?php echo $this->security->get_csrf_token_name()?>=<?php echo $this->security->get_csrf_hash()?>",
                    dataType: "html",
                    success: function(datos) {
                        $("#wrap_image").html(datos)
                    },
                    type: "POST"
                });
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
            <h1>Directorio<small> <?php echo $title; ?> </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="<?php echo base_url("directorios") ?>">Directorios</li></a>
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
                    <?php echo form_open_multipart("directorios/guardar", array("name"=>"directoryForm", "id"=>"directoryForm"), array("idDirectorio"=>$directorio->id, "type"=>$type, "activo"=>1)); ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Nombre</label>
                                <?php echo form_input(array('name'=>'nombre','id'=>'nombre', 'class'=>'form-control input-sm', 'value' =>set_value('nombre', $directorio->nombre)));?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Apellidos</label>
                                <?php echo form_input(array('name'=>'apellidos','id'=>'apellidos', 'class'=>'form-control input-sm', 'value' =>set_value('apellidos', $directorio->apellidos)));?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Teléfono</label>
                                <?php echo form_input(array('name'=>'telefono','id'=>'telefono', 'class'=>'form-control input-sm', 'value' =>set_value('telefono', $directorio->telefono)));?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Dirección</label>
                                <?php echo form_input(array('name'=>'direccion','id'=>'direccion', 'class'=>'form-control input-sm', 'value' =>set_value('direccion', $directorio->direccion)));?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Correo</label>
                                <?php
                                if ($type == "insert")
                                    echo form_input(array('name'=>'correo','id'=>'correo', 'type'=>'email', 'class'=>'form-control input-sm', 'value' =>set_value('correo', $directorio->correo)));
                                else
                                    echo form_input(array('name'=>'correo','id'=>'correo', 'type'=>'email', 'readonly'=>"", 'class'=>'form-control input-sm', 'value' =>set_value('correo', $directorio->correo)));
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Puesto</label>
                                <?php echo form_input(array('name'=>'puesto','id'=>'puesto', 'class'=>'form-control input-sm', 'value' =>set_value('puesto', $directorio->puesto)));?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Horario</label>
                                <?php echo form_input(array('name'=>'horario','id'=>'horario', 'class'=>'form-control input-sm', 'value' =>set_value('horario', $directorio->horario)));?>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Foto</label>
                                <?php
                                if ($directorio->foto == "") {
                                    ?>
                                    <strong><?php echo (isset($uploadErros)) ? $uploadErros : ""; ?></strong>
                                    <input type="file" name="foto" id="foto">
                                    <?php
                                }
                                else {
                                    ?>
                                    <div id="wrap_image">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="<?php echo base_url().$directorio->foto?>" class="nyroModal">ver foto</a>
                                        <button class="btn btn-danger btn-xs" type="button" id="eliminarImagen" vid="<?php echo $directorio->id ?>">Eliminar foto</button>
                                    </div>
                                    <?php
                                }
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
