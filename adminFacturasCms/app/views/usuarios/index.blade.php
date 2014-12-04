@extends('layout')

@section('content')
	<!-- Datatables -->
	{{ HTML::style('resources/css/AdminLTE.css') }}
	
	<!-- Datatables -->        
    {{ HTML::script('resources/js/plugins/datatables/jquery.dataTables.js') }}
    {{ HTML::script('resources/js/plugins/datatables/dataTables.bootstrap.js') }}
    
	<script>
	$(document).ready(function() {
		$('#usuariosTable').dataTable();				
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Administrar<small>Usuarios</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Administrar</li>
            <li class="active">Usuarios</li>
        </ol>                
	</section>
	
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
	            	            	            
	            <div class="box-body table-responsive">	    
	            	
	            	<a href="{{ URL::to('/'); }}/usuarios/crearusuario"><button class="btn btn-primary btn-lg">Crear nuevo usuario</button></a>
	            	<br/><br/>
	                    	 	            		            	
                   	<table id="usersTable" class="table table-bordered table-striped">
                    	<thead>
                        	<tr>
                        		<th>ID</th>
                            	<th>Nombre</th>                                
                                <th>Apellidos</th>                                                                
                                <th>Compañia</th>
                                <th>Dirección</th>
                                <th>Email</th>
                                <th width="50">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	if (count($users) > 1) {
				            	foreach ($users AS $row) {
				            		?>
				            		<tr>
				            			<td><?php echo $row->idusers?></td>
				            			<td><?php echo $row->name?></td>				            							            			
				            			<td><?php echo $row->lastname?></td>
				            			<td><?php echo $row->company['name']?></td>
				            			<td><?php echo $row->address?></td>
				            			<td><?php echo $row->email?></td>				            			
				            			<td align="center"><a href='{{ URL::to('/'); }}/info/editar/<?php echo $row->infoid?>'><button class="btn btn-primary">Editar</button></a></td>
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