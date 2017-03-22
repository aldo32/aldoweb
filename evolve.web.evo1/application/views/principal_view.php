<!DOCTYPE HTML>
<html>
	<head>
		<?php echo $includes; ?>
	</head>
	
	<script type="text/javascript">
	jQuery(window).load(function() {        		       
		jQuery("#preloader").delay(500).fadeOut("fast");
	})	
	
	$(document).ready(function() {
		//Initialise nyroModal
		$('.nyroModal').nyroModal();

        
	});
	</script>

<body>
	<div id="preloader"><div id="loadText">Cargando...</div></div>

	<ul class="navigation">
		<li data-slide="1" class="active">Inicio</li>
		<li data-slide="2">Servicios</li>
		<li data-slide="3">Soluciones</li>
		<li data-slide="4">Proyectos</li>
		<li data-slide="5">Mystery Shopping</li>
		<li data-slide="6">Contacto</li>
	</ul>	
	

	<?php echo $inicio?>

	<?php echo $servicios?>

	<?php echo $soluciones?>

	<?php echo $proyectos?>
		
	<div class="slide" id="slide5Copy" data-slide="5" data-stellar-background-ratio="0.2">
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.2"></div>
		
		<div id="mistery_mano"></div>
		<div id="mistery_check1"></div>
		<div id="mistery_check2"></div>	
		
		<a class="button" data-slide="6" title=""></a>			
	</div>
	
	<?php echo $contacto?>

</body>
</html>
