<?php
if ($skill != "") {
    $type = "update";
    $title = "Actualizando el skill ".$skill->name;
}
else {
    $skill = new vars();
    $type = "insert";
    $title = "Nuevo skill";
}

class vars
{
    var $id;
    var $name;
    var $porcent;
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

    <title>Skills</title>

    <?php echo $header ?>

    <script>
        $(function() {
            $('.nyroModal').nyroModal({
                showCloseButton: false,
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

            <?php echo form_open_multipart("adminaldo/skillsSave", array("name"=>"formSkill", "id"=>"formSkill"), array("skillId"=>$skill->id, "type"=>$type)) ?>
                <div class="form-group">
                    <label for="name">Nombre del skill:</label>
                    <?php echo form_input(array('name'=>'name','id'=>'name', 'class'=>'form-control input-sm', 'value' =>set_value('name', $skill->name)));?>
                </div>
                <div class="form-group">
                    <label for="porcent">Porcentaje:</label>
                    <?php echo form_dropdown('porcent', array('25'=>'25', '50'=>'50', '75'=>'75', '80'=>'80', '85'=>'85', '90'=>'90', '100'=>'100'), '', array("id"=>"porcent"));?>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</body>
</html>