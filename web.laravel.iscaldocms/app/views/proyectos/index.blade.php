@extends('layout')

@section('content')
	<script>
	$(document).ready(function() {
		
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Administrar<small>Proyectos</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Administrar</li>
            <li class="active">Proyectos</li>
        </ol>                
	</section>
	
	<section class="content">
		<!-- Alerts -->
		<?php echo (isset($alert)) ? $alert : '';?>
	
		<!-- Capa principal -->
	    <div class="col-xs-12">    	
	    	<div class="box box-primary">
	    		<div class="box-header">
	            	<i class="fa fa-exchange"></i>
	                <h3 class="box-title">&nbsp;</h3>
	                <div class="box-tools pull-right">
	                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
	                </div>
	            </div>	            	            
	            
	            <!-- Contenido -->
	            <div class="box-body table-responsive">
	            	
	            	<a href="{{ URL::to('/'); }}/proyectos/crearproyecto"><button class="btn btn-primary btn-lg">Crear nuevo proyecto</button></a>
	            	<br/><br/>
	            	            	 	            		            	
                	<div class="row">
                		
                		<?php 
                		if (isset($proyects)) {
                			foreach ($proyects AS $row) {
                				?>
                				<div class="col-md-3">                        
		                        	<div class="box box-solid bg-navy" style="height: 150px;">
		                            	<div class="box-header"><h3 class="box-title" ><?php echo $row->name?></h3></div>		                            			                            
		                            	<div class="box-body" style="text-align: right;">		                         		                            		   		
		                                	<a href="{{ URL::to('/'); }}/proyectos/editarproyecto/<?php echo $row->proyectid?>"><button class="btn btn-primary btn-sm">Editar</button></a>                                    
		                                	<button class="btn btn-danger btn-sm" onclick="if (confirm('Realmente desea eliminar este proyecto?')) { document.deleteproyect.proyectid.value=<?php echo $row->proyectid?>; document.deleteproyect.submit(); }">Eliminar</button>
		                            	</div>
		                            </div>
		                        </div>
                				<?php 
                			}
                		}
                		?>                		                		                		                		                	
                		
                		{{ Form::open(array('action' => 'ProyectsController@eliminarproyecto', 'name'=>'deleteproyect')) }}
                			<input type="hidden" name="proyectid" value="">
                		{{ Form::close() }}
                        
                	</div>   	                              
	            </div>
	            <!-- End Contenido -->    		
	    	</div>
		</div>
	</section>		               
@stop