<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CortasarCMS - Categorias</title>

		<?php echo $includes?>

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

        <!-- DataTables -->
        <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
            $("#tablaCategorias").DataTable({
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

			$("#type").change(function() { $("#formCategorias").submit(); });

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
				<h1>Modulo de categorias<small>  </small></h1>
				<ol class="breadcrumb">
            		<li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Administrar categorias</li>
					<!--
            		<li><a href="#">Tables</a></li>
            		<li class="active">Data tables</li>
					-->
          		</ol>
			</section>

			<section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Categorias</h3>
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

                        <a href="<?php echo base_url("categorias/nuevo/cat") ?>"><button class="btn btn-primary">Crear nueva categoria</button></a>
						&nbsp;&nbsp;&nbsp;
						<a href="<?php echo base_url("categorias/nuevo/sub") ?>"><button class="btn btn-info">Crear nueva sub categoria</button></a>

                        <br><br>
						<div class="row">
							<div class="form-group col-md-4">
								<label>Mostrar</label>
								<?php
								echo form_open("categorias", array("id"=>"formCategorias"));
									$options = array("cat"=>"Categorias", "sub"=>"Subcategorias");
									echo form_dropdown("type", $options, set_value("type"), "id='type' class='form-control input-sm'");
								echo form_close();
								?>
							</div>
						</div>
						<br><br>

                        <table id="tablaCategorias" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>&nbsp;&nbsp;&nbsp;</th>
                                    <th>ID</th>
									<?php echo ($type == "sub") ? "<th>Categoria</th>" : ""; ?>
                                    <th>Nombre</th>
									<th>Descripción</th>
                                    <th>Creado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($registers)) {
                                    foreach ($registers as $row) {
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
                                                        <li><a href="<?php echo base_url('categorias/editar/'.$row->id.'/'.$type); ?>">Editar</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php echo base_url('categorias/eliminar/'.$row->id.'/'.$type); ?>" class="elimarCategoria">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td><?php echo $row->id ?></td>
											<?php echo ($type == "sub") ? "<td>".$row->nombreCategoria."</td>" : ""; ?>
                                            <td><?php echo $row->nombre ?></td>
											<td><?php echo word_limiter($row->descripcion, 8) ?></td>
                                            <td><?php echo $row->creado ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else {
                                    ?><tr>
										<td >No hay datos</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<?php echo ($type == "sub") ? "<td>&nbsp;</td>" : ""; ?>
									</tr><?php
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
