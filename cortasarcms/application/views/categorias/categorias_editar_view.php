<?php
$subtitle = "";
if ($type == "cat") {
    $subtile = "categoria";
}
else {
    $subtitle = "subcategoria";
}

if ($categoria != "") {
    $title = "Editando $subtitle <b>".$categoria->nombre."</b>";
    $operation = "update";
}
else {
    $title = "Nueva $subtitle";
    $operation = "insert";
    $categoria = new categoria;
}

class categoria {
    var $id;
    var $nombre;
    var $idCategoria;
    var $creado;
    var $descripcion;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CortazarCMS - Categorias</title>

		<?php echo $includes?>


        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

        <!-- DataTables -->
        <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
            <?php
            if (validation_errors() != "") {
                ?>
                $.nmManual('#errors', {
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

            CKEDITOR.replace('descripcion');
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
				<h1>Modulo de categorias<small> <?php echo $title; ?> </small></h1>
				<ol class="breadcrumb">
            		<li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="<?php echo base_url("categorias") ?>">Administrar categorias</li></a>
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
                        <?php echo form_open("categorias/guardar", array("name"=>"catForm", "id"=>"catForm"), array("id"=>$categoria->id, "operation"=>$operation, "type"=>$type)); ?>
                            <div class="row">
                                <?php
                                if ($type == "sub") {
                                    ?>
                                    <div class="form-group col-md-4">
                                        <label>Perfil</label>
                                        <?php echo form_dropdown("idCategoria", $comboCategorias, set_value("idCategoria", $categoria->idCategoria), "class='form-control input-sm' id='idCategoria'");?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="form-group col-md-4">
                                    <label>Nombre</label>
                                    <?php echo form_input(array('name'=>'nombre','id'=>'nombre', 'class'=>'form-control input-sm', 'value' =>set_value('nombre', $categoria->nombre)));?>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Descripción</label>
                                    <textarea name="descripcion" id="descripcion"><?php echo set_value('descripcion', $categoria->descripcion) ?></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <br>
                        <?php echo form_close(); ?>

                        <!-- Modal window to messages -->
                        <div id="errors" style="display: none;">
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
