<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Cortazar - Noticias</title>

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

<br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <?php
            if (isset($noticia)) {
                echo "<h2>".$noticia->titulo."</h2>";
                echo $noticia->nota;
            }
            ?>
        </div>
    </div>
</div>

<?php echo $footer; ?>
</body>
</html>