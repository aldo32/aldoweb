<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CortasarCMS - Usuarios</title>

		<?php echo $includes?>

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

        <!-- DataTables -->
        <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
            $("#tablaUsuarios").DataTable({
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
				<h1>Modulo de usuarios<small>  </small></h1>
				<ol class="breadcrumb">
            		<li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li class="active">Administrar usuarios</li>
					<!--
            		<li><a href="#">Tables</a></li>
            		<li class="active">Data tables</li>
					-->
          		</ol>
			</section>

			<section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de usuarios</h3>
                    </div>

                    <div class="box-body">
						<?php						
						if ($alert != "") {
							?>
							<div class="alert alert-success alert-dismissable">
		                    	<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		                    	<h4><i class="icon fa fa-check"></i> Notificación!</h4>
		                    	<?php echo $alert; ?>
		                  	</div>
							<?php
						}
						?>

                        <a href="<?php echo base_url("usuarios/nuevo") ?>"><button class="btn btn-primary">Crear nuevo usuario</button></a>
                        <br><br>

                        <table id="tablaUsuarios" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>&nbsp;&nbsp;&nbsp;</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Creado</th>
                                    <th>Activo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($usuarios)) {
                                    foreach ($usuarios as $row) {
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
                                                        <li><a href="#">Editar</a></li>
                                                        <li><a href="#">Desactivar</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Eliminar</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php echo $row->nombre." ".$row->apellidos ?></td>
                                            <td><?php echo $row->telefono ?></td>
                                            <td><?php echo $row->email ?></td>
                                            <td><?php echo $row->creado ?></td>
                                            <td><?php echo ($row->activo == 1) ? "Si" : "No" ?></td>
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
