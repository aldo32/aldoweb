<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CortasarCMS - Tramites</title>

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
            idTramite = <?php echo $tramite->id ?>;

            $("#tablaReglas").DataTable({
                stateSave: true,
            });

            $("#tablaDocumentos").DataTable({
                stateSave: true,
            });

            //add new rule
            $("#addRule").click(function() {
                regla = $("#regla");
                if (regla.val() == "") alert("Debe escribir una regla para el tramite");
                else {
                    $("#messageRegla").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;Guardando...");
                    $.ajax({
                        url: "<?php echo base_url("tramites/RDCaddRule") ?>",
                        data: "idTramite="+idTramite+"&regla="+regla.val()+"&<?php echo $this->security->get_csrf_token_name()?>=<?php echo $this->security->get_csrf_hash()?>",
                        dataType: "html",
                        success: function(datos) {
                            $("#messageRegla").html(datos);
                        },
                        type: "POST"
                    });
                }
            });

            //delete rule
            $(document).on("click", ".eliminarRegla", function() {
                idRegla = $(this).attr("id");

                $("#messageRegla").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;Eliminando...");
                $.ajax({
                    url: "<?php echo base_url("tramites/RDCdeleteRule") ?>",
                    data: "idTramite="+idTramite+"&idRegla="+idRegla+"&<?php echo $this->security->get_csrf_token_name()?>=<?php echo $this->security->get_csrf_hash()?>",
                    dataType: "html",
                    success: function(datos) {
                        $("#messageRegla").html(datos);
                    },
                    type: "POST"
                });
            });

            //add new document
            $("#addDocument").click(function() {
                documento = $("#documento");
                descripcion = $("#descripcion");
                if (documento.val() == "") alert("Debe escribir una documento para el tramite");
                else {
                    $("#messageDocumento").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;Guardando...");
                    $.ajax({
                        url: "<?php echo base_url("tramites/RDCaddDocument") ?>",
                        data: "idTramite="+idTramite+"&documento="+documento.val()+"&descripcion="+documento.val()+"&<?php echo $this->security->get_csrf_token_name()?>=<?php echo $this->security->get_csrf_hash()?>",
                        dataType: "html",
                        success: function(datos) {
                            $("#messageDocumento").html(datos);
                        },
                        type: "POST"
                    });
                }
            });

            //delete document
            $(document).on("click", ".eliminarDocumento", function() {
                idDocumento = $(this).attr("id");

                $("#messageDocumento").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;Eliminando...");
                $.ajax({
                    url: "<?php echo base_url("tramites/RDCdeleteDocument") ?>",
                    data: "idTramite="+idTramite+"&idDocumento="+idDocumento+"&<?php echo $this->security->get_csrf_token_name()?>=<?php echo $this->security->get_csrf_hash()?>",
                    dataType: "html",
                    success: function(datos) {
                        $("#messageDocumento").html(datos);
                    },
                    type: "POST"
                });
            });

            $("#addFileEmail").click(function() {
                $("#filesContent").append("<div class='form-group col-md-12'><input type='file' name='archivoAdjunto[]' id='archivoAdjunto'></div>");
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
			<h1><?php echo $tramite->nombre ?><small> Reglas, Documentos y Correos </small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
				<li><a href="<?php echo base_url("tramites") ?>">Administrar tramites</li></a>
				<li class="active"><a href="#">Tramites - Reglas. Documentos y Correos</a></li>
			</ol>
		</section>

		<section class="content">
			<div class="box">
                <div class="box-header">
                    <h3 class="box-title">Reglas del tramite</h3>
                </div>

				<div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Regla</label>
                            <?php echo form_input(array('name'=>'regla','id'=>'regla', 'class'=>'form-control input-sm', 'value' =>set_value('regla')));?>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="addRule">Agregar Regla</button>

                    <br><br>
                    <div id="messageRegla">
                        <table id="tablaReglas" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Creado</th>
                                <th width="50">Operaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($reglas) {
                                    foreach($reglas AS $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php echo $row->regla ?></td>
                                            <td><?php echo $row->creado ?></td>
                                            <td><a href="javascript:void(0);" class="eliminarRegla" id="<?php echo $row->id ?>"><button class="btn btn-block btn-danger btn-xs">Eliminar</button></a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Documentos necesarios para el tramite</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Documento</label>
                            <?php echo form_input(array('name'=>'documento','id'=>'documento', 'class'=>'form-control input-sm', 'value' =>set_value('documento')));?>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Descripción</label>
                            <?php echo form_input(array('name'=>'descripcion','id'=>'descripcion', 'class'=>'form-control input-sm', 'value' =>set_value('descripcion')));?>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="addDocument">Agregar Documento</button>

                    <br><br>
                    <div id="messageDocumento">
                        <table id="tablaDocumentos" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Documento</th>
                                <th>Descripción</th>
                                <th>Creado</th>
                                <th width="50">Operaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($documentos) {
                                foreach($documentos AS $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->id ?></td>
                                        <td><?php echo $row->archivo ?></td>
                                        <td><?php echo $row->descripcion ?></td>
                                        <td><?php echo $row->creado ?></td>
                                        <td><a href="javascript:void(0);" class="eliminarDocumento" id="<?php echo $row->id ?>"><button class="btn btn-block btn-danger btn-xs">Eliminar</button></a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Configuración de correos por tramite</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Titulo del correo</label>
                            <?php echo form_input(array('name'=>'titulo','id'=>'titulo', 'class'=>'form-control input-sm', 'value' =>set_value('titulo')));?>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Correo</label>
                            <textarea class="form-control input-sm" name="correo" id="correo" cols="50" rows="6">
                                <?php echo set_value("correo") ?>
                            </textarea>
                        </div>
                        <div id="filesContent">
                            <div class="form-group col-md-12">
                                <label>Adjuntar archivos</label>
                                <input type="file" name="archivoAdjunto[]" id="archivoAdjunto">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="javascript:void(0);" id="addFileEmail">Agregar otro archivo</a>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary" id="addRule">Guardar correo</button>
                </div>
            </div>

            <!-- Modal window to messages -->
            <div id="formError" style="display: none;">
                <div class="<?php echo MODAL_CLASS ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a onclick="$.nmTop().close(); clear();"><button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">x</span></button></a>
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
		</section>
	</div>

	<?php echo $footer;?>

	<?php echo $control_sidebar; ?>
</div>
<!-- ./wrapper -->


</body>
</html>
