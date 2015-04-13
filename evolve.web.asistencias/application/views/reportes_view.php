<?php 
/*make json from data chart*/

if (isset($llegadas)) {
	$data = "[";
	foreach ($llegadas AS $row) {
		$data .= "{day: '".strtok($row->hrLlegada, " ")."', minutos: ".$row->minutosTarde.", nombre: '".strtok($row->nombre, " ")."'},";
		//$data .= "{name: '".strtok($row->nombre, " ")."', minutos: ".$row->minutosTarde."},";
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
	        /*var personal = new Morris.Area({
	            element: 'allusers',
	            resize: true,
	            parseTime: false,
	            data: //echo $data;,
	            xkey: 'day',
	            ykeys: ['minutos'],
	            xLabelAngle: 90,
	            gridTextSize: 8, 
	            
	            labels: ['Min Tarde'],	            	            	          
	            lineColors: ['#3c8dbc'],
	            hideHover: 'auto',
	            yLabelFormat : function (y) { return y.toString() + ' Min'; },	            
	        });*/

	       /* var lastWeek = Morris.Bar({
				element: 'allusers',
				data: echo $data,
			  	xkey: 'name',
			  	ykeys: ['minutos'],
			  	labels: ['Minutos'],			  	
			  	gridTextSize: 8, 
			  	barRatio: 0.4,
			  	xLabelAngle: 90,
			  	hideHover: 'auto',
			  	 barColors: function (row, series, type) {
				 	if (row.x == "") {
					 	return '#000000';
				 	}
				 	else { return '#A7527F'; }
			  		
			  	 }
			}); */  	

	        oTable = $('#llegadasTable').dataTable();	       
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
                	<br>                	                	                                				        
			        <div class="box box-primary">
			    		<div class="box-header">
			            	<i class="fa fa-chart-o"></i>
			                <h3 class="box-title">Asistencias totales tabla</h3>
			                <div class="box-tools pull-right">
			                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
			                </div>
			            </div>
			            <div class="box-body table-responsive">
			            	<a href="<?php echo base_url("reportes/exportar/todos")?>"><button class="btn btn-sm btn-success">Exportar a Excel</button></a>
	           				<br/><br/>
	           				
			            	<table id="llegadasTable" class="table table-bordered table-striped">
			                    	<thead>
			                        	<tr>			   
			                        		<th>ID</th> 
			                        		<th>Nombre</th>                    					                            
			                            	<th>Llegada</th>
			                            	<th>Min Tarde</th>
			                            	<th>Permiso</th>
			                            	<th>Multa</th>                                			                                			                                                                                               			                                
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	<?php 			                        	
			                        	if (isset($llegadas)) {
			                        		foreach ($llegadas AS $row) {
			                        			$time = strtok($row->hrLlegada, " ");
			                        			$time = strtok("");
			                        			?>
			                        			<tr>
			                        				<td><?php echo $row->idUsuario?></td>
			                        				<td><?php echo $row->nombre?></td>			                        							                        				
			                        				<td><?php echo $this->general_library->dateFormat($row->hrLlegada)." - ".$time?></td>
			                        				<td><?php echo $row->minutosTarde?></td>
			                        				<td><?php echo ($row->permiso == 0) ? "No" : "Si";?></td>
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
			        
			        		                           					
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->              

    </body>
</html>