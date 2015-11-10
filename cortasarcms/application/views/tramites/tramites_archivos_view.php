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
            $("#messageAlert").delay(15000).fadeOut("slow");

            $("#tablaArchivos").DataTable({
                stateSave: true,
            });

            <?php
            if (validation_errors() != "") {
            ?>
                $.nmManual('#formError', {
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
			<h1>Modulo de tramites<small> Archivos </small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
				<li><a href="<?php echo base_url("tramites") ?>">Administrar tramites</li></a>
				<li class="active"><a href="#">Tramites - Archivos</a></li>
			</ol>
		</section>

		<section class="content">
			<div class="box">
                <div class="box-header">
                    <h3 class="box-title">Archivos para tramites</h3>
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


					<?php echo form_open_multipart("tramites/guardararchivos", array("name"=>"filesForm", "id"=>"filesForm"), array()); ?>
						<div class="row">
							<div class="form-group col-md-4">
								<label>Tramites</label>
								<?php echo form_dropdown("idTramite", $tramites, set_value("idTramite"), "class='form-control input-sm' id='idTramite'");?>
							</div>
						</div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Tipo</label>
                                <?php
                                $tipos = array("-1"=>"Seleccione un tipo", "upload"=>"Upload", "download"=>"Download");
                                echo form_dropdown("tipo", $tipos, set_value("tipo"), "class='form-control input-sm' id='tipo'");
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control input-sm" cols="60" rows="5"><?php echo set_value("description") ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Archivos [PDF, DOC, DOCX, XLS, XLSX, JPG, PNG]</label>
                                <input type="file" id="tramitesFiles" name="tramitesFiles[]" multiple>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
					<?php echo form_close(); ?>

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
				</div>
			</div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Listado de archivos cargados</h3>
                </div>

                <div class="box-body">
                    <table id="tablaArchivos" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="40">&nbsp;&nbsp;&nbsp;</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Archivo</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Creado</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($archivosTramites)) {
                                foreach ($archivosTramites as $row) {
                                    $tmp = explode("/", $row->archivo);
                                    $nameArchivo = $tmp[count($tmp)-1];
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
                                                    <li><a href="<?php echo base_url('tramites/eliminararchivo/'.$row->id); ?>" class="elimarUsuario">Eliminar</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><?php echo $row->id ?></td>
                                        <td><?php echo $row->nombreTramite ?></td>
                                        <td><a href="<?php echo base_url().$row->archivo ?>" target="_blank"><?php echo $nameArchivo ?></a></td>
                                        <td><?php echo $row->tipo ?></td>
                                        <td><?php echo $row->descripcion ?></td>
                                        <td><?php echo $row->creado ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else {
                                ?><tr><td colspan="7">No hay datos</td></tr><?php
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
