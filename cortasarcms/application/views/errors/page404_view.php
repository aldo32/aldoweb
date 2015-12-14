<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Cortazar</title>

		<?php echo $includes?>

		<script type="text/javascript">
		$(document).ready(function() {

		});
		</script>
	</head>
<body class="hold-transition login-page">
    <div class="content-wrapper" style="margin: 0px;">
        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-yellow"> 404</h2>
                <div class="error-content">
                    <br>
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! No se encontro la pagina.</h3>
                    <p>
                        No podemos encontrar la pagina que estas buscando
                        Puedes regresar dando click <a href="<?php echo base_url("login") ?>">Aqui!</a>
                    </p>
                </div><!-- /.error-content -->
            </div><!-- /.error-page -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</body>
</html>
