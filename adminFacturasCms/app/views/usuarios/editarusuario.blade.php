@extends('layout')

<?php 
if ($user != "") {
	$title = "Editando usuario <b>$user->name</b>";
	$type="update";
	$usuarioid = $user->iduser;		
}
else {
	$title = "Creando nuevo usuario";
	$type="insert";
	$usuarioid = "0";	
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
    	<h1>Usuarios<small>&nbsp;</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ URL::to('/'); }}/usuarios">Usuarios</a></li>
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
	            	<i class="fa fa-users"></i>
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
	            	            		            		            	
	            	@if($user != "")
    					{{ Form::model($user, array('action' => array('UsuariosController@guardarusuario', $user->iduser), 'method'=>'post', 'name'=>'formusers', 'files' => false)) }}    					
					@else
    					{{ Form::open(array('action' => 'UsuariosController@guardarusuario', 'name'=>'formusers', 'method'=>'post', 'files' => false)) }}
					@endif
	            							            
	            		<div class="form-group">
                        	<label for="exampleInputFile">Nombre:</label>
                        	{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
                        	<?php echo ($errors->has('name')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('name')."</label>" : "";  ?>                            
                        </div>
                        
                        <div class="form-group">
                        	<label for="exampleInputFile">Apellidos:</label>
                        	{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Apellidos')) }}
                        	<?php echo ($errors->has('lastname')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('lastname')."</label>" : "";  ?>                            
                        </div>
                        
                        <div class="form-group">
                        	<label for="exampleInputFile">Dirección:</label>
                        	{{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Dirección')) }}
                        	<?php echo ($errors->has('address')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('address')."</label>" : "";  ?>                            
                        </div>
                        
                        <div class="form-group">
                        	<label for="exampleInputFile">Tipo de usuario:</label>
                        	{{ Form::select('idrol', $roleCombo); }}
                        	<?php echo ($errors->has('idrol')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('idrol')."</label>" : "";  ?>                            
                        </div>
                        
                        <div class="form-group">
                        	<label for="exampleInputFile">Empresa:</label>
                        	{{ Form::select('idcompany', $companyCombo); }}
                        	<?php echo ($errors->has('idcompany')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('idcompany')."</label>" : "";  ?>                            
                        </div>
                        
                        <br>
                        
                        <?php 
                        if ($type=="insert") {
                        	?>
                        	<div class="form-group">
	                        	<label for="exampleInputFile">Email:</label>
	                        	{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
	                        	<?php echo ($errors->has('email')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('email')."</label>" : "";  ?>                            
	                        </div>
	                        <div class="form-group">
	                        	<label for="exampleInputFile">Password:</label>                        	
	                        	<input type="password" name="password" class="form-control" placeholder="Password"/>
	                        	<?php echo ($errors->has('password')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('password')."</label>" : "";  ?>                            
	                        </div>
	                        <div class="form-group">
	                        	<label for="exampleInputFile">Confirmar Password:</label>                        	
	                        	<input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar password"/>
	                        	<?php echo ($errors->has('password_confirmation')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('password_confirmation')."</label>" : "";  ?>                            
	                        </div>
                        	<?php
                        }
                        else {
                        	?>
                        	<div class="form-group">
	                        	<label for="exampleInputFile">Email:</label>
	                        	<strong><?php echo $user->email?></strong>                            
	                        </div>
                        	<?php
                        }
                        ?>
                        
                         
                        
                                                                                                                                                 
                        
                        <div class="box-footer">
                        	<button class="btn btn-primary" type="submit">Guardar</button>
                        	&nbsp;&nbsp;&nbsp;&nbsp;
                        	<a href="{{ URL::to('/'); }}/usuarios"><button type="button" class="btn btn-info">Regresar</button></a>
                        </div>  
                        
                        {{ Form::hidden('usuarioid', $usuarioid) }}                                                                     
                        {{ Form::hidden('type', $type) }}                        
	            	{{ Form::close() }}	            		            		            	                                        	   	                            
	            </div>
	            <!-- End Contenido -->    		
	    	</div>
		</div>
	</section>		               
@stop