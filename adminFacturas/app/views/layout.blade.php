<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminFacturas</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>				
		<link rel="shortcut icon" href="{{ URL::to('/') }}/resources/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="{{ URL::to('/') }}/resources/img/favicon.ico" type="image/x-icon">
		
		<link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>		
                
        <!-- bootstrap 3.0.2 -->
        {{ HTML::style('resources/css/framework.css') }}
        {{ HTML::style('resources/css/main.css') }}
        {{ HTML::style('resources/nyromodal/styles/nyroModal.css') }}                                
        {{ HTML::style('resources/css/jquery.dataTables.css') }}
        
        {{ HTML::script('resources/js/jquery-2.1.1.min.js') }}   
        {{ HTML::script('resources/js/jquery.dataTables.js') }}           
                
    </head>
    
	<body>	 
		<div id="menu-wrap">			
			<div id="menu-content">								
				<a href="{{ URL::to('/'); }}/inicio"><div class="item <?php if ($section=="inicio") { echo "active"; }?>">Mis Facturas</div></a>
				<a href="{{ URL::to('/'); }}/subirarchivos"><div class="item <?php if ($section=="upload") { echo "active"; }?>">Subir Facturas</div></a>
				<a href="{{ URL::to('/'); }}/login/logout"><div class="item">Salir</div></a>
			</div>
		</div>
		
		<div id="page-wrap" class="clearfix">								 
			<div class="fontBold">Hola: <?php echo $infoUser->name." ".$infoUser->lastname?></div>
			<div class="fontBold">Compañia: <?php echo Auth::user()->company->name; ?></div>
			<br><br>
			 
    		@yield('content')
    	</div>            
	</body>
</html>