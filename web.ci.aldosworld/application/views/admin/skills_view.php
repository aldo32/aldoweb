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
        $(document).ready(function() {
            $('.nyroModal').nyroModal();

            $('#skills').DataTable();
        });
    </script>

</head>
<body style="background: #F8F8F8;">

<?php echo $menu ?>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h3>Conocimientos</h3>
            <p><a href="<?php echo base_url("adminaldo/skillsNew") ?>"><button type="button" class="btn btn-primary">Crear nuevo skill</button></p></a>
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

            <table id="skills">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Porcentaje</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($skills) {
                    foreach ($skills AS $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->name ?></td>
                            <td><?php echo $row->porcent."%" ?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 15px;"></i></button>
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