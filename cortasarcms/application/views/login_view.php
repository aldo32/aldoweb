<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cortasar</title>

		<?php echo $includes?>

		<script type="text/javascript">
		$(document).ready(function() {
			$("#loginForm").submit(function(e) {
				e.preventDefault();

				email=$("#email").val();
				password=$("#password").val();

				if(email != "" && password != "") {
					$.ajax({
				        url: "./login/access",
				        data: "email="+email+"&password="+password+"&<?php echo $this->security->get_csrf_token_name()?>=<?php echo $this->security->get_csrf_hash()?>",
				        dataType: "json",
				        success: function(datos) {
							if (datos.status == "error") {
								$("#messageLogin").html(datos.message);
							}
							else {
								$("#inicioForm").submit();
							}
				        },
				        type: "POST"
					});
				}
				else {
					$("#messageLogin").html("Debe escribir un usuario y password para continuar");
				}
			});
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
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4" style="float: right;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div><!-- /.col -->
                </div>
            <?php echo form_close(); ?>

			<?php echo form_open("inicio", array("name"=>"inicioForm", "id"=>"inicioForm"), array()); form_close(); ?>

			<br>
			<div id="messageLogin" style="font-weight: bold;"></div>
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
