<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Login Asistencias</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
                
        <link href="<?php echo base_url()?>/resources/css/bootstrap.min.css" rel="stylesheet" type="text/css" />        
        <link href="<?php echo base_url()?>/resources/css/font-awesome.min.css" rel="stylesheet" type="text/css" />        
        <link href="<?php echo base_url()?>/resources/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/resources//js/bootstrap.min.js" type="text/javascript"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <script>
		$(document).ready(function() {
			/*$("#loginForm").submit(function(e) {
				e.preventDefault();

				var user = $("#usuario");
				var pass = $("#password");

				if (user.val() == "" || pass.val() == "") {
					alert("Debe ingresar un usuario y password");
				}
				else {
					document.getElementById("loginForm").submit();					
				}
			});*/
		});
        </script>
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header"><?php echo img(array('src'=>'resources/img/logo-evo.png', 'alt'=> 'Evolve Interactive', 'width'=>'150', 'height'=>'60'));?></div>
            <?php echo form_open("login/access", array("name"=>"loginForm", "id"=>"loginForm", "method"=>"post"))?>
                <div class="body bg-gray">
                    <div class="form-group">
                    	<?php echo form_input(array('name' => 'usuario', 'id' => 'usuario', 'class'=>'form-control', 'placeholder'=>'Usuario', 'value' =>set_value('usuario')));?>                        
                    </div>
                    <div class="form-group">                        
                        <?php echo form_input(array('name' => 'password', 'type'=>'password', 'id' => 'password', 'class'=>'form-control', 'placeholder'=>'Password', 'value' =>set_value('userid')));?>
                    </div>                              
                </div>
                <div class="footer"> 
                	<br>                                                              
                    <button type="submit" class="btn bg-olive btn-block">Entrar</button>                                                                                  
                </div>
            <?php echo form_close();?>
            
            <?php echo validation_errors('<div style="color: white; font-weight: bold; font-size: 16px;">', '</div>');?>
            <?php echo (isset($message)) ? $message : "";?>            
        </div>                       

    </body>
</html>