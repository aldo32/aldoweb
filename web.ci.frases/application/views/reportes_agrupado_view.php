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
        
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/jquery-ui/jquery-ui.css">        
          		
  		<script src="<?php echo base_url()?>/resources/jquery-ui/jquery-ui.js"></script>                	   
	    
		<script>
		$(document).ready(function() {
			$("#initDate").datepicker({
				dateFormat: "yy-mm-dd",
				autoSize: true,
				showOptions: { direction: "bottom" }
			});
			$("#endDate").datepicker({
				dateFormat: "yy-mm-dd",
				autoSize: true,
				showOptions: { direction: "bottom" }
			});
			
			//$(".data-mask").inputmask();	
			
			$("#reportes").submit(function(e) {
				e.preventDefault();								

				var initDate = $("#initDate").val();
				var endDate = $("#endDate").val();
				
				if (initDate != "" && endDate != "") {	
					$('#showReport').html("Cargando...");				
					$.ajax({													
				        url: "<?php echo base_url()?>reportes/showReporGrouDates",        
				        data: "initDate="+initDate+"&endDate="+endDate+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",		             
				        dataType: "html",		                	                	      
				        success: function(datos) {  	        	
				        	$('#showReport').fadeOut('fast', function() { $('#showReport').html(datos).fadeIn('fast'); });	        	
				        },
				        type: "POST"
					});
				}
				else {
					alert("Debe ingresar una fecha de inicio y final");
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
                        <li class="active">Reporte de asistencia agrupado por rango de fechas</li>
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
					            			<center>
					            			<table width="500">
					            				<tr>
					            					<td>
					            						<div class="form-group">
								                        	<label>Fecha inicial:</label>
								                            <div class="input-group">
								                            	<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								                            	<?php echo form_input(array('name' => 'initDate', 'id' => 'initDate', 'class'=>'form-control data-mask', 'data-inputmask'=>"'alias':'yyyy/mm/dd'", 'value' =>set_value('initDate')));?>                                			                                
								                            </div>
								                            <?php echo (form_error('initDate') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('initDate')."</label>" : ""; ?>
								                        </div>
					            					</td>
					            					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					            					<td>
					            						<div class="form-group">
								                        	<label>Fecha final:</label>
								                            <div class="input-group">
								                            	<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								                            	<?php echo form_input(array('name' => 'endDate', 'id' => 'endDate', 'class'=>'form-control data-mask', 'data-inputmask'=>"'alias':'yyyy/mm/dd'", 'value' =>set_value('endDate')));?>                                			                                
								                            </div>
								                            <?php echo (form_error('endDate') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('endDate')."</label>" : ""; ?>
								                        </div>
					            					</td>
					            				</tr>					            				
					            			</table>		
					            			</center>				            							                        					                        
		                        			
		                        			<button class="btn btn-primary" type="submit">Mostrar</button>
		                        		<?php echo form_close()?> 
		                        		<br>
		                        		
		                        		<div id="showReport"></div>				                        			                        			           						            
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