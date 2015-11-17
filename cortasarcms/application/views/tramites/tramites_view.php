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

		<script type="text/javascript">
		$(document).ready(function() {
            $("#tablaTramites").DataTable({
                stateSave: true,
            });

			$("#messageAlert").delay(<?php echo TIMER_ALERT ?>).fadeOut("slow");
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
				<h1>Modulo de tramites<small>  </small></h1>
				<ol class="breadcrumb">
            		<li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Administrar tramites</li>
          		</ol>
			</section>

			<section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de Tramites</h3>
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

                        <a href="<?php echo base_url("tramites/nuevo") ?>"><button class="btn btn-primary">Crear nuevo tramite</button></a>
                        <br><br>

                        <table id="tablaTramites" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Op</th>
                                    <th>ID</th>
									<th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Categoria</th>
                                    <th>Subcategoria</th>
                                    <th>Creado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($tramites)) {
                                    foreach ($tramites as $row) {
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
                                                        <li><a href="<?php echo base_url('tramites/editar/'.$row->id); ?>">Editar</a></li>
                                                        <li><a href="<?php echo base_url('tramites/RDC/'.$row->id); ?>">Reglas, Documentos, Correos</a></li>
                                                        <li><a href="<?php echo base_url('tramites/archivosCorreos/'.$row->id); ?>">Archivos para correos</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php echo base_url('tramites/eliminar/'.$row->id); ?>" class="elimarTramite">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td><?php echo $row->id ?></td>
											<td><?php echo $row->nombre ?></td>
                                            <td><?php echo $row->descripcion ?></td>
                                            <td><?php echo $row->nombreCategoria ?></td>
                                            <td><?php echo $row->nombreSubCategoria ?></td>
                                            <td><?php echo $row->creado ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                    <tr>
										<td>No hay datos</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
									</tr>
                                    <?php
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
