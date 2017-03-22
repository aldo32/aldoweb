	<?php 
	$quienes_somos = "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas Letraset, las cuales contenian pasajes Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas Letraset, las cuales contenian pasajes";
	$que_hacemos = "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas Letraset, las cuales contenian pasajes Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos";
	$como_lo_hacemos = "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas Letraset, las cuales contenian pasajes Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió";
	$con_quien_lo_hacemos = "Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas Letraset, las cuales contenian pasajes Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos";
	$vision = "visión";
	$mision = "misión";
	?>
	
	<script>
	$(document).ready(function(){
		$('#logoEvolve').delay(1000).fadeIn(2000);
		$('#inicio-wrap').delay(1500).fadeIn(2000);

		$('.inicio-item').click(function() {
			var id = $(this).attr('id');
			var content = $('#inicio-content');
			
			switch (id) {
				case "quienes_somos":
					content.fadeOut(1000, function() { content.html("<?php echo $que_hacemos?>"); }).fadeIn();
				break;

				case "que_hacemos":
					content.fadeOut(1000, function() { content.html("<?php echo $que_hacemos?>"); }).fadeIn();
				break;

				case "como_lo_hacemos":
					content.fadeOut(1000, function() { content.html("<?php echo $como_lo_hacemos?>"); }).fadeIn();
				break;

				case "con_quien_lo_hacemos":
					content.fadeOut(1000, function() { content.html("<?php echo $con_quien_lo_hacemos?>"); }).fadeIn();
				break;

				case "vision":
					content.fadeOut(1000, function() { content.html("<?php echo $vision?>"); }).fadeIn();
				break;

				case "mision":
					content.fadeOut(1000, function() { content.html("<?php echo $mision?>"); }).fadeIn();
				break;
			}
		});
	});
	</script>

	<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.2">
		<div class="wrapper">			
			<div id="logoEvolve"><img src="<?php echo base_url()?>/resources/images/logoEvolveSombraBlanca.png" width="380" height="173" /></div>
			
			<div id="inicio-wrap">
				<div id="inicio-menu">
					<div class="inicio-item abel activeInicio" id="quienes_somos">Quienes somos</div>
					<div class="inicio-item abel" id="que_hacemos">Que hacemos</div>
					<div class="inicio-item abel" id="como_lo_hacemos">Como lo hacemos</div>
					<div class="inicio-item abel" id="con_quien_lo_hacemos">Con quien lo hacemos</div>
					<div class="inicio-item abel" id="vision">Visión</div>
					<div class="inicio-item abel" id="mision">Misión</div>
				</div>
				
				<div id="inicio-content" class="abel">
					Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes
					Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes
				</div>
			</div>
		</div>
			
		<a class="button" data-slide="2" title=""></a>		
	</div><!--End Slide 1-->	