<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php if ($title) { echo $title; } else { echo "Title"; } ?></title>

    <?php if ($includes) { echo $includes; } else { echo ""; } ?>

</head>
<body>

<?php if ($menu) { echo $menu; } else { echo ""; } ?>

<div class="container">
    <?php if ($content) { echo $content; } else { echo ""; } ?>
</div>

<?php if ($footer) { echo $footer; } else { echo ""; } ?>
</body>
</html>