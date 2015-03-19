<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>
        
        <!-- InputMask -->
        <script src="<?php echo base_url()?>/resources/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        
        <!-- Datatables -->
        <script src="<?php echo base_url()?>/resources/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>        	    
	    
		<script>
		$(document).ready(function() {
			$(".data-mask").inputmask();					
		});

		function confirmDelete(id) {			
			if (confirm('Desea eliminar el permiso?')) { location="<?php echo base_url('usuarios/eliminarPermiso')?>/"+id; }
		}
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
                        <small>Evolve</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Usuarios</li>
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
				                <h3 class="box-title">Permisos - <?php echo $usuario->nombre?></h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	            	   
				            	            	            
				            <div class="box-body table-responsive">				            					            	            	 	            		            
			                   	<table id="usersTable" class="table table-condensed">
			                    	<thead>
			                        	<tr>
			                        		<th>ID</th>
			                            	<th>Permiso</th>                                
			                                <th>Fecha</th>			                                			                                
			                                <th>Creado</th>			                                                                                              
			                                <th width="150">Operaciones</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	<?php 
			                        	if (isset($permisosUsuario)) {
			                        		foreach ($permisosUsuario AS $row) {
			                        			?>
			                        			<tr>
			                        				<td><?php echo $row->id?></td>
			                        				<td><?php echo $row->nombrePermiso?></td>
			                        				<td><?php echo $row->fecha?></td>
			                        				<td><?php echo $row->fechaCreacion?></td>			                        				
			                        				<td align="center" width="150">							            														            					            			
							            				<a href="" onclick="confirmDelete(<?php echo $row->id?>)"><button class="btn btn-sm btn-danger">Eliminar</button></a>
							            			</td>
			                        			</tr>
			                        			<?php 
			                        		}
			                        	}
			                        	else { echo "<tr colspan='8'><td>No hay permisos para este usuario</td></tr>"; }
			                        	?>			                        	                    	                        	                          
			                        </tbody>
			                    </table>    			                   			                                            
				            </div>    		
				    	</div>
					</div>
					
					
					<div class="col-xs-12">    	
				    	<div class="box box-primary">
				    		<div class="box-header">
				            	<i class="fa fa-users"></i>
				                <h3 class="box-title">Agregar nuevo permiso</h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	            	   
				            	            	            
				            <div class="box-body table-responsive">
				            	<?php echo form_open("usuarios/guardarPermiso", array("name"=>"permisosForm", "method"=>"post"), array("idUsuario"=>$usuario->id))?>
			                    	<div class="form-group">
			                        	<label for="exampleInputFile">Permiso:</label>
			                        	<?php echo form_dropdown("idPermiso", $comboPermisos)?>
			                        	<?php echo (form_error('idPermiso') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('idPermiso')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
			                    	
			                    	<div class="form-group">
			                        	<label>Fecha de permiso:</label>
			                            <div class="input-group">
			                            	<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			                            	<?php echo form_input(array('name' => 'fecha', 'id' => 'fecha', 'class'=>'form-control data-mask', 'data-inputmask'=>"'alias':'yyyy/mm/dd'", 'value' =>set_value('fecha')));?>                                			                                
			                            </div>
			                            <?php echo (form_error('fecha') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('fecha')."</label>" : ""; ?>
			                        </div>
			                        
			                        <br>
                        			<div class="form-group">
                        				<button class="btn btn-primary" type="submit">Agregar</button>
                        			</div>
			                    <?php echo form_close();?> 	
				            </div>
				        </div>
				    </div>
					
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->              

    </body>
</html>
<?php /*evo.PROMOTORES.2015*/ ?>