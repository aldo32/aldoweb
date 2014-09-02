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
	
<html>
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
				<div class="menu-item cursor">
					<div class="padding-15">
						<div class="margin-B15">{{ HTML::image('resources/images/yo1.png', '', array('title' => '', 'class'=>'menu-img')) }}</div>						
						<div class="text">Acerca de mi</div>
					</div>	
				</div>				
				<div class="menu-item">
					<div class="padding-15">
						<div class="margin-B15">{{ HTML::image('resources/images/aprendido2.png', '', array('title' => '', 'class'=>'menu-img')) }}</div>
						<label class="text">Lo aprendido</label>							
					</div>
				</div>				
				<div class="menu-item">
					<div class="padding-15">
						<div class="margin-B15">{{ HTML::image('resources/images/proyectos2.png', '', array('title' => '', 'class'=>'menu-img')) }}</div>
						<label class="text">Proyectos</label>						
					</div>
				</div>
				<div class="menu-item">
					<div class="padding-15">
						<div class="margin-B15">{{ HTML::image('resources/images/mas2.png', '', array('title' => '', 'class'=>'menu-img')) }}</div>
						<label class="text">Algo más</label>
					</div>
				</div>
			</div>
			
			<!-- Content -->
			<div id="content-wrap" class="clearfix" style="height: 600px;">
				Aldo<br>
				Aldo<br>Aldo<br>Aldo<br>Aldo<br>Aldo<br>Aldo<br>Aldo<br>Aldo<br>Aldo<br>Aldo<br>
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