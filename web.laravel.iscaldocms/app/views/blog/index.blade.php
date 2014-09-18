@extends('layout')

@section('content')
	<!-- Datatables -->
	{{ HTML::style('resources/css/AdminLTE.css') }}
	
	<!-- Datatables -->        
    {{ HTML::script('resources/js/plugins/datatables/jquery.dataTables.js') }}
    {{ HTML::script('resources/js/plugins/datatables/dataTables.bootstrap.js') }}
    
	<script>
	$(document).ready(function() {
		$('#blogsTable').dataTable();

		$('.nyroModal').nyroModal();		
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Administrar<small>Blog</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Administrar</li>
            <li class="active">Blog</li>
        </ol>                
	</section>
	
	<section class="content">
		<!-- Alerts -->
		<?php echo (isset($alert)) ? $alert : '';?>
	
		<!-- Capa principal -->
	    <div class="col-xs-12">    	
	    	<div class="box box-primary">
	    		<div class="box-header">
	            	<i class="fa fa-desktop"></i>
	                <h3 class="box-title">&nbsp;</h3>
	                <div class="box-tools pull-right">
	                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
	                </div>
	            </div>	            	            	           	           
	            	            	            
	            <div class="box-body table-responsive">
	            	<a href="{{ URL::to('/'); }}/blog/crearblog"><button class="btn btn-primary btn-lg">Crear nueva entrada para el blog</button></a>
	            	<br/><br/>
	            	            	 	            		            	
                   	<table id="blogsTable" class="table table-bordered table-striped">
                    	<thead>
                        	<tr>
                        		<th>ID</th>
                            	<th>Titulo</th>
                            	<th>Imagen</th>                                
                                <th>Actualizado</th>                                                                
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	if (isset($blog)) {
				            	foreach ($blog AS $row) {
				            		?>
				            		<tr>
				            			<td><?php echo $row->blogid?></td>
				            			<td><?php echo $row->title?></td>				            							            			
				            			<td>
				            				<?php 
				            				if ($row->image != "") { ?><a href="{{ URL::to('/'); }}/<?php echo $row->image?>" class="nyroModal">Ver imagen</a>&nbsp;&nbsp;&nbsp;<?php  } else { echo "Ninguna"; }
				            				?>				            				
				            			</td>
				            			<td><?php echo $row->updated_at?></td>				   	         			
				            			<td align="center">
				            				<a href='{{ URL::to('/'); }}/blog/editarblog/<?php echo $row->blogid?>'><button class="btn btn-primary">Editar</button></a>&nbsp;&nbsp;
				            				<a href='{{ URL::to('/'); }}/blog/eliminarblog/<?php echo $row->blogid?>'><button class="btn btn-danger">Eliminar</button></a>
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
	</section>		               
@stop