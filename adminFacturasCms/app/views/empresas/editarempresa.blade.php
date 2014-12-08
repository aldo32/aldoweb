@extends('layout')

<?php 
if ($empresa != "") {
	$title = "Editando empresa <b>$empresa->name</b>";
	$type="update";
	$idcompany = $empresa->idcompany;		
}
else {
	$title = "Creando nueva empresa";
	$type="insert";
	$idcompany = "0";	
}
?>

@section('content')
	{{ HTML::style('resources/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}	
	
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    
    <!-- InputMask -->
    {{ HTML::script('resources/js/plugins/input-mask/jquery.inputmask.js') }}
    {{ HTML::script('resources/js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}
    {{ HTML::script('resources/js/plugins/input-mask/jquery.inputmask.extensions.js') }}    

	<script>
	$(document).ready(function() {				
		$('.nyroModal').nyroModal();		
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Empresas<small>&nbsp;</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ URL::to('/'); }}/usuarios">Empresas</a></li>
            <li class="active"><?php echo $title?></li>
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
	            	<i class="fa fa-cogs"></i>
	                <h3 class="box-title"><?php echo $title?></h3>
	                <div class="box-tools pull-right">
	                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
	                </div>
	            </div>	            	            
	            	            	            
	            <!-- Contenido -->
	            <div class="box-body table-responsive">
	            	<?php                                                            
                    /*foreach ($errors->all() as $message) {
						echo '<span style="color: red; font-weight: bold;">'.$message.'</span><br>';						
					}*/
					?>
	            	</br>
	            	            		            		            	
	            	@if($empresa != "")
    					{{ Form::model($empresa, array('action' => array('EmpresasController@guardarempresa', $empresa->idcompany), 'method'=>'post', 'name'=>'formempresa', 'files' => false)) }}    					
					@else
    					{{ Form::open(array('action' => 'EmpresasController@guardarempresa', 'name'=>'formempresa', 'method'=>'post', 'files' => false)) }}
					@endif
	            							            
	            		<div class="form-group">
                        	<label for="exampleInputFile">Nombre:</label>
                        	{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
                        	<?php echo ($errors->has('name')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('name')."</label>" : "";  ?>                            
                        </div>
                        
                        <div class="form-group">
                        	<label for="exampleInputFile">Descripción:</label>
                        	{{ Form::text('description', null, array('class'=>'form-control', 'placeholder'=>'Descripción')) }}
                        	<?php echo ($errors->has('description')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('description')."</label>" : "";  ?>                            
                        </div>
                                                                                                                    
                        
                        <div class="box-footer">
                        	<button class="btn btn-primary" type="submit">Guardar</button>
                        	&nbsp;&nbsp;&nbsp;&nbsp;
                        	<a href="{{ URL::to('/'); }}/empresas"><button type="button" class="btn btn-info">Regresar</button></a>
                        </div>  
                        
                        {{ Form::hidden('idcompany', $idcompany) }}                                                                     
                        {{ Form::hidden('type', $type) }}                        
	            	{{ Form::close() }}	            		            		            	                                        	   	                            
	            </div>
	            <!-- End Contenido -->    		
	    	</div>
		</div>
	</section>		               
@stop