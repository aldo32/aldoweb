<?php
if ($blog != "") {
    $type = "update";
    $title = "Actualizando la entrada ".$blog->name;
}
else {
    $blog = new vars();
    $type = "insert";
    $title = "Nueva entrada";
}

class vars
{
    var $id;
    var $name;
    var $body;
    var $source_url;
    var $video_embed;
    var $image;
    var $image_thumb;
    var $active;
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

    <title>Blog</title>

    <?php echo $header ?>

    <script>
        $(function() {
            $('.nyroModal').nyroModal({
                showCloseButton: false,
            });

            CKEDITOR.replace("body");

            $("#deleteImage").click(function() {
                if(confirm("Realmente desea eliminar la imágen?")) {
                    id = $(this).attr("rid");

                    $.ajax({
                        url: "<?php echo base_url('adminaldo/blogDeleteImage')?>",
                        data: "blogid="+id,
                        dataType: "json",
                        success: function(datos) {
                            if (datos.status == "success") {
                                $('#inputImage').html("<input type='file' name='imageBlog' id='imageBlog' />");
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

            <?php echo form_open_multipart("adminaldo/blogsSave", array("name"=>"formBlog", "id"=>"formBlog"), array("blogId"=>$blog->id, "type"=>$type)) ?>
                <div class="form-group">
                    <label for="name">Nombre de la entrada:</label>
                    <?php echo form_input(array('name'=>'name','id'=>'name', 'class'=>'form-control input-sm', 'value' =>set_value('name', $blog->name)));?>
                </div>
                <div class="form-group">
                    <label for="body">Entrada:</label>
                    <textarea id="body" name="body"><?php echo set_value("body", $blog->body) ?></textarea>
                </div>
                <?php
                if ($blog->image == "") {
                    ?>
                    <div class="form-group">
                        <label for="imageBlog">Imagen:</label>
                        <input type="file" name="imageBlog" id="imageBlog" />
                    </div>
                    <?php
                }
                else {
                    ?>
                    <div class="form-group">
                        <label for="imageBlog">Imagen:</label>
                        <p id="inputImage">
                            <a href="<?php echo base_url().$blog->image ?>" class="nyroModal">Ver imagen</a>&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger btn-sm" id="deleteImage" rid="<?php echo $blog->id ?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 15px;"></i></button>
                        </p>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <label for="url">Source url:</label>
                    <?php echo form_input(array('name'=>'source_url','id'=>'source_url', 'class'=>'form-control input-sm', 'value' =>set_value('url', $blog->source_url)));?>
                </div>
                <div class="form-group">
                    <label for="url">Video embed:</label>
                    <textarea name="video_embed" id="video_embed" class="form-control"><?php echo set_value("video_embed", $blog->video_embed) ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</body>
</html>