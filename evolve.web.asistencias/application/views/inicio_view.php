<?php 
/*make json from data chart*/

if (isset($llegadasUsuario)) {
	$data = "[";
	foreach ($llegadasUsuario AS $row) {
		$data .= "{day: '".strtok($row->hrLlegada, " ")."', minutos: ".$row->minutosTarde."},";
	}
	$data .= "]";		
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>
        
        <!-- Datatables -->
        <script src="<?php echo base_url()?>/resources/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
                
        
        <script type="text/javascript">
        $(function() {                       		           
	     	// AREA CHART
	        var personal = new Morris.Area({
	            element: 'personal',
	            resize: true,
	            parseTime: false,
	            data: <?php echo $data;?>,
	            xkey: 'day',
	            ykeys: ['minutos'],
	            labels: ['Min Tarde'],	            	           
	            lineColors: ['#3c8dbc'],
	            hideHover: 'auto',
	            yLabelFormat : function (y) { return y.toString() + ' Min'; },	            
	        });	     	

	        oTable = $('#llegadasTable').dataTable();

	        $("#idEtapaSemana").change(function() {
	        	$("#lastWeek").html(' ');
		        var id = $(this).val();

				if (id != "-1") { 				
					$.ajax({													
				        url: "<?php echo base_url()?>inicio/showChartDataUser",        
				        data: "idEtapa="+id+"&type=1&idUsuario=<?php echo $usuario->id?>",		             
				        dataType: "script",		                	                	      
				        success: function(datos) {  	        	
				        		        	
				        },
				        type: "POST"
					});
				}
				else { alert("debe elegir una opción"); }
		    });


	        $("#idEtapaMes").change(function() {
	        	$("#lastMonth").html(' ');
		        var id = $(this).val();

				if (id != "-1") { 				
					$.ajax({													
				        url: "<?php echo base_url()?>inicio/showChartDataUser",        
				        data: "idEtapa="+id+"&type=2&idUsuario=<?php echo $usuario->id?>",		             
				        dataType: "script",		                	                	      
				        success: function(datos) {  	        	
				        		        	
				        },
				        type: "POST"
					});
				}
				else { alert("debe elegir una opción"); }
		    });

	        $("#idEtapaAnio").change(function() {
	        	$("#lastYear").html(' ');
		        var id = $(this).val();

				if (id != "-1") { 				
					$.ajax({													
				        url: "<?php echo base_url()?>inicio/showChartDataUser",        
				        data: "idEtapa="+id+"&type=3&idUsuario=<?php echo $usuario->id?>",		             
				        dataType: "script",		                	                	      
				        success: function(datos) {  	        	
				        		        	
				        },
				        type: "POST"
					});
				}
				else { alert("debe elegir una opción"); }
		    });

		    
	        $("#idEtapa").change(function() {
	        	$("#etapaGrupos").html(' ');
		        var id = $(this).val();

				if (id != "-1") { 				
			        $.ajax({													
				        url: "<?php echo base_url()?>inicio/getChartByStage",        
				        data: "idEtapa="+id,		             
				        dataType: "script",		                	                	      
				        success: function(datos) {  	        	
				        		        	
				        },
				        type: "POST"
					});
				}
				else { alert("debe elegir una opción"); }
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
                        Dashboard
                        <small>Inicio</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">                	                
                	<div style="width: 500px;">
                		<table width="250">
                			<tr>
                				<td>Nombre:</td>
                				<td><strong><?php echo $usuario->nombre;?></strong></td>
                			</tr>
                			
                			<tr>
                				<td>Horario:</td>
                				<td><strong><?php echo $usuario->nombreHorario;?></strong></td>
                			</tr>
                		</table>
                	</div>
                	<br>
                	
                	<div class="row">
                		<div class="col-md-4">
                            <!-- Default box -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Minutos tarde [Última semana]</h3>
                                    <div class="box-tools pull-right">
                                        <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-sm" data-original-title="Collapse"><i class="fa fa-minus"></i></button>                                        
                                    </div>
                                </div>
                                <div class="box-body">
                                	<table>
					            		<tr>
					            			<td>Etapa:</td>
					            			<td><?php echo form_dropdown("idEtapaSemana", $comboEtapas, '', 'id="idEtapaSemana"')?></td>
					            			<td width="50"></td>
					            			<td id="rangoFechas"></td>			            			
					            		</tr>
					            	</table>
			            	
                                   <div class="chart" id="lastWeek"></div>
                                </div><!-- /.box-body -->                                
                            </div><!-- /.box -->
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Default box -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Minutos tarde [Último mes]</h3>
                                    <div class="box-tools pull-right">
                                        <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-sm" data-original-title="Collapse"><i class="fa fa-minus"></i></button>                                        
                                    </div>
                                </div>
                                <div class="box-body">
                                	<table>
					            		<tr>
					            			<td>Etapa:</td>
					            			<td><?php echo form_dropdown("idEtapaMes", $comboEtapas, '', 'id="idEtapaMes"')?></td>
					            			<td width="50"></td>
					            			<td id="rangoFechas"></td>			            			
					            		</tr>
					            	</table>
                                
                                    <div class="chart" id="lastMonth"></div>
                                </div><!-- /.box-body -->                                
                            </div><!-- /.box -->
                        </div>
                        
                        <div class="col-md-4">
                            <!-- Default box -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Minutos tarde [Todo el año]</h3>
                                    <div class="box-tools pull-right">
                                        <button title="" data-toggle="tooltip" data-widget="collapse" class="btn btn-default btn-sm" data-original-title="Collapse"><i class="fa fa-minus"></i></button>                                        
                                    </div>
                                </div>
                                <div class="box-body">
                                	<table>
					            		<tr>
					            			<td>Etapa:</td>
					            			<td><?php echo form_dropdown("idEtapaAnio", $comboEtapas, '', 'id="idEtapaAnio"')?></td>
					            			<td width="50"></td>
					            			<td id="rangoFechas"></td>			            			
					            		</tr>
					            	</table>
                                
                                    <div class="chart" id="lastYear"></div>
                                </div><!-- /.box-body -->                                
                            </div><!-- /.box -->
                        </div>
                	</div>
                
                	<div class="box box-primary">
			    		<div class="box-header">
			            	<i class="fa fa-chart-o"></i>
			                <h3 class="box-title">Asistencias diarias Grafica</h3>
			                <div class="box-tools pull-right">
			                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
			                </div>
			            </div>
			            <div class="box-body table-responsive">
			            	<div class="chart" id="personal" style="height: 300px;"></div>
			            </div>
			        </div>
			        
			        <div class="box box-primary">
			    		<div class="box-header">
			            	<i class="fa fa-chart-o"></i>
			                <h3 class="box-title">Asistencias diarias tabla</h3>
			                <div class="box-tools pull-right">
			                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
			                </div>
			            </div>
			            <div class="box-body table-responsive">
			            	<table id="llegadasTable" class="table table-bordered table-striped">
			                    	<thead>
			                        	<tr>			                        					                            
			                            	<th>Llegada</th>
			                            	<th>Min Tarde</th>
			                            	<th>Permiso</th>
			                            	<th>Multa</th>                                			                                			                                                                                               			                                
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	<?php 			                        	
			                        	if (isset($llegadasUsuario)) {
			                        		foreach ($llegadasUsuario AS $row) {
			                        			?>
			                        			<tr>			                        							                        				
			                        				<td><?php echo $this->general_library->dateFormat($row->hrLlegada)?></td>
			                        				<td><?php echo $row->minutosTarde?></td>
			                        				<td><?php echo ($row->permiso == 0) ? "No" : Si;?></td>
			                        				<td><?php echo "$".$row->multa?></td>			                        							                        				
			                        			</tr>
			                        			<?php 
			                        		}
			                        	}
			                        	?>			                        	                    	                        	                          
			                        </tbody>
			                    </table>
			            </div>
			        </div>	
			        
			        <div class="box box-primary">
			    		<div class="box-header">
			            	<i class="fa fa-chart-o"></i>
			                <h3 class="box-title">Graficas por etapa y grupos</h3>
			                <div class="box-tools pull-right">
			                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
			                </div>
			            </div>
			            <div class="box-body table-responsive">			            	
			            	<table>
			            		<tr>
			            			<td>Etapa:</td>
			            			<td><?php echo form_dropdown("idEtapa", $comboEtapas, '', 'id="idEtapa"')?></td>
			            			<td width="50"></td>
			            			<td id="rangoFechas"></td>			            			
			            		</tr>
			            	</table>
			            	<br>
			            	
			            	<div id="nombresGrupos"></div>
			            	
			            	<br>		            	
			            	<div class="chart" id="etapaGrupos"></div>
			            </div>
			        </div>			                           					
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->              

    </body>
</html>