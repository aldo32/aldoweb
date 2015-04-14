<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>
                        	   
	    
		<script>
		$(document).ready(function() {
			$("#reportes").submit(function(e) {
				e.preventDefault();								

				var idUsuario = $("#idUsuario").val();

				if (idUsuario != "-1") {	
					$('#showUser').html("Cargando...");				
					$.ajax({													
				        url: "<?php echo base_url()?>reportes/showUserAssistance",        
				        data: "idUsuario="+idUsuario+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",		             
				        dataType: "html",		                	                	      
				        success: function(datos) {  	        	
				        	$('#showUser').fadeOut('fast', function() { $('#showUser').html(datos).fadeIn('fast'); });	        	
				        },
				        type: "POST"
					});
				}
				else {
					alert("Debe seleccionar un usuario");
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
                        Reporte de asistencia por usuario
                        <small>Evolve</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Reporte de asistencia por usuario</li>
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
				            	<i class="fa fa-chart-o"></i>
				                <h3 class="box-title">Reportes</h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	            	  				            
				           
		            			<div class="box-body table-responsive" style="position: relative;">
					            	<div style="width: 100%; text-align: center;">
					            		<?php echo form_open("reportes/other", array("name"=>"reportes", "id"=>"reportes","method"=>"post"))?>
						            		<div class="form-group">
					                        	<label for="exampleInputFile">Usuario:</label>
					                        	<?php echo form_dropdown("idUsuario", $usuarios, '', 'id="idUsuario"')?>
					                        	<?php echo (form_error('idUsuario') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('idUsuario')."</label>" : ""; ?>                        				                        	   			                        	                                                
		                        			</div>
		                        			
		                        			<button class="btn btn-primary" type="submit">Mostrar</button>
		                        		<?php echo form_close()?> 
		                        		<br>
		                        		
		                        		<div id="showUser"></div>				                        			                        			           						            
					            	</div>
					            </div>
				            				            				            		
				    	</div>
					</div>
					
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->              

    </body>
</html>
<?php /*evo.PROMOTORES.2015*/ ?>