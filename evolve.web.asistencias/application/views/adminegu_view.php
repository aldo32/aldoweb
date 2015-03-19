<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>
                        	   
	    
		<script>
		$(document).ready(function() {
			$("#grupos").change(function() {
				//content-users-group
				var idGrupo = $(this).val(); 

				$.ajax({													
			        url: "<?php echo base_url()?>adminegu/showUsersByGroup",        
			        data: "idGrupo="+idGrupo+"&idEtapa=<?php echo (isset($etapa->id)) ? $etapa->id : "0" ?>",		             
			        dataType: "html",		                	                	      
			        success: function(datos) {  	        	
			        	$('#content-users-group').fadeOut('fast', function() { $('#content-users-group').html(datos).fadeIn('fast'); });	        	
			        },
			        type: "POST"
				});
			});

			$("#addItems").click(function(e) {
				e.preventDefault();
				usuarios = $("#usuarios").val();
				idGrupo = $("#grupos").val();				
				idEtapa=<?php echo (isset($etapa->id)) ? $etapa->id : "0" ?>;				
				
				if (usuarios != null && idGrupo != "-1") {										
					$.ajax({										
				        url: "<?php echo base_url()?>adminegu/addUsersToGroupStage",        
				        data: "usuarios="+usuarios+"&idEtapa="+idEtapa+"&idGrupo="+idGrupo,     				        
				        dataType: "json",        	                	       
				        success: function(datos){
				        	var combo = $("<select></select>").attr("id", "usuariosGrupo").attr("class", "form-control").attr("style", "width: 250px; height: 280px;").attr("multiple", "multiple");
				        	
				        	for (i=0; i<datos.registers.length; i++) {
					        	combo.append("<option value='"+datos.registers[i].idUsuario+"'>"+datos.registers[i].nombreUsuario+"</option>");					        	
					        }    		

				        	$('#content-users-group').html(combo);	

				        	//Errors
				        	$("#errorMessages").append(datos.errors);				        				        				         	        	       						        			        	    																									
				        },        
				        type: "POST"
					});										
				}		
				else {
					alert("No se ha seleccionado ningun usuario para agregar o el grupo no es valido");
				}						
			});	

			$("#removeItems").click(function(e) {
				e.preventDefault();
				usuariosGrupo = $("#usuariosGrupo").val();
				idGrupo = $("#grupos").val();
				idEtapa=<?php echo (isset($etapa->id)) ? $etapa->id : "0" ?>;

				if (usuariosGrupo != null) {										
					$.ajax({										
				        url: "<?php echo base_url()?>adminegu/deleteUsersOfGroupStage",        
				        data: "usuariosGrupo="+usuariosGrupo+"&idEtapa="+idEtapa+"&idGrupo="+idGrupo,     				        
				        dataType: "json",        	                	       
				        success: function(datos){				        	
				        	var combo = $("<select></select>").attr("id", "usuariosGrupo").attr("class", "form-control").attr("style", "width: 250px; height: 280px;").attr("multiple", "multiple");
				        	for (i=0; i<datos.registers.length; i++) {
					        	combo.append("<option value='"+datos.registers[i].idUsuario+"'>"+datos.registers[i].nombreUsuario+"</option>");					        	
					        }    		

				        	$('#content-users-group').html(combo);	

				        	//Errors
				        	$("#errorMessages").append(datos.errors);				        				        				         	        	       						        			        	    																									
				        },        
				        type: "POST"
					});										
				}		
				else {
					alert("No se ha seleccionado ningun usuario para eliminar del grupo");
				}
			});			
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
                        Administrar Etapas, grupos y usuarios
                        <small>Evolve</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Etapas, grupos y usuarios</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                	<!-- Alerts -->
                	<div id="errorMessages"></div>
					<?php echo (isset($alert)) ? $alert : '';?>
                
					<!-- Capa principal -->
				    <div class="col-xs-12">    	
				    	<div class="box box-primary">
				    		<div class="box-header">
				            	<i class="fa fa-gears"></i>
				                <h3 class="box-title"><?php if (isset($etapa)) { echo "Etapa: ".$etapa->nombre; } else { echo "&nbsp;"; }?></h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	            	   
				            
				            <?php 
				            if (isset($option)) {
				            	switch ($option) {
				            		case '0':
				            			?>
				            			<div class="box-body table-responsive" style="position: relative;">
							            	<div style="width: 100%; text-align: center;">
							            		<?php echo form_open("adminegu/egu", array("name"=>"formegu", "id"=>"formegu","method"=>"post"))?>
								            		<div class="form-group">
							                        	<label for="exampleInputFile">Etapa:</label>
							                        	<?php echo form_dropdown("idEtapa", $etapas, '', 'id="idEtapa"')?>
							                        	<?php echo (form_error('idEtapa') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('idEtapa')."</label>" : ""; ?>                        				                        	   			                        	                                                
				                        			</div>
				                        			
				                        			<button class="btn btn-primary" type="submit">Siguiente</button>
				                        		<?php echo form_close()?> 				            		
							            	</div>
							            </div>
				            			<?php 
				            		break;
				            		
									case 1:										
										?>
										<div class="box-body table-responsive" style="position: relative;">
											<div style="width: 720px; height: 300px; text-align: center; margin: 0 auto;" id="egu-content">
							            		<div style="width: 250px; height: 200px; float: left; margin-right: 50px;">
							            			<div>Usuarios:</div>
							            			<div>
							            				<select style="width: 250px; height: 280px;" class="form-control" id="usuarios" multiple >
							            					<?php 
							            					if (isset($usuarios)) {
							            						foreach ($usuarios AS $row) {
							            							?>
							            							<option value="<?php echo $row->id?>"><?php echo $row->nombre?></option>
							            							<?php 
							            						}
							            					}
							            					else { echo "<option value='-1'>No hay usuarios</option>"; }
							            					?>
							            				</select>
							            			</div>
							            		</div>
							            		
							            		<div style="width: 120px; height: 300px; float: left; text-align: center; padding-top: 50px;">
							            			<div>
							            				<a class="btn btn-app" id="addItems"><i class="fa fa-arrow-right"></i> Agregar </a>
							            			</div>
							            			<div>
							            				<a class="btn btn-app" id="removeItems"><i class="fa fa-arrow-left"></i> Eliminar </a>
							            			</div>
							            			<br><br>
							            			<div>
							            				<a class="btn btn-app" href="<?php echo base_url("adminegu")?>"><i class="fa fa-home"></i> Regresar </a>
							            			</div>
							            		</div>
							            		
							            		<div style="width: 250px; height: 200px; float: left; margin-left: 50px;">
							            			<div>
							            				Grupos: 
							            				<?php reset($grupos); echo form_dropdown("grupos", $grupos, key($grupos), "id='grupos'")?>
							            			</div>
							            			<div id="content-users-group">
							            				<select style="width: 250px; height: 280px;" class="form-control" id="usuariosGrupo" multiple >
							            					<?php 
							            					if (isset($usuariosPorGrupo)) {
							            						foreach ($usuariosPorGrupo AS $row) {
							            							?>
								            						<option value="<?php echo $row->idUsuario?>"><?php echo $row->nombreUsuario?></option>
								            						<?php
							            						}							            						
							            					}
							            					else { echo "<option value='-1'>No hay usuarios</option>"; }
							            					?>
							            				</select>
							            			</div>
							            		</div>
							            	</div>
							            </div>
										<?php 
									break;
									
									default:
										echo "Opción no válida";
									break;
				            	}
				            }
				            else {
				            	echo "No se puede mostrar la pagina";
				            }
				            ?>	            	            				            		
				    	</div>
					</div>
					
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->              

    </body>
</html>
<?php /*evo.PROMOTORES.2015*/ ?>