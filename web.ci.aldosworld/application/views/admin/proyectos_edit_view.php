<?php
if ($project != "") {
    $type = "update";
    $title = "Actualizando el proyecto ".$project->name;
}
else {
    $project = new vars();
    $type = "insert";
    $title = "Nuevo proyecto";
}

class vars
{
    var $id;
    var $name;
    var $description;
    var $image;
    var $image_thumb;
    var $url;
    var $deleted;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>resources/img/favicon.ico">

    <title>Proyectos</title>

    <?php echo $header ?>

    <script>
        $(function() {
            $('.nyroModal').nyroModal({
                showCloseButton: false,
            });

            CKEDITOR.replace("description");

            $("#deleteImage").click(function() {
                if(confirm("Realmente desea eliminar la imágen?")) {
                    id = $(this).attr("rid");

                    $.ajax({
                        url: "<?php echo base_url('adminaldo/projectDeleteImage')?>",
                        data: "projectid="+id,
                        dataType: "json",
                        success: function(datos) {
                            if (datos.status == "success") {
                                $('#inputImage').html("<input type='file' name='imageProject' id='imageProject' />");
                                alert("La imagen se eliminó correctamente");
                            }
                            else {
                                alert('La imagen ya no existe o no se encuentra');
                            }
                        },
                        type: "POST"
                    });
                }
            });
        });
    </script>

</head>
<body style="background: #F8F8F8;">

<?php echo $menu ?>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-8 col-centered">
            <h3><?php echo $title ?></h3>

            <p><?php echo (validation_errors() != "") ? validation_errors() : ""; ?></p>
            <p><?php echo (isset($message)) ? $message : ""; ?></p>
            <p><strong><?php echo (isset($error_upload)) ? $error_upload : ""; ?></strong></p>
            <p><strong><?php echo (isset($error_thumb)) ? $error_thumb : ""; ?></strong></p>

            <?php echo form_open_multipart("adminaldo/projectsSave", array("name"=>"formProject", "id"=>"formProject"), array("projectId"=>$project->id, "type"=>$type)) ?>
                <div class="form-group">
                    <label for="name">Nombre del proyecto:</label>
                    <?php echo form_input(array('name'=>'name','id'=>'name', 'class'=>'form-control input-sm', 'value' =>set_value('name', $project->name)));?>
                </div>
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea id="description" name="description"><?php echo set_value("description", $project->description) ?></textarea>
                </div>
                <?php
                if ($project->image == "") {
                    ?>
                    <div class="form-group">
                        <label for="imageProject">Imagen:</label>
                        <input type="file" name="imageProject" id="imageProject" />
                    </div>
                    <?php
                }
                else {
                    ?>
                    <div class="form-group">
                        <label for="imageProject">Imagen:</label>
                        <p id="inputImage">
                            <a href="<?php echo base_url().$project->image ?>" class="nyroModal">Ver imagen</a>&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger btn-sm" id="deleteImage" rid="<?php echo $project->id ?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 15px;"></i></button>
                        </p>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <label for="url">Url sitio:</label>
                    <?php echo form_input(array('name'=>'url','id'=>'url', 'class'=>'form-control input-sm', 'value' =>set_value('url', $project->url)));?>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</body>
</html>