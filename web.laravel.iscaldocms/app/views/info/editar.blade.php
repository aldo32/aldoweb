@extends('layout')


@section('content')	
	{{ HTML::style('resources/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}	
	
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>    

	<script>
	$(document).ready(function() {		
		var editor = $("#description").wysihtml5({
			'image':false,
			'html':true,
			'lists':false					
		});									

		//$("#description").val('<?php //echo $info->description?>');		
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Información general<small>&nbsp;</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ URL::to('/'); }}/info">Información general</a></li>
            <li class="active">Editar información general</li>
        </ol>                
	</section>
	
	<section class="content">
		<!-- Alerts -->
		<!-- <div class="alert alert-success alert-dismissable">
			<i class="fa fa-check"></i>
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<b>Alert!</b> Success alert preview. This alert is dismissable.
		</div> -->
	
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
	            	            	            
	            <!-- Contenido -->
	            <div class="box-body table-responsive">
	            	<?php                                                            
                    foreach ($errors->all() as $message) {
						echo '<span style="color: red; font-weight: bold;">'.$message.'</span><br>';						
					}
					?>
	            	</br>
	            	            	
	            	{{ Form::open(array('action' => 'InfoController@guardar', 'name'=>'forminfo', 'method'=>'post')) }}						            
	            		<div class="form-group">
                        	<label for="exampleInputFile">Titulo:</label>
                            {{ Form::text('title', $info->title, array('class'=>'form-control', 'placeholder'=>'Titulo de sección')) }}                                                       
                        </div>                                                   
                        
                        <div class="form-group">
                        	<label for="exampleInputFile">Descripción:</label>                        	
                        	<textarea placeholder="Texto a mostrar" rows="8" class="form-control" id="description" name="description"><?php echo $info->description?></textarea>                            
                        </div>                                                                                                                                            
                        
                        <div class="box-footer">
                        	<button class="btn btn-primary" type="submit">Guardar</button>
                        	&nbsp;&nbsp;&nbsp;&nbsp;
                        	<a href="{{ URL::to('/'); }}/info"><button type="button" class="btn btn-info">Regresar</button></a>
                        </div>   
                        
                        {{ Form::hidden('infoid', $info->infoid) }}                                                                    
	            	{{ Form::close() }}	            		            		            	                                        	   	                            
	            </div>
	            <!-- End Contenido -->    		
	    	</div>
		</div>
	</section>		               
@stop