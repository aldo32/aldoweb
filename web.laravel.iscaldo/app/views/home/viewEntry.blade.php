<!DOCTYPE HTML>
<html>
	<head>
		<title>ISC Aldo</title>		
							
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
	
	<style>
	#entry-content { width: 800px; position: relative; margin: 0 auto; }  	
	</style>
	
<body>
	<div id="entry-content" class="bGrey clearfix">
		<div class="padding-20">
			<h3><?php echo $blog->title?></h3>
			<br>
			<p>
				<?php 
				if ($blog->image != "") { ?> {{ HTML::image(Croppa::url($blog->image, 200, 200), '', array('class' => 'fleft margin-R20 margin-B20')) }} <?php  }
				?>				
				<?php echo $blog->description?>
			</p>
		</div>
	</div>
</body>
</html>