<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CortazarCMS - Secciones</title>

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

            $("#seccion").change(function() {
                id = $(this).val();

                $("#contentSection").html("<i class='fa fa-refresh fa-spin'></i>&nbsp;&nbsp;cargando...");
                $.ajax({
                    url: "<?php echo base_url("secciones/showSection") ?>",
                    data: "idSection="+id,
                    dataType: "html",
                    success: function(datos) {
                        $("#contentSection").html(datos);
                    },
                    type: "POST"
                });
            });

            $(document).on("click", "#saveSection", function() {
                var idSection = $("#seccion").val();
                var titulo = $("#titulo").val();
                var descripcion = $("#descripcion").val();
                var activo = $('input[name=activo]:checked').val()

                if (descripcion == "") alert("Debe escribir una descripción");
                else {
                    $.ajax({
                        url: "<?php echo base_url("secciones/saveSection") ?>",
                        data: "idSection="+idSection+"&titulo="+titulo+"&descripcion="+descripcion+"&activo="+activo,
                        dataType: "html",
                        success: function(datos) {
                            //$("#contentSection").html(datos);
                            alert("La sección se actualizo correctamente");
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
            <h1>Modulo de secciones<small>  </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url("secciones") ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Administrar secciones</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Secciones</h3>
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

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Categoria</label>
                            <?php echo form_dropdown("seccion", $comboSecciones, set_value("seccion"), "class='form-control input-sm' id='seccion'");?>
                        </div>
                    </div>
                    <br>

                    <div id="contentSection">

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
