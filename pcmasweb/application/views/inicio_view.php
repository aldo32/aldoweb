<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>:: PCMASWEB ::</title>

<meta name="keywords" content="web, paginas, computacion, pc, website, CSS, HTML, php, reparación, ventas" />
<meta name="description" content="Venta y reparacion de computadoras adema de soluciones web para tu negocio, aplicaciones a la medida para tu empresa" />

<link rel="shortcut icon" href="<?php echo base_url()?>resources/images/favicon.ico" type="image/x-icon">
<link href="<?php echo base_url()?>resources/styles/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>resources/styles/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

<script type="text/javascript" src="<?php echo base_url();?>resources/scripts/jquery-1.7.1.js"></script>

</head>

<script>
var currentItem = 0;		
var items=0;
var itemWidth;
var ulWidth=0;
var animationInterval="";

$(document).ready(function() {
	items = $('#carrusel li').size(); //number of itmes						
	itemWidth = $('#carrusel li').outerWidth(false);		
	ulWidth = itemWidth * (items*1);
	
	$('#right').click(function(e) {
		e.preventDefault();								
						
		if(currentItem < (items-1)) {						
			$('#carrusel').stop(true);				
			currentItem=currentItem+1;					
			var newPos = -itemWidth * currentItem;			
			$('#carrusel li').fadeOut('100', function () { $('#carrusel').stop(true, true).animate({'left': newPos}, 840); }).delay(100).fadeIn('slow', function() {  });		
			//$('#carrusel:not(:animated)').animate({'left': newPos}, 600, function() { $('.btn-banner').removeClass('active'); $('#btn-banner-'+(currentItem+1)).addClass('active'); /*animationInterval = setInterval("moveBanners('interval')", 5000);*/ });
			
			if(currentItem >= (items-1)) {
				$(this).css('opacity', 0.5);
			}

			if(currentItem > 0) {
				$('#left').css('opacity', 1);
			}						
		}
	});
	
	$('#left').click(function(e) {				
		e.preventDefault();		
		
		if(currentItem > 0) {									
			$('#carrusel').stop(true);
			currentItem=currentItem-1;					
			var newPos = -itemWidth * currentItem;
			$('#carrusel li').fadeOut('100', function () { $('#carrusel').stop(true, true).animate({'left': newPos}, 840); }).delay(100).fadeIn('slow', function() {  });
			//$('#carrousel:not(:animated)').animate({'left': newPos}, 600, function() { $('.btn-banner').removeClass('active'); $('#btn-banner-'+(currentItem+1)).addClass('active'); /*animationInterval = setInterval("moveBanners('interval')", 5000);*/ });

			if(currentItem <= 0) {
				$(this).css('opacity', 0.5);
			}

			if(currentItem < (items-1)) {
				$('#right').css('opacity', 1);
				
			}
		}
	});	
});
</script>

<body>

