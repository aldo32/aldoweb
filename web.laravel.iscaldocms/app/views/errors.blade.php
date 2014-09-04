<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        <link rel="shortcut icon" href="{{ URL::to('/') }}/resources/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="{{ URL::to('/') }}/resources/images/favicon.ico" type="image/x-icon">
        <title>Sáastah</title>                				       
                                                                                            
    </head>
    
	<body style="background: #000000; font-family: Arial;">
		<div style="width: 800px; height: 200px; color: white; font-weight: bold; font-size: 25px; text-align: center; margin: 0 auto; margin-top: 300px;">
			@yield('content')
		</div>				
	</body>
</html>