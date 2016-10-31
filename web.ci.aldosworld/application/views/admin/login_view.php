<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>resources/img/favicon.ico">

    <title>Test Admin</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>resources/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/css/hover.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/nyroModal/styles/nyroModal.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url() ?>resources/js/jquery-3.1.1.js"></script>
    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script><!-- Tether for Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url() ?>resources/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>resources/nyroModal/js/jquery.nyroModal.custom.js"></script>

    <script>
        $(function() {
            $('.nyroModal').nyroModal({
                showCloseButton: false,
            });
        });
    </script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-centered login-wrap">
                <h3>Administrador</h3>

                <p><?php echo (validation_errors() != "") ? validation_errors() : ""; ?></p>
                <p><?php echo (isset($message)) ? $message : ""; ?></p>

                <?php echo form_open("adminaldo/login", array("name"=>"loginForm", "id"=>"loginForm"), array()); ?>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <?php echo form_input(array('name'=>'email','id'=>'email', 'class'=>'form-control', 'type'=>'email', 'value' =>set_value('email')));?>
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <?php echo form_input(array('name'=>'password','id'=>'password', 'class'=>'form-control', 'type'=>'password'));?>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                    <br>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
</html>