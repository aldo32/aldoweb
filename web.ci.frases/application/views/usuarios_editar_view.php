<?php 
if ($usuario == "") {
	class variables {
		var $id = "";
		var $nombre;
		var $puesto="";
		var $clasificacion="";
		var $sexo="H";
		var $complexion="";
		var $idHorario="-1";
		var $activo="0";
		var $admin="0";
		var $correo="";
	}
	
	$usuario = new variables();
	$type="insert";
	$title = "Nuevo usuario";	
}
else {
	$type="update";
	$title = "Editando [".$usuario->nombre."]";	
}
?>

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
                        <small><?php echo $title;?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url("usuarios")?>">Usuarios</a></li>
                        <li class="active"><?php echo $title;?></li>
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
				                <h3 class="box-title">&nbsp;</h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	
				            
				            <!-- Contenido -->
	            			<div class="box-body table-responsive">
	            				<?php echo form_open("usuarios/guardarusuario", array("name"=>"usuarioForm", "id"=>"usuarioForm", "method"=>"post"), array("type"=>$type, "idUsuario"=>$usuario->id))?>
	            					<div class="form-group">			                        	
			                        	<?php
			                        		if ($usuario->id != "") {
												echo '<label for="exampleInputFile">ID:</label>'; 
			                        			echo form_input(array('name' => 'id', 'id' => 'id', 'class'=>'form-control', 'placeholder'=>'ID', 'size'=>'10', 'readonly'=>"true", 'value' =>set_value('id', $usuario->id)));
			                        		}
			                        		else {
			                        			//echo form_input(array('name' => 'id', 'id' => 'id', 'class'=>'form-control', 'placeholder'=>'ID', 'size'=>'10', 'value' =>set_value('id', $usuario->id)));
			                        		}
			                        	?>
			                        	<?php echo (form_error('id') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('nombre')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
	            					
	            					<div class="form-group">
			                        	<label for="exampleInputFile">Nombre:</label>
			                        	<?php echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'class'=>'form-control', 'placeholder'=>'Nombre completo', 'value' =>set_value('nombre', $usuario->nombre)));?>
			                        	<?php echo (form_error('nombre') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('nombre')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
                        			
                        			<div class="form-group">
			                        	<label for="exampleInputFile">Correo:</label>
			                        	<?php echo form_input(array('name' => 'correo', 'id' => 'correo', 'class'=>'form-control', 'placeholder'=>'correo', 'value' =>set_value('correo', $usuario->correo)));?>
			                        	<?php echo (form_error('correo') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('correo')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
                        			
                        			<div class="form-group">
			                        	<label for="exampleInputFile">Puesto:</label>
			                        	<?php echo form_input(array('name' => 'puesto', 'id' => 'puesto', 'class'=>'form-control', 'placeholder'=>'Puesto', 'value' =>set_value('puesto', $usuario->puesto)));?>
			                        	<?php echo (form_error('puesto') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('puesto', $usuario->puesto)."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
                        			
                        			<div class="form-group">
			                        	<label for="exampleInputFile">Clasificación:</label>
			                        	<?php echo form_input(array('name' => 'clasificacion', 'id' => 'clasificacion', 'class'=>'form-control', 'placeholder'=>'clasificacion', 'value' =>set_value('clasificacion', $usuario->clasificacion)));?>
			                        	<?php echo (form_error('clasificacion') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('clasificacion')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
                        			                        			
                        			<div class="form-group">
			                        	<label for="exampleInputFile">Sexo:</label>
			                        	<div>			                        		
			                        		<?php echo "Hombre  ".form_radio(array('name'=>'sexo', 'id'=>'sexo', 'class'=>'form-control', 'value'=>'H', 'checked'=>set_radio('sexo','H', ($usuario->sexo == 'H') ? true : false)))?> &nbsp;&nbsp;&nbsp;
			                        		<?php echo "Mujer  ".form_radio(array('name'=>'sexo', 'id'=>'sexo', 'class'=>'form-control', 'value'=>'M', 'checked'=>set_radio('sexo', 'M', ($usuario->sexo == 'M') ? true : false)))?>
			                        	</div>			                        	                        				                        	   			                        	                                               
                        			</div>
                        			
                        			<div class="form-group">
			                        	<label for="exampleInputFile">Complexión:</label>
			                        	<?php echo form_input(array('name' => 'complexion', 'id' => 'complexion', 'class'=>'form-control', 'placeholder'=>'Complexión', 'value' =>set_value('complexion', $usuario->complexion)));?>
			                        	<?php echo (form_error('complexion') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('complexion')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
                        			
                        			<div class="form-group">
			                        	<label for="exampleInputFile">Horario:</label>
			                        	<?php echo form_dropdown("idHorario", $horarios, $usuario->idHorario)?>
			                        	<?php echo (form_error('idHorario') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('idHorario')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
                        			
                        			<div class="form-group">
			                        	<label for="exampleInputFile">Status:</label>
			                        	<div>			                        		
			                        		<?php echo "Activo  ".form_radio(array('name'=>'activo', 'id'=>'activo', 'class'=>'form-control', 'value'=>'1', 'checked'=>set_radio('activo','1', ($usuario->activo == '1') ? true : false)))?> &nbsp;&nbsp;&nbsp;
			                        		<?php echo "Inactivo  ".form_radio(array('name'=>'activo', 'id'=>'activo', 'class'=>'form-control', 'value'=>'0', 'checked'=>set_radio('activo', '0', ($usuario->activo == '0') ? true : false)))?>
			                        	</div>			                        	                        				                        	   			                        	                                               
                        			</div>
                        			
                        			<div class="form-group">
			                        	<label for="exampleInputFile">Administrador:</label>
			                        	<div>			                        		
			                        		<?php echo "Si  ".form_radio(array('name'=>'admin', 'id'=>'admin', 'class'=>'form-control', 'value'=>'1', 'checked'=>set_radio('admin','1', ($usuario->admin == '1') ? true : false)))?> &nbsp;&nbsp;&nbsp;
			                        		<?php echo "No  ".form_radio(array('name'=>'admin', 'id'=>'admin', 'class'=>'form-control', 'value'=>'0', 'checked'=>set_radio('admin', '0', ($usuario->admin == '0') ? true : false)))?>
			                        	</div>			                        	                        				                        	   			                        	                                               
                        			</div>
                        			<br><br>
                        			
                        			<?php 
                        			if ($type=="insert") {
                        				?>
                        				<div class="form-group">
				                        	<label for="exampleInputFile">Usuario:</label>
				                        	<?php echo form_input(array('name' => 'usuario', 'id' => 'usuario', 'class'=>'form-control', 'placeholder'=>'Usuario', 'value' =>set_value('usuario')));?>
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
                        				<?php 
                        			}
                        			?>                        			
                        			
                        			<br>
                        			<div class="form-group">
                        				<button class="btn btn-primary" type="submit">Guardar</button>
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