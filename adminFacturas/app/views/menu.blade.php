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
        
        {{ HTML::script('resources/js/jquery-2.1.1.min.js') }}
        {{ HTML::script('resources/js/konami.js') }}
        {{ HTML::script('resources/js/main.js') }}        
                
    </head>
    
	<body>	                
    	@yield('content')            
	</body>
</html>