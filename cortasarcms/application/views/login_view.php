<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cortasar</title>

		<?php echo $includes?>

		<script type="text/javascript">
		$(document).ready(function() {

		});
		</script>
	</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Cortasar</b>CMS</a>
        </div><!-- /.login-logo -->

        <div class="login-box-body">
            <p class="login-box-msg">Login de inicio de sesión</p>
            <?php echo form_open("login/access", array("name"=>"loginForm", "id"=>"loginForm"), array()); ?>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4" style="float: right;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div><!-- /.col -->
                </div>
            <?php echo form_close(); ?>

            <br>
            <a href="#">Restablecer password</a><br>            

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- iCheck -->
    <script src="<?php echo base_url()?>/resources/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
        });
    });
    </script>
</body>
</html>
