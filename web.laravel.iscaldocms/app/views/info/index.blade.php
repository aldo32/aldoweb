@extends('layout')

@section('content')
	<!-- Datatables -->
	{{ HTML::style('resources/css/AdminLTE.css') }}
	
	<!-- Datatables -->        
    {{ HTML::script('resources/js/plugins/datatables/jquery.dataTables.js') }}
    {{ HTML::script('resources/js/plugins/datatables/dataTables.bootstrap.js') }}
    
	<script>
	$(document).ready(function() {
		$('#bannersTable').dataTable();

		$('.nyroModal').nyroModal();		
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Administrar<small>Información general</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Administrar</li>
            <li class="active">Información general</li>
        </ol>                
	</section>
	
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
                   	<table id="bannersTable" class="table table-bordered table-striped">
                    	<thead>
                        	<tr>
                        		<th>ID</th>
                            	<th>Titulo</th>                                
                                <th>Actualizado</th>                                                                
                                <th width="50">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	if (isset($info)) {
				            	foreach ($info AS $row) {
				            		?>
				            		<tr>
				            			<td><?php echo $row->infoid?></td>
				            			<td><?php echo $row->title?></td>				            							            			
				            			<td><?php echo $row->updated_at?></td>				            			
				            			<td align="center"><a href='{{ URL::to('/'); }}/info/editar/<?php echo $row->infoid?>'><button class="btn btn-primary">Editar</button></a></td>
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
	</section>		               
@stop