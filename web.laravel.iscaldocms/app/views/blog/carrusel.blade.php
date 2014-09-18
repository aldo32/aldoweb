@extends('layout')

@section('content')
	<!-- Datatables -->
	{{ HTML::style('resources/css/AdminLTE.css') }}
	
	<!-- Datatables -->        
    {{ HTML::script('resources/js/plugins/datatables/jquery.dataTables.js') }}
    {{ HTML::script('resources/js/plugins/datatables/dataTables.bootstrap.js') }}
    
	<script>
	$(document).ready(function() {
		setupCarrousel()
		animationInterval=setInterval("moveBanners(interval)", 3000);				
	});

	var currentItem = 0;		
	var items=0;
	var itemWidth;	   
	var interval='interval'; 
	var animationInterval;		
	
	function setupCarrousel() {			
		items = $('#carrusel-list div').size();
		console.log(items);					
		itemWidth = $('.carrusel-item').outerWidth(false);
		console.log(itemWidth);				
		var divWidth = itemWidth * items;
		console.log(divWidth);		
		$('#carrusel-list').width(divWidth);		
		$('.carrusel-item').width(divWidth/items);
										
	}

	function moveBanners(type) {
		if (type=="interval") {
			currentItem++;	
		}
							
		items = $('#carrusel-list div').size(); //number of itmes					
		if(currentItem >= items || currentItem == 0) {
			currentItem = 0;			
		}
		
		var newPos = -itemWidth * currentItem;		
		$('#carrusel-list:not(:animated)').animate({'left': newPos}, 600, function() {  });						
	}
	</script>
	
	<style>
		#carrusel-wrap { width: 70%; height: 400px; margin: 0 auto; position: relative; background: silver; }
			#carrusel-content { width: 100%; height: 400px; position: relative; background: blue; overflow: hidden; }
				#carrusel-list { width: 100%; height: 400px; position: relative; background: white; }
					.carrusel-item { width: 100%; height: 400px; position: relative; float: left; background: orange; }
					.carrusel-item img { width: 100%; height: 100% }							
	</style>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Administrar<small>Información general</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Administrar</li>
            <li class="active">Información general</li>
        </ol>                
	</section>
	
	<section class="content">
		<!-- Alerts -->
		<?php echo (isset($alert)) ? $alert : '';?>
	
		<!-- Capa principal -->
	    <div class="col-xs-12">    	
	    	
	    	
		<div id="carrusel-wrap">
			<div id="carrusel-content">
				<div id="carrusel-list">
					<div class="carrusel-item"><img src="{{ URL::to('/'); }}/resources/img/avatar5.png" /></div>
					<div class="carrusel-item"><img src="{{ URL::to('/'); }}/resources/img/avatar5.png" /></div>
					<div class="carrusel-item"><img src="{{ URL::to('/'); }}/resources/img/avatar5.png" /></div>
					<div class="carrusel-item"><img src="{{ URL::to('/'); }}/resources/img/avatar5.png" /></div>
					<div class="carrusel-item"><img src="{{ URL::to('/'); }}/resources/img/avatar5.png" /></div>
				</div>
			</div>
		</div>    	
	    	
	    	
		</div>
	</section>		               
@stop