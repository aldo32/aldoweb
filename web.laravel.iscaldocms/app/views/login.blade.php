<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aldosworld | Login</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>			
        
        <!-- bootstrap 3.0.2 -->
        {{ HTML::style('resources/css/bootstrap.min.css') }}        
        <!-- font Awesome -->
        {{ HTML::style('resources/css/font-awesome.min.css') }}                                                                      
        <!-- Theme style -->
        {{ HTML::style('resources/css/AdminLTE.css') }}        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->                                                                                    
    </head>
    
	<body class="bg-black">
		@yield('content')
		
		<!-- jQuery 2.0.2 -->
        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') }}                        
        <!-- Bootstrap -->
        {{ HTML::script('resources/js/bootstrap.min.js') }}
	</body>
</html>