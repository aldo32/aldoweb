<!DOCTYPE HTML>
<html>
	<head>
		<title>ISC Aldo</title>
		<link rel="shortcut icon" href="{{ URL::to('/') }}/resources/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="{{ URL::to('/') }}/resources/images/favicon.ico" type="image/x-icon">
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="web, desarrollo, aldo, marañon, andrade, css, php, js, javascript, framework, paginas, sitios, portales, proyectos, lider, html, jquery, trabajo, cakephp, codeigniter, laravel, " />
		<meta name="description" content="Aldo Marañon Andrade Desarrollo de aplicaciones web, portales, paginas, lider de proyectos y desarrollador Sr en php, desarrollo de soluciones empresariales y personales, actitud proactiva y trabajo bajo presion" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
							
		{{ HTML::script('resources/js/jquery-2.1.1.min.js') }}		
		{{ HTML::script('resources/js/jquery.animateSlider.js') }}
		{{ HTML::script('resources/js/modernizr.js') }}
		{{ HTML::script('resources/nyroModal/js/jquery.nyroModal.custom.js') }}		
		{{ HTML::script('resources/js/konami.js') }}
		{{ HTML::script('resources/js/main.js') }}
								
		{{ HTML::style('resources/css/framework.css') }}
		{{ HTML::style('resources/css/font-awesome.css') }}
		{{ HTML::style('resources/css/jquery.animateSlider.css') }}						
		{{ HTML::style('resources/nyroModal/styles/nyroModal.css') }}
		{{ HTML::style('resources/css/main.css') }}
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-40966556-2', 'auto');
		  ga('send', 'pageview');		
		</script>											
	</head>
	
