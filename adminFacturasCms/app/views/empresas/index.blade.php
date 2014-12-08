@extends('layout')

@section('content')
	<!-- Datatables -->
	{{ HTML::style('resources/css/AdminLTE.css') }}
	
	<!-- Datatables -->        
    {{ HTML::script('resources/js/plugins/datatables/jquery.dataTables.js') }}
    {{ HTML::script('resources/js/plugins/datatables/dataTables.bootstrap.js') }}
    
	<script>
	$(document).ready(function() {
		$('#empresasTable').dataTable();				
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Administrar<small>Empresas</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Administrar</li>
            <li class="active">Empresas</li>
        </ol>                
	</section>
	
	<section class="content">
		<!-- Alerts -->
		<?php echo (isset($alert)) ? $alert : '';?>
	
		<!-- Capa principal -->
	    <div class="col-xs-12">    	
	    	<div class="box box-primary">
	    		<div class="box-header">
	            	<i class="fa fa-cogs"></i>
	                <h3 class="box-title">&nbsp;</h3>
	                <div class="box-tools pull-right">
	                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
	                </div>
	            </div>	            	            
	            	            	            
	            <div class="box-body table-responsive">	    
	            	
	            	<a href="{{ URL::to('/'); }}/empresas/crearempresa"><button class="btn btn-primary btn-lg">Crear nueva empresa</button></a>
	            	<br/><br/>
	                    	 	            		            	
                   	<table id="empresasTable" class="table table-bordered table-striped">
                    	<thead>
                        	<tr>
                        		<th>ID</th>
                            	<th>Nombre</th>                                
                                <th>Descripción</th>                                                                                                
                                <th width="150">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	if (count($empresas) >= 1) {
				            	foreach ($empresas AS $row) {
				            		?>
				            		<tr>
				            			<td><?php echo $row->idcompany?></td>
				            			<td><?php echo $row->name?></td>				            							            			
				            			<td><?php echo $row->description?></td>				            							            		
				            			<td align="center">
				            				<a href='{{ URL::to('/'); }}/empresas/editarempresa/<?php echo $row->idcompany?>'><button class="btn btn-primary btn-sm">Editar</button></a>				            				
				            				<a href='{{ URL::to('/'); }}/empresas/eliminarempresa/<?php echo $row->idcompany?>'><button class="btn btn-danger btn-sm">Borrar</button></a>
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