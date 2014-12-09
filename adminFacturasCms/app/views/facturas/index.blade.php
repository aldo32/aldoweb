@extends('layout')

@section('content')
	<!-- Datatables -->
	{{ HTML::style('resources/css/AdminLTE.css') }}
	
	<!-- Datatables -->        
    {{ HTML::script('resources/js/plugins/datatables/jquery.dataTables.js') }}
    {{ HTML::script('resources/js/plugins/datatables/dataTables.bootstrap.js') }}
    
	<script>
	$(document).ready(function() {
		$('#billsTable').dataTable();				
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Facturas<small>Proveedores</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Facturas</li>
            <li class="active">Proveedores</li>
        </ol>                
	</section>
	
	<section class="content">
		<!-- Alerts -->
		<?php echo (isset($alert)) ? $alert : '';?>
	
		<!-- Capa principal -->
	    <div class="col-xs-12">    	
	    	<div class="box box-primary">
	    		<div class="box-header">
	            	<i class="fa fa-file"></i>
	                <h3 class="box-title">&nbsp;</h3>
	                <div class="box-tools pull-right">
	                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
	                </div>
	            </div>	            	            
	            	            	            
	            <div class="box-body table-responsive">	    
	            		            		                    	 	            		            	
                   	<table id="empresasTable" class="table table-bordered table-striped">
                    	<thead>
                        	<tr>
                        		<th>ID</th>
                            	<th>Empresa</th>                                
                                <th>Nombre</th>                                                                                                
                                <th>Email</th>
                                <th>PDF</th>
                                <th>XML</th>
                                <th>Fecha</th>
                                <th>Mensaje</th>
                                <th width="150">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	if (count($bills) >= 1) {
				            	foreach ($bills AS $row) {
				            		?>
				            		<tr>
				            			<td><?php echo $row->idbill?></td>
				            			<td><?php echo $row->company?></td>
				            			<td><?php echo $row->username?></td>				            							            			
				            			<td><?php echo $row->email?></td>				            							            		
				            			<td><a href="{{ URL::to('/'); }}/facturas/getDownload/<?php echo $row->idbill?>/pdf" target="_blank">Descargar PDF</a></td>
				            			<td><a href="{{ URL::to('/'); }}/facturas/getDownload/<?php echo $row->idbill?>/xml" target="_blank">Descargar XML</a></td>
				            			<td><?php echo $row->created_at?></td>
				            			<td><?php echo $row->message?></td>
				            			<td align="center">				            								            			
				            				<a href='{{ URL::to('/'); }}/facturas/eliminarFactura/<?php echo $row->idbill?>'><button class="btn btn-danger btn-sm">Borrar</button></a>
				            			</td>
				            		</tr>
				            		<?php 
				            	}
				            }				     
				            else {
				            	echo "<tr><td colspan='7'>No hay registros para mostrar</td></tr>";
				            }       
			            	?>                        	                        	                           
                        </tbody>
                    </table>                              
	            </div>    		
	    	</div>
		</div>
	</section>		               
@stop