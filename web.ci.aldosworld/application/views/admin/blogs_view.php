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
        $(document).ready(function() {
            $('.nyroModal').nyroModal();

            $('#blog').DataTable();

            $(".active").click(function() {
                active = $(this).is(":checked");
                id = $(this).attr("id");

                $.ajax({
                    url: "<?php echo base_url('adminaldo/blogDeleteItem')?>",
                    data: "blogid="+id+"&active="+active,
                    dataType: "json",
                    success: function(datos) {

                    },
                    type: "POST"
                });
            });
        });
    </script>

</head>
<body style="background: #F8F8F8;">

<?php echo $menu ?>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h3>Blog</h3>
            <p><a href="<?php echo base_url("adminaldo/blogNew") ?>"><button type="button" class="btn btn-primary">Crear nueva entrada</button></p></a>
        </div>
        <div class="col-md-12">

            <?php
            if (!empty($message)) {
                ?>
                <div class="alert alert-<?php echo $message["type"] ?>">
                    <strong><?php echo $message["message"] ?></strong>
                </div>
                <?php
            }
            ?>

            <table id="blog">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                    <th>Activo</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if ($blogs) {
                    foreach ($blogs AS $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->name ?></td>
                            <td><?php echo $row->created ?></td>
                            <td>
                                <a href="<?php echo base_url("adminaldo/blogsEdit/".$row->id) ?>"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
                                <!--<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 15px;"></i></button>-->
                            </td>
                            <td>
                                <div class="checkbox">
                                    <label><input type="checkbox" id="<?php echo $row->id ?>" class="active" value="<?php echo $row->active ?>" <?php echo ($row->active) ? "checked" : "" ?>></label>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>