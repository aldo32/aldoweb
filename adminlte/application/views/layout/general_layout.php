<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php
        if (isset($title)) {
            echo $title;
        }
        ?>
    </title>

    <?php
    if (isset($includes)) {
        echo $includes;
    }
    ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <?php
    if (isset($header)) {
        echo $header;
    }
    ?>

    <!-- =============================================== -->

    <?php
    if (isset($sidebar)) {
        echo $sidebar;
    }
    ?>

    <!-- =============================================== -->

    <?php
    if (isset($content)) {
        echo $content;
    }
    ?>

    <?php
    if (isset($footer)) {
        echo $footer;
    }
    ?>

    <?php
    if (isset($config)) {
        echo $config;
    }
    ?>
</div>

</body>
</html>
