<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CortazarCMS - Tramites</title>

		<?php echo $includes?>

        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

        <!-- DataTables -->
        <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
            $('.nyroModal').nyroModal({
                closeOnEscape: true,
                closeOnClick: true,
                showCloseButton: true,
                callbacks: {
                    afterClose: function() {
                    }
                }
            });

            $("#tablaTramites").DataTable({
                stateSave: true,
            });

            $("#tablaTramitesIniciados").DataTable({
                stateSave: true,
            });

			$("#messageAlert").delay(<?php echo TIMER_ALERT ?>).fadeOut("slow");

            $(document).on("change", ".idEstatus", function() {
                id = $(this).attr("id");
                estatus = $(this).val();

                if (confirm("Realmente desea cambiar el estatus del tramite?")) {
                    $.ajax({
                        url: "<?php echo base_url("tramites/changeStatusTramite") ?>",
                        data: "id="+id+"&estatus="+estatus,
                        dataType: "html",
                        success: function(datos) {
                            alert("Se cambio es status del tramite");
                        },
                        type: "POST"
                    });
                }
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
                                    <th width="70">Op</th>
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
                                ?>
                            </tbody>
                        </table>

                    </div>


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Tramites realizados</h3>
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
                            <table id="tablaTramitesIniciados" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Subcategoria</th>
                                    <th>Email</th>
                                    <th>Documentos del tramite</th>
                                    <th>Documentos subidos</th>
                                    <th>Estatus</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($tramitesIniciados)) {
                                    foreach ($tramitesIniciados as $row) {
                                        $opciones = array("0"=>"Revición", "1"=>"Aceptado", "2"=>"Rechazado");
                                        ?>
                                        <tr>
                                            <td><?php echo $row->idTramite ?></td>
                                            <td><?php echo $row->nombre ?></td>
                                            <td><?php echo $row->nombreCategoria ?></td>
                                            <td><?php echo $row->nombreSubCategoria ?></td>
                                            <td><?php echo $row->emailUsuario ?></td>
                                            <td><a href="<?php echo base_url("tramites/viewDownloadDocsTramite/".$row->id."/".$row->idTramite); ?>" class="nyroModal"><?php echo $row->documentosTramite ?></a></td>
                                            <td><a href="<?php echo base_url("tramites/viewDownloadDocsTramite/".$row->id."/".$row->idTramite); ?>" class="nyroModal"><?php echo $row->documentosSubidos ?></a></td>
                                            <td><?php echo form_dropdown("idEstatus", $opciones, set_value("idEstatus", $row->estatus), "class='form-control input-sm idEstatus' id='".$row->id."'");?></td>
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
		</div>

		<?php echo $footer;?>

		<?php echo $control_sidebar; ?>
	</div>
	<!-- ./wrapper -->


</body>
</html>
