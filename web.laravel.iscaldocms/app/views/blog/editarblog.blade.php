@extends('layout')

<?php 
if ($blog != "") {
	$title = "Editando entrada de blog <b>$blog->title</b>";
	$type="update";
	$blogid = $blog->blogid;		
}
else {
	$title = "Creando nueva entrada para el blog";
	$type="insert";
	$blogid = "0";	
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
		var editor = $("#description").wysihtml5({
			'image':false,
			'html':true,
			'lists':false					
		});
		
		$("[data-mask]").inputmask();

		$('.nyroModal').nyroModal();

		$('.deleteImage').click(function() {			
			if(confirm("Realmente desea eliminar la imágen?")) {
				blogid = $(this).attr('id');

				$.ajax({													
			        url: "/blog/deleteimage",        
			        data: "blogid="+blogid+"&_token="+$('input[name="_token"]').val(),		             
			        dataType: "json",		                	                	      
			        success: function(datos) {
				        if (datos.status == "success") {					        
							$('#upload').html("<label for='file'>Imagen a subir:</label><input type='file' name='file'><p class='help-block'>Medidas: 800x600 pixeles</br>Extenciones válidas: jpg | png</p>");							
							alert("La imagen se eliminó correctamente");							
				        }
				        else {
					        alert('La imagen ya no existe o no se encuentra');
				        }																			
			        },
			        type: "POST"
				});
				
			}
		});
	});
	</script>

	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>Blog<small>&nbsp;</small></h1>        
        <ol class="breadcrumb">
           	<li><a href="{{ URL::to('/'); }}/inicio"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ URL::to('/'); }}/blog">Blog</a></li>
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
	            	<i class="fa fa-desktop"></i>
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
	            	            		            		            	
	            	@if($blog != "")
    					{{ Form::model($blog, array('action' => array('BlogController@guardarblog', $blog->blogid), 'method'=>'post', 'name'=>'formblog', 'files' => true)) }}    					
					@else
    					{{ Form::open(array('action' => 'BlogController@guardarblog', 'name'=>'formblog', 'method'=>'post', 'files' => true)) }}
					@endif
	            							            
	            		<div class="form-group">
                        	<label for="exampleInputFile">Titulo:</label>
                        	{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Titulo de la entrada')) }}
                        	<?php echo ($errors->has('title')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('title')."</label>" : "";  ?>                            
                        </div>
                        
                        <div class="form-group">
                        	<label for="exampleInputFile">Descripción:</label>                        	
                        	{{ Form::textarea('description', null, ['placeholder'=>'Texto a mostrar', 'class' => 'form-control', 'id'=>'description', 'name'=>'description']) }}    
                        	<?php echo ($errors->has('description')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('description')."</label>" : "";  ?>                        
                        	
                        </div>
	            		
	            		<div class="form-group" id="upload">
                        	<?php 
                        	if ($blog != "") {
								if ($blog->image != "") {
									?>
									<label for="exampleInputFile">Imagen:</label>&nbsp;&nbsp;&nbsp;
									<a href="{{ URL::to('/'); }}/<?php echo $blog->image?>" class="nyroModal">Ver imagen</a>&nbsp;&nbsp;&nbsp;
									<a href="#" id="<?php echo $blog->blogid?>" class="deleteImage" style="color: red;">[eliminar]</a>
									<?php 
								}
								else {
									?>
									<label for="exampleInputFile">Imagen a subir:</label>
		                            <input type="file" name="file">
		                            <p class="help-block">
		                            	Medidas: 800x600 pixeles</br>
		                            	Extenciones válidas: jpg | png
		                            </p>                            	                            									
									<?php 
								}
							}
							else {
								?>
								<label for="exampleInputFile">Imagen a subir:</label>
	                            <input type="file" name="file">
	                            <p class="help-block">
	                            	Medidas: 800x600 pixeles</br>
	                            	Extenciones válidas: jpg | png
	                            </p>                            	                            
								<?php 
							}							
                        	?>
                        	<?php echo ($errors->has('file')) ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".$errors->first('file')."</label>" : "";  ?>                        	
                        </div>                                                                                                                         
                        
                        <div class="box-footer">
                        	<button class="btn btn-primary" type="submit">Guardar</button>
                        	&nbsp;&nbsp;&nbsp;&nbsp;
                        	<a href="{{ URL::to('/'); }}/blog"><button type="button" class="btn btn-info">Regresar</button></a>
                        </div>  
                        
                        {{ Form::hidden('blogid', $blogid) }}                                                                     
                        {{ Form::hidden('type', $type) }}                        
	            	{{ Form::close() }}	            		            		            	                                        	   	                            
	            </div>
	            <!-- End Contenido -->    		
	    	</div>
		</div>
	</section>		               
@stop