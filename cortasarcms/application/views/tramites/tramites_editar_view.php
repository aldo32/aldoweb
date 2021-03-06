<?php
if ($tramite != "") {
    $title = "Editando tramite: <b>".$tramite->nombre."</b>";
    $type = "update";
}
else {
    $title = "Nuevo tramite";
    $type = "insert";
    $tramite = new tramite;
}

class tramite {
    var $id;
    var $nombre;
    var $descripcion;
    var $idCategoria;
    var $idSubCategoria;
    var $creado;
    var $reglas;
}
?>

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

        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <script src="<?php echo base_url()?>/resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
		    var archivosTramite = "<?php echo $archivosTramite; ?>";

            $('#idArchivo').multipleSelect({single: false, placeholder: 'Buscar archivo', filter: true});

            //$("#reglas").wysihtml5();
            CKEDITOR.replace('descripcion');

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

            if (isset($_POST['idCategoria'])) {
                ?>
                $("#content-sub").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;cargando...");
                $.ajax({
                    url: "<?php echo base_url("tramites/comboSubCategoria") ?>",
                    data: "idCategoria="+<?php echo $_POST['idCategoria'] ?>,
                    dataType: "html",
                    success: function(datos) {
                        $("#content-sub").html(datos);
                        <?php
                        if (isset($_POST['idSubCategoria'])) {
                            ?>
                            $("#idSubCategoria").val("<?php echo $_POST["idSubCategoria"] ?>");
                            <?php
                        }
                        ?>
                    },
                    type: "POST"
                });
                <?php
            }
            ?>

            $("#sendForm").click(function() {
                $("#archivos").val($("#idArchivo").multipleSelect("getSelects"));
                $("#tramiteForm").submit();
            });

            if (archivosTramite != "") {
                var valuesArray = archivosTramite.split(",");
                $('#idArchivo').multipleSelect("setSelects", valuesArray);
            }

            $("#idCategoria").change(function() {
                var id = $(this).val();
                if (id != "-1") {
                    $("#content-sub").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;cargando...");
                    $.ajax({
                        url: "<?php echo base_url("tramites/comboSubCategoria") ?>",
                        data: "idCategoria="+id,
                        dataType: "html",
                        success: function(datos) {
                            $("#content-sub").html(datos);
                        },
                        type: "POST"
                    });
                }
            });

            //$("#descripcion").wysihtml5();
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
				<h1>Modulo de tramites<small> <?php echo $title; ?> </small></h1>
				<ol class="breadcrumb">
            		<li><a href="<?php echo base_url("inicio") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <li><a href="<?php echo base_url("tramites") ?>">Administrar tramites</li></a>
                    <li class="active"><a href="#"><?php echo $title; ?></a></li>
          		</ol>
			</section>

			<section class="content">
                <div class="box">
                    <div class="box-body">
                        <?php echo form_open("tramites/guardar", array("name"=>"tramiteForm", "id"=>"tramiteForm"), array("id"=>$tramite->id, "type"=>$type)); ?>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Nombre</label>
                                    <?php echo form_input(array('name'=>'nombre','id'=>'nombre', 'class'=>'form-control input-sm', 'value' =>set_value('nombre', $tramite->nombre)));?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Descripción</label>
                                    <textarea name="descripcion" id="descripcion" placeholder="Descripción"><?php echo set_value("descripcion", $tramite->descripcion) ?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Categoria</label>
                                    <?php echo form_dropdown("idCategoria", $comboCategorias, set_value("idCategoria", $tramite->idCategoria), "class='form-control input-sm' id='idCategoria'");?>
                                </div>
                                <div class="form-group col-md-4" id="content-sub">
                                    <label>Sub Categoria</label>
                                    <?php
                                    $comboSubCategorias = array("-1"=>"Seleccione una subcategoria");
                                    echo form_dropdown("idSubCategoria", $comboSubCategorias, set_value("idSubCategoria", $tramite->idSubCategoria), "class='form-control input-sm' id='idSubCategoria'");?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Archivos para el tramite</label>
                                    <?php echo form_dropdown("idArchivo", $comboArchivosTramites, set_value("idArchivo"), "class='' style='width: 100%' id='idArchivo'");?>
                                    <input type="hidden" name="archivos" id="archivos" val="" />
                                </div>
                            </div>


                            <button class="btn btn-primary" type="button" id="sendForm">Guardar</button>
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
