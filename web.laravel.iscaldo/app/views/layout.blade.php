<!DOCTYPE HTML>
<html>
	<head>
		<title>ISC Aldo</title>
		<link rel="shortcut icon" href="{{ URL::to('/') }}/resources/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="{{ URL::to('/') }}/resources/images/favicon.ico" type="image/x-icon">
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="web, desarrollo, aldo, marañon, andrade, css, php, js, javascript, framework, paginas, sitios, portales, proyectos, lider, html, jquery, trabajo, cakephp, codeigniter, laravel, " />
		<meta name="description" content="Desarrollo de aplicaciones web, portales, paginas, lider de proyectos y desarrollador Sr en php, desarrollo de soluciones empresariales y personales, actitud proactiva y trabajo bajo presion" />
							
		{{ HTML::script('resources/js/jquery-2.1.1.min.js') }}		
		{{ HTML::script('resources/js/jquery.animateSlider.js') }}
		{{ HTML::script('resources/js/modernizr.js') }}
		{{ HTML::script('resources/nyroModal/js/jquery.nyroModal.custom.js') }}
		{{ HTML::script('resources/js/main.js') }}
								
		{{ HTML::style('resources/css/framework.css') }}
		{{ HTML::style('resources/css/font-awesome.css') }}
		{{ HTML::style('resources/css/jquery.animateSlider.css') }}						
		{{ HTML::style('resources/nyroModal/styles/nyroModal.css') }}
		{{ HTML::style('resources/css/main.css') }}											
	</head>
	
<body>
	<div id="preloader">
		<div id="status">Cargando...</div>
	</div>
	
	<section class="fullscreen">
		<div id="back1" class="fullscreen-effect"></div>		
		<div id="back2" class="fullscreen-effect"></div>
		
		<div id="page-wrap">
			<!-- header -->
			<div class="clearfix" id="menu">			
				<div class="menu-item cursor menu-item-active" id="aboutSection">
					<div class="padding-15">
						<div class="margin-B15">{{ HTML::image('resources/images/yo1.png', '', array('title' => '', 'class'=>'menu-img')) }}</div>						
						<div class="text">Yo</div>
					</div>	
				</div>				
				<div class="menu-item cursor" id="experienceSection">
					<div class="padding-15">
						<div class="margin-B15">{{ HTML::image('resources/images/aprendido2.png', '', array('title' => '', 'class'=>'menu-img')) }}</div>
						<label class="text">Experiencia</label>							
					</div>
				</div>				
				<div class="menu-item cursor" id="proyectsSection">
					<div class="padding-15">
						<div class="margin-B15">{{ HTML::image('resources/images/proyectos2.png', '', array('title' => '', 'class'=>'menu-img')) }}</div>
						<label class="text">Proyectos</label>						
					</div>
				</div>
				<div class="menu-item cursor">
					<div class="padding-15">
						<div class="margin-B15">{{ HTML::image('resources/images/mas2.png', '', array('title' => '', 'class'=>'menu-img')) }}</div>
						<label class="text">Algo más</label>
					</div>
				</div>
			</div>
			
			<!-- Content -->
			<div id="content-wrap" class="clearfix">
				
				
				<br/>
				<!-- Aboutme -->
				<div id="about-wrap" class="clearfix">
					<div id="about-content" class="none">
						<div class="padding-15 bGrey w52 fleft margin-R15 margin-T15">
							<h3><?php echo $about->title?></h3>
							<p>
								<?php echo $about->description?>														
							</p>
						</div>
						
						<div class="fleft w40 bLio padding-15 margin-T15">
							<h3><?php echo $sport->title?></h3>
							<p>								
								<?php echo $sport->description?>
							</p>
						</div>
						
						<div class="fleft w40 bDeep padding-15 margin-T15" style="height: 179px;">
							<h3><?php echo $hobbie->title?></h3>
							<p>
								<?php echo $hobbie->description?>								
							</p>
							
						</div>
					</div>
				</div>
				<br/>
				<!-- ---------------------- -->
				
								
				<!-- Experience -->
				<div id="experience-wrap" class="clearfix">
					<div id="experience-content" class="none">
						<div class="fleft w100 bDeep padding-15 margin-B15">
							<h3><?php echo $exp->title?></h3>
							<p>
								<?php echo $exp->description?> 
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
						<div class="fleft w52 bGrey padding-15">
							<h3>Descripción</h3>
							<p>Da click en un proyecto para ver su descripción</p> 
						</div>
					</div>
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
					<div class="margin-10 fright">{{ HTML::image('resources/images/facebook.png', '', array('title' => '', 'width'=>'32', 'height'=>'32')) }}</div>
					<div class="margin-10 fright">{{ HTML::image('resources/images/linkedin.png', '', array('title' => '', 'width'=>'32', 'height'=>'32')) }}</div>
					<div class="margin-10 fright">{{ HTML::image('resources/images/printerest.png', '', array('title' => '', 'width'=>'32', 'height'=>'32')) }}</div>
					<div class="margin-10 fright">{{ HTML::image('resources/images/twitter.png', '', array('title' => '', 'width'=>'32', 'height'=>'32')) }}</div>
				</div>
			</div>
		</div>
	</section>	
</body>
</html>