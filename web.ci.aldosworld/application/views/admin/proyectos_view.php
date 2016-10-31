<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>resources/img/favicon.ico">

    <title>Administrador</title>

    <?php echo $header ?>

    <script>
        $(function() {
            $('.nyroModal').nyroModal({
                showCloseButton: false,
            });

            $('#projects').DataTable();
        });
    </script>

</head>
<body style="background: #F8F8F8;">

<?php echo $menu ?>

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-12">
            <h3>Proyectos</h3>
            <p><button type="button" class="btn btn-primary">Crear nuevo proyecto</button></p>
        </div>
        <div class="col-md-12">
            <table id="projects">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($projects) {
                        foreach ($projects AS $row) {
                            ?>
                            <tr>
                                <td><?php echo $row->name ?></td>
                                <td><?php echo $row->created ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <tr>
                            <td colspan="3">No se encontraron resultados</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>