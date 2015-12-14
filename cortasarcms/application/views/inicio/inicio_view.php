<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CortazarCMS - Inicio</title>

		<?php echo $includes?>

		<script type="text/javascript">		
		$(document).ready(function() {

		});
		</script>
	</head>
<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<?php echo $header?>

		<?php echo $sidebar?>

		<!-- Title header 01800 3668466 -->
		<div class="content-wrapper">
			<section class="content-header" style="margin-left: 0px;">
				<h1>Dashboard<small> inicio </small></h1>
				<ol class="breadcrumb">
            		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
					<!--
            		<li><a href="#">Tables</a></li>
            		<li class="active">Data tables</li>
					-->
          		</ol>
			</section>

			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-info">
		                	<div class="box-header with-border">
		                  		<h3 class="box-title">En contrucción</h3>
		                  		<div class="box-tools pull-right">
		                    		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		                    		<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		                  		</div>
		                	</div>

		                	<div class="box-body">
								Dashboard
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php echo $footer;?>

		<?php echo $control_sidebar; ?>
	</div>
	<!-- ./wrapper -->


</body>
</html>
