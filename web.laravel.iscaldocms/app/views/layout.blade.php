<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ISCAldo | CMS</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>				
		<link rel="shortcut icon" href="{{ URL::to('/') }}/resources/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="{{ URL::to('/') }}/resources/img/favicon.ico" type="image/x-icon">		
        
        <!-- bootstrap 3.0.2 -->
        {{ HTML::style('resources/css/bootstrap.min.css') }}        
        <!-- font Awesome -->
        {{ HTML::style('resources/css/font-awesome.min.css') }}        
        <!-- Ionicons -->
        {{ HTML::style('resources/css/ionicons.min.css') }}        
        <!-- Morris chart -->
        {{ HTML::style('resources/css/morris/morris.css') }}        
        <!-- jvectormap -->
        {{ HTML::style('resources/css/jvectormap/jquery-jvectormap-1.2.2.css') }}        
        <!-- fullCalendar -->
        {{ HTML::style('resources/css/fullcalendar/fullcalendar.css') }}        
        <!-- Daterange picker -->
        {{ HTML::style('resources/css/daterangepicker/daterangepicker-bs3.css') }}        
        <!-- bootstrap wysihtml5 - text editor -->
        {{ HTML::style('resources/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}        
        <!-- Theme style -->
        {{ HTML::style('resources/css/AdminLTE.css') }}
        <!-- Nyromodal -->
        {{ HTML::style('resources/nyroModal/styles/nyroModal.css') }}        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        
        
        <!-- jQuery 2.0.2 -->
        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') }}        
        <!-- jQuery UI 1.10.3 -->
        {{ HTML::script('resources/js/jquery-ui-1.10.3.min.js') }}        
        <!-- Bootstrap -->
        {{ HTML::script('resources/js/bootstrap.min.js') }}        
        <!-- Morris.js charts -->
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}        
        {{ HTML::script('resources/js/plugins/morris/morris.min.js') }}        
        <!-- Sparkline -->
        {{ HTML::script('resources/js/plugins/sparkline/jquery.sparkline.min.js') }}        
        <!-- jvectormap -->
        {{ HTML::script('resources/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}        
        {{ HTML::script('resources/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}        
        <!-- fullCalendar -->
        {{ HTML::script('resources/js/plugins/fullcalendar/fullcalendar.min.js') }}        
        <!-- jQuery Knob Chart -->
        {{ HTML::script('resources/js/plugins/jqueryKnob/jquery.knob.js') }}        
        <!-- daterangepicker -->
        {{ HTML::script('resources/js/plugins/daterangepicker/daterangepicker.js') }}        
        <!-- Bootstrap WYSIHTML5 -->
        {{ HTML::script('resources/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}        
        <!-- iCheck -->
        {{ HTML::script('resources/js/plugins/iCheck/icheck.min.js') }}
        <!-- NyroModal -->
        {{ HTML::script('resources/nyroModal/js/jquery.nyroModal.custom.js') }}                        

        <!-- AdminLTE App -->
        {{ HTML::script('resources/js/AdminLTE/app.js') }}        
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                
    </head>
    
	<body class="skin-blue">
        
        <!-- header logo: style can be found in header.less -->
		<header class="header">
            <a href="{{ URL::to('/'); }}" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                ISCAldo CMS
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                                                
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tienes 0 notificaciones</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <!-- <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>  -->
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>                                                
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $infoUser->name?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">                                    
                                    <p>
                                        <?php echo $infoUser->name?> - Administrador CMS
                                        <small>Bienvenido</small>
                                    </p>
                                </li>                                                               
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ URL::to('/'); }}/login/logout" class="btn btn-default btn-flat">Salir	</a>                                        
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>                                               
		</header>
		<!-- End of heder nav -->
		
		<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ URL::to('/'); }}/resources/img/adminuser.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?php echo $infoUser->name?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    	<li>
                            <a href="{{ URL::to('/'); }}/inicio">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>                            
                        </li>                                                                        
                        <li>
                            <a href="{{ URL::to('/'); }}/info">
                                <i class="fa  fa-bars"></i> <span>Informacion general</span>                               
                            </a>                                                        
                        </li>                        
                        <li>
                            <a href="{{ URL::to('/'); }}/proyectos">
                                <i class="fa  fa-exchange"></i> <span>Proyectos</span>
                            </a>                            
                        </li>
                        <li>
                            <a href="{{ URL::to('/'); }}/blog">
                                <i class="fa  fa-desktop"></i> <span>Blog</span>
                            </a>                            
                        </li>                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- End sidebar left -->
            
            
            <!-- Contenido principal -->
            <aside class="right-side">
            	@yield('content')    
            </aside><!-- /.right-side -->                                    
        </div>
	</body>
</html>