<body>
	<div id="preloader">
		<div id="status">Cargando...</div>
	</div>
	
	<section class="fullscreen">
		<div id="back1" class="fullscreen-effect"></div>		
		<div id="back2" class="fullscreen-effect"></div>
		
		<!-- Menu -->
		<div id="menu-wrap">			
			<div id="menu-logo">{{ HTML::image('resources/images/logoaldo.png', '', array('class' => '', 'width'=>'140', 'height'=>'40')) }}</div>
			<div id="menu-content">
				<div class="menu-item" id="/blog"><a href="#blog" style="text-decoration: none;">Un poco de todo</a></div>
				<div class="menu-item" id="/experiencia"><a href="#experiencia" style="text-decoration: none;">Experiencia</a></div>
				<div class="menu-item" id="/portafolio"><a href="#portafolio" style="text-decoration: none;">Portafolio</a></div>
				<div class="menu-item active" id="/servicios"><a href="#servicios" style="text-decoration: none;">Servicios</a></div>
			</div>			
		</div>
		<!--  -->
				
		<div id="page-wrap" class="clearfix">
			
			
			<!-- Content -->
			<div id="content-wrap" class="clearfix">								
				
				<br/>
				<!-- Services -->
				<div id="services-wrap" class="clearfix">					
					<div id="services-content" class="none">
						<div id="services-logo">{{ HTML::image('resources/images/logoaldo.png', '', array('id' => 'logoaldo', 'align'=>'center', 'width'=>'291', 'height'=>'74')) }}</div>
						<div class="padding-15 bGrey w52 fleft margin-R15 margin-T15">
							<h3><?php echo $info1->title?></h3>
							<?php echo $info1->description?>
						</div>
						
						<div class="fleft w40 bLio padding-15 margin-T15">
							<h3><?php echo $info2->title?></h3>
							<?php echo $info2->description?>
						</div>
						
						<div class="fleft w40 bDeep padding-15 margin-T15" style="height: 152px;">
							<h3><?php echo $info3->title?></h3>
							<?php echo $info3->description?>													
						</div>
						
						<div class="padding-15 bLio w100 fleft margin-R15 margin-T15">
							<h3><?php echo $info4->title?></h3>
							<?php echo $info4->description?>
						</div>
					</div>
				</div>
				<br/>
				<!-- ---------------------- -->
				
								
				<!-- Experience -->
				<div id="experience-wrap" class="clearfix">
					<div id="experience-content" class="none">
						<div class="fleft w100 bDeep padding-15 margin-B15">
							<h3>Mi experiencia</h3>
							<p>
								Me considero una persona profesional que sabe manejar la presión laboral y canalizarla hacia el aumento de la experiencia, además de ser autodidacta para aprender las nuevas tecnologías que surgen el ambiente laboral y el web 2.0. Ademas de buscar las metodologias y tecnicas para un desarrollo eficiente y ágil.

								<br><br>Tengo más de 6 años de experiencia en desarrollo de aplicaciones web, software y de escritorio, estas son las tecnologías que he manejado y que domino ampliamente:
								
								<br><br>
								<div class="clearfix">
									<div class="experience-item bLio">Php</div>
									<div class="experience-item bLio">MySQL</div>
									<div class="experience-item bLio">PostgreSQL</div>
									<div class="experience-item bLio">Ajax</div>
									<div class="experience-item bLio">Html</div> 
									<div class="experience-item bLio">Html5</div>
									<div class="experience-item bLio">Css</div>
									<div class="experience-item bLio">Css 3</div>
									<div class="experience-item bLio">Javascript</div>
									<div class="experience-item bLio">Jquery</div>
									<div class="experience-item bLio">Codeigniter</div>
									<div class="experience-item bLio">Zend</div>
									<div class="experience-item bLio">CakePHP</div>
									<div class="experience-item bLio">C#</div>
									<div class="experience-item bLio">SQL Avanzado</div><div class="experience-item bLio">Poo</div><div class="experience-item bLio">IBM DB2</div><div class="experience-item bLio">Apache</div><div class="experience-item bLio">Microsoft Office</div><div class="experience-item bLio">Conexiones remotas a BD</div>
									<div class="experience-item bLio">Webservices</div><div class="experience-item bLio">Administración de servidores web</div><div class="experience-item bLio">Linux</div><div class="experience-item bLio">API de facebook</div>
									<div class="experience-item bLio">SDK facebook</div><div class="experience-item bLio">API twitter</div><div class="experience-item bLio">API google maps</div><div class="experience-item bLio">Laravel</div>
									<div class="experience-item bLio">Maquetado html</div><div class="experience-item bLio">Scrum</div><div class="experience-item bLio">Git hub</div><div class="experience-item bLio">Titanium appcelerator etc.</div>
								</div>
								
								<ul>
									<li>Framework JavaScript: Ultimas versiones de de Jquery y Motools</li>
									<li>Framework PHP: Codeigniter 2, Zend, Cake php 2, Laravel 4</li>
									<li>Sistemas Operativos Windows, Linux, Mac OS X</li>
									<li>Herramientas de diseño web: Adobe Photoshop CS4</li>
									<li>Diseño y maquetado responsivo</li>
									<li>Administración de proyectos</li>
									<li>Lider de proyecto</li>
									<li>Lider de area</li>
								</ul>																
							</p>
						</div>
					</div>
				</div>
				<!-- ---------------------------------- -->
				
				
				
				<!-- Proyectos -->
				<div id="proyects-wrap" class="clearfix">
					<div id="proyects-content" class="none">
						<div class="fleft w40 bLio padding-15 margin-R15">
							<h3>Proyectos realizados</h3>
							<p>Estos son algunos de los sitios, aplicaciones y proyectos más sobresalientes que he realizado hasta ahora:</p>
							<p>
								<?php
								if (count($proyectos) > 0) {
									foreach ($proyectos as $row) {
										?><div class="proyect-item bDeep cursor" id="<?php echo $row->proyectid?>"><?php echo $row->name?></div><?php 
									}
								}
								?>															
							</p>
						</div>
						<div class="fleft w52 bGrey">
							<div id="proyectDescription" style="height: 514px; overflow: auto; padding: 15px;">
								<h3>Descripción</h3>
								<p>Da click en un proyecto para ver su descripción</p>
							</div>							
						</div>
					</div>
				</div>
				<br/>
				<!-- --------------- -->
				
				
				<!-- Blog -->
				<!-- Proyectos -->
				<div id="blog-wrap" class="clearfix">
					<div id="blog-content" class="clearfix none">
						
						<?php 	
						if (count($blogs) > 0) {
							$i=0;
							foreach ($blogs as $row) {
								$random = rand(50, 100);
								
								$bg[1]='bDeep';
								$bg[2]='bLio';
								$bg[3]='bGrey';
								
								$n = rand(1, 3);
								?>
								<div class="blog-item <?php echo $bg[$n]?>">
									<div class="blog-item-image">
										<?php 
										if ($row->image != "") {
											?><a href="{{ URL::to('/'); }}/<?php echo $row->image?>" class="nyroModal">{{ HTML::image(Croppa::url($row->image, 60, 60), '', array('class' => '', 'width'=>'60', 'height'=>'60')) }}</a><?php 
										}
										?>									
									</div>
									<div class="blog-item-text">
										<h4><?php echo $row->title?></h4>
										<p class="fontZ14"><?php echo str_limit(nl2br(strip_tags($row->description)), $random, '...')?></p>
										<div class="fright"><a href="{{ URL::to('/'); }}/home/viewEntry/<?php echo $row->blogid?>" class="nyroModal">Leer más</a></div>
									</div>								
								</div>
								<?php 
							}
						}																							
						?>
						
																																		
					</div>
				</div>
				<br>
				<!-- ----------- -->
				
				
				
			</div>						
		</div>
		
		<!-- Footer -->
			<div id="footer">
				<div class="margin-15 fontZ14 fleft">
					<div>ISC. Aldo Marañon Andrade</div>
					<div class="fontZ12">isc.aldo@hotmail.com</div>
					<div class="fontZ12">isc.aldo@gmail.com</div>
				</div>
				
				<div class="margin-15 fright">					
					<!-- <div class="margin-10 fright">{{ HTML::image('resources/images/facebook.png', '', array('title' => '', 'width'=>'32', 'height'=>'32')) }}</div>  -->
					<div class="margin-10 fright"><a href="https://www.linkedin.com/pub/aldo-mara%C3%B1on-andrade/14/130/89b" target="_blank">{{ HTML::image('resources/images/linkedin.png', '', array('title' => '', 'width'=>'32', 'height'=>'32')) }}</a></div>
					<div class="margin-10 fright"><a href="http://es.pinterest.com/aldomaranon/" target="_blank">{{ HTML::image('resources/images/printerest.png', '', array('title' => '', 'width'=>'32', 'height'=>'32')) }}</a></div>
					<div class="margin-10 fright"><a href="http://twitter.com/isc_aldo_ma" target="_blank">{{ HTML::image('resources/images/twitter.png', '', array('title' => '', 'width'=>'32', 'height'=>'32')) }}</a></div>
				</div>
			</div>
	</section>	
</body>
</html>