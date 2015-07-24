<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>
                
		<script>
		$(document).ready(function() {
				
		});
		</script>
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        
        <?php echo $header;?>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            
            <?php echo $sidebar?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Administrar usuarios
                        <small>Cambiar usaurio y password</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url("usuarios")?>">Usuarios</a></li>
                        <li class="active">Cambiar usuario y passoword</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                	<!-- Alerts -->
					<?php echo (isset($alert)) ? $alert : '';?>
                
					<!-- Capa principal -->
				    <div class="col-xs-12">    	
				    	<div class="box box-primary">
				    		<div class="box-header">
				            	<i class="fa fa-users"></i>
				                <h3 class="box-title"><?php echo $usuario->nombre?></h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	
				            
				            <!-- Contenido -->
	            			<div class="box-body table-responsive">
	            				<?php echo form_open("usuarios/guardarPassword", array("name"=>"passwordForm", "id"=>"passwordForm", "method"=>"post"), array("idUsuario"=>$usuario->id))?>	            					            				
	            					
			                    	<div class="form-group">
							        	<label for="exampleInputFile">Usuario:</label>
							            <?php echo form_input(array('name' => 'usuario', 'id' => 'usuario', 'class'=>'form-control', 'placeholder'=>'Usuario', 'value' =>set_value('usuario', $usuario->usuario)));?>
			                        	<?php echo (form_error('usuario') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('usuario')."</label>" : ""; ?>	                        			
						            </div>
			                        				
			                        <div class="form-group">
							        	<label for="exampleInputFile">Password:</label>
							            <?php echo form_input(array('name' => 'password', 'type'=>'password', 'id' => 'password', 'class'=>'form-control', 'placeholder'=>'Password', 'value' =>set_value('password')));?>
			                        	<?php echo (form_error('password') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('password')."</label>" : ""; ?>	                        			
			                        </div>
			                        	
			                        <div class="form-group">
				                       	<label for="exampleInputFile">Confirmar Password:</label>
				                       	<?php echo form_input(array('name' => 'cpassword', 'type'=>'password', 'id' => 'cpassword', 'class'=>'form-control', 'placeholder'=>'Confirmar password', 'value' =>set_value('cpassword')));?>
			                        	<?php echo (form_error('cpassword') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('cpassword')."</label>" : ""; ?>	                        			
			                        </div>                        				                   		
                        			
                        			<br>
                        			<div class="form-group">
                        				<button class="btn btn-primary" type="submit">Cambiar</button>
                        			</div>
                        			
	            				<?php echo form_close()?>
	            			</div>
	            			<!-- End contenido -->            	   
						</div>					            	            	            				            				        
					</div>
					
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->              

    </body>
</html>
<?php /*evo.PROMOTORES.2015*/ ?>