<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Cortazar - Antecedentes</title>

    <?php echo $includes ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#fiestas').bxSlider({
                slideWidth: 560,
                minSlides: 4,
                maxSlides: 4,
                moveSlides: 4,
                slideMargin: 10,
                ticker: false,
            });
        });
    </script>

</head>
<body>

<?php echo $header; ?>

<br><br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="text-align: center;">
            <img src="<?php echo base_url()?>resources/images/escudo.png" />
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <?php
            if (isset($antecedentes)) {
                foreach ($antecedentes as $row) {
                    echo $row->descripcion;
                    echo "<br><br>";
                }
            }
            ?>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <p><h2 class="text-center">Nuestras Fiestas</h2></p>
            <div id="fiestas">
                <?php
                if (isset($fiestas)) {
                    foreach ($fiestas AS $row) {
                        ?>
                        <div class="slide"><img src="<?php echo URL_CMS.$row->archivo ?>"><?php echo $row->titulo ?></div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php echo $footer; ?>
</body>
</html>