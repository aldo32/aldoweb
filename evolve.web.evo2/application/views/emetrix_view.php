		<style>
		#em-content { width: 900px; height: 400px; margin: 0 auto; position: relative;}
			#em-anim-content { width: 400px; height: 400px; position: relative; float: left; }
				#em-table { width: 400px; height: 143px; position: absolute; top: 200px; left: -400px; background: url('resources/assets/img/table_emetrix2.png'); display: none; }
				#em-monitor { width: 256px; height: 256px; position: absolute; top: -20px; left: -300px; background: url('resources/assets/img/monitor_emetrix.png'); display: none; }
				#em-user { width: 128px; height: 128px; position: absolute; top: 100px; left: -20px; background: url('resources/assets/img/user_emetrix.png'); display: none; }
		
		#em-text-content { width: 450px; height: 400px; position: relative; margin-left: 50px; float: left; }		
		</style>

        <div id="em-content">
        	<div id="em-anim-content">
        		<div id="em-table"></div>
        		<div id="em-monitor"></div>
        		<div id="em-user"></div>
        	</div>
        	
        	<div id="em-text-content">
        		 <h2 class="project-title">Emetrix / Retail analizer</h2>
        		 <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
        	</div>
        </div>
        
        <script type="text/javascript">
			$(document).ready(function() {
				$("#em-table").delay(500).animate({left:0, opacity:"show"}, 500, function() {
					$("#em-monitor").delay(500).animate({left:70, opacity:"show"}, 500, function() {
						$("#em-user").fadeIn('slow');
					});
				});				 				
			});
        </script>
  