<div id="templatemo_wrapper_outer">
	<div id="templatemo_wrapper">
    
    	<div id="templatemo_header">
			<div id="site_title">
				<!-- <h1><a href="http://www.templatemo.com"><strong>GLOSSY</strong> BOX<span>YOUR TAGLINE GOES HERE</span></a></h1>  -->								
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="160" height="120" id="pcmasweb" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="allowFullScreen" value="false" />
					<param name="movie" value="<?php echo base_url()?>resources/flash/pcmasweb.swf" /><param name="menu" value="false" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />	<embed src="<?php echo base_url()?>resources/flash/pcmasweb.swf" menu="false" quality="high" wmode="transparent" bgcolor="#ffffff" width="160" height="120" name="pcmasweb" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_es" />
				</object>				
			</div> <!-- end of site_title -->

				<ul id="social_box">
					<li><a href="http://www.facebook.com/pages/pcmasweb-Mantenimiento-a-equipo-de-computo/285200734849452"><img src="<?php echo base_url()?>resources/images/facebook.png" alt="facebook" /></a></li>
					<!-- <li><a href="#"><img src="<?php echo base_url()?>resources/images/twitter.png" alt="twitter" /></a></li>
					<li><a href="#"><img src="<?php echo base_url()?>resources/images/linkedin.png" alt="linkin" /></a></li>
					<li><a href="#"><img src="<?php echo base_url()?>resources/images/technorati.png" alt="technorati" /></a></li>
					<li><a href="#"><img src="<?php echo base_url()?>resources/images/myspace.png" alt="myspace" /></a></li>      -->           
				</ul>
			
			<div class="cleaner"></div>
		</div>
        
        <div id="templatemo_menu">
            <ul>
                <li><a href="index.html" class="current">Inicio</a></li>
                <li><a href="services.html">Servicios</a></li>
                <li><a href="partners.html">Paquetes Web</a></li>
                <li><a href="portafolio.html">Portafolio</a></li>                
                <li><a href="contact.html">Contacto</a></li>
            </ul>    	
        </div> <!-- end of templatemo_menu -->
        
        <div id="templatemo_slider_wrapper">
        
        	<div id="templatemo_slider">
            	<div id="carrusel-wrap">
            		<div id="left"></div>
            		<ul id="carrusel">
            			<li>Aldo1</li>
            			<li>Aldo2</li>
            			<li>Aldo3</li>
            			<li>Aldo4</li>
            			<li>Aldo5</li>
            			<li>Aldo6</li>
            		</ul>
            		<div id="right"></div>
            	</div>			                
                <div class="cleaner"></div>            	
            </div>
        
        </div>
        
        <div id="templatemo_content_wrapper">
			<div id="content">
            	
                <h2>Bienvenido.</h2>
                
                <div class="reasons-full">
                	<!-- <h3>Reliable</h3>
                    <img src="<?php echo base_url()?>resources/images/reason1.png" alt="Reason1" /> -->
                    <p>Nosostros somos un equipo de profecionistas enfocados al desarrollo de paginas web, aplicaciones web, venta y mantenimiento de equipo de computo así tambien como desarrollo de software a la medida para tu negosio.</br></br> Además tenemos un alto grado de especialización en la implementación de redes y acceso a Internet, por lo que nuestros servicios incluyen no solo la instalación de nodos de red, sino que brindamos una solución completa y a la medida del cliente, que con base a sus necesidades se le propone la solución más adecuada a la medida de su red.</p>
                </div>                                
                
                <div class="hr_divider"></div>
                
                <div class="col_w820">
                	<h2>Nuestra experiencia</h2>
                    <div class="image_wrapper image_fl"><img src="<?php echo base_url()?>resources/images/teclado.jpg" alt="TemplatemoImage01" width="350" height="215"/></div>                    
           			<p>Tenemos experiencia en cualquier rama en cuanto a tecnologías de información y hardware, hemos creado sitios web e instalado redes de una manera profesional y con las herramientas más actuales del mercado, así como nuestros servicios de soporte técnico que nuestro clientes han recomendado ampliamente</p>
           			<p>Dentro de las tecnologias de desarrollo que usamos estan las siguientes: PHP 5.3, Mysql, Postgres, Jquery, Codeigniter, HTML 5, Photoshop cs5, Adobe flash cs5, C# entre otras</p>
           			<p>Nuestros productos y servicios están enfocados a la optimización de los procesos informáticos, el aumento en la productividad y la reducción de costos mediante pólizas de soporte técnico o mantenimiento.</p>            		
                </div>                                
                
                <div class="cleaner"></div>
                
            </div>
			
            <div class="cleaner"></div>        
        
		</div>
		
		<div id="templatemo_content_wrapper_bottm"></div>
   
		<div id="templatemo_footer">
		
             PC+WEB 2012  | <a href="mailto:software@pcmasweb.com" >software@pcmasweb.com</a> | Website creado y diseñado por desarrolladores de pcmasweb.com
			 
       </div>
        
	</div> <!-- end of wrapper -->
</div> <!-- end of wrapper_outer -->

</body>
</html>