<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>
        
        <!-- Datatables -->
        <script src="<?php echo base_url()?>/resources/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>        	    
	    
		<script>
		$(document).ready(function() {
			oTable = $('#usersTable').dataTable();
			//oTable.fnSort( [ [1,'asc'] ] );				
		});

		function confirmDelete(id) {			
			if (confirm('Desea eliminar el grupo?')) { location="<?php echo base_url('grupos/eliminar')?>/"+id; }
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
                        Administrar grupos
                        <small>Evolve</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">Grupos</li>
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
				            	<i class="fa fa-bars"></i>
				                <h3 class="box-title">&nbsp;</h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	            	   
				            	            	            
				            <div class="box-body table-responsive">
				            	<a href="<?php echo base_url("grupos/nuevo")?>"><button class="btn-sm btn-primary">Nuevo grupo</button></a>
	           					<br/><br/>				           		
				            	            	 	            		            	
			                   	<table id="usersTable" class="table table-bordered table-striped">
			                    	<thead>
			                        	<tr>
			                        		<th>ID</th>
			                            	<th>Etapa</th>                                
			                                <th>Nombre</th>			                                			                                			                                                                                              
			                                <th width="200">Operaciones</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	<?php 			                        	
			                        	if (isset($grupos)) {
			                        		foreach ($grupos AS $row) {
			                        			?>
			                        			<tr>
			                        				<td><?php echo $row->id?></td>
			                        				<td><?php echo $row->etapa?></td>			                        							                        				
			                        				<td><?php echo $row->nombre?></td>			                        							                        			
			                        				<td align="center" width="250">
							            				<a href="<?php echo base_url("grupos/editar/".$row->id)?>"><button class="btn-sm btn-primary">Editar</button>&nbsp;&nbsp;										            					            				
							            				<a href="#" onclick="confirmDelete(<?php echo $row->id?>)"><button class="btn-sm btn-danger">Eliminar</button></a>
							            			</td>
			                        			</tr>
			                        			<?php 
			                        		}
			                        	}
			                        	?>			                        	                    	                        	                          
			                        </tbody>
			                    </table>                              
				            </div>    		
				    	</div>
					</div>
					
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->              

    </body>
</html>
<?php /*evo.PROMOTORES.2015*/ ?>