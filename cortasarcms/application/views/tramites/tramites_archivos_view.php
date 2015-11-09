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
				<div class="box-body">
					<?php echo form_open("tramites/guardararchivos", array("name"=>"archivosForm", "id"=>"archivosForm"), array()); ?>
					<div class="row">
						<div class="form-group col-md-4">
							<label>Nombre</label>
							<?php echo form_input(array('name'=>'nombre','id'=>'nombre', 'class'=>'form-control input-sm', 'value' =>set_value('nombre')));?>
						</div>
					</div>
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
