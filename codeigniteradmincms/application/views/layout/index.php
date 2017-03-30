<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title><?php echo (isset($title)) ? $title : "Title"; ?></title>

    <?php echo (isset($includes)) ? $includes : ""; ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php echo (isset($header)) ? $header : ""; ?>

    <!-- =============================================== -->

    <?php echo (isset($menu)) ? $menu : ""; ?>

    <!-- =============================================== -->

    <?php echo (isset($content)) ? $content : ""; ?>

</div>
</body>
</html>
