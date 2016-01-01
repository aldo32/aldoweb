<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Cortazar - Por que invertir</title>

    <?php echo $includes ?>

    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>

    <style>
        .fleft { float: left; }
        .fright { float: right; }
    </style>
</head>
<body>

<?php echo $header; ?>

<br><br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
        <?php
        if (isset($invertir)) {
            echo "<h2>".$invertir->titulo."</h2>";
            echo $invertir->descripcion;
        }
        ?>
        </div>
    </div>

    <?php echo $footer; ?>

</div>

</body>
</html>