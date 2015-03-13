<?php 
if ($etapa == ""){
	class variables {
		var $id = "";
		var $fechaInicio = "";
		var $fechaFin = "";
		var $nombre = "";
		var $premio = "";
	}
	
	$etapa = new variables();
	$type = "insert";
	$title = "Nueva etapa";
}
else {
	$type = "update";
	$title = "Editando etapa ".$etapa->nombre;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>
        
        <!-- InputMask -->
        <script src="<?php echo base_url()?>/resources/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>	    
                
		<script>
		$(document).ready(function() {
			$(".data-mask").inputmask();	
		});
		</script>
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        
        <?php echo $header;?>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            
            <?php echo $sidebar?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Administrar etapas
                        <small><?php echo $title?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url("etapas")?>">Etapas</a></li>
                        <li class="active"><?php echo $title?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                	<!-- Alerts -->
					<?php echo (isset($alert)) ? $alert : '';?>
                
					<!-- Capa principal -->
				    <div class="col-xs-12">    	
				    	<div class="box box-primary">
				    		<div class="box-header">
				            	<i class="fa fa-users"></i>
				                <h3 class="box-title"><?php echo $etapa->nombre?></h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	
				            
				            <!-- Contenido -->
	            			<div class="box-body table-responsive">
	            				<?php echo form_open("etapas/guardarEtapa", array("name"=>"etapasForm", "id"=>"etapasForm", "method"=>"post"), array("idEtapa"=>$etapa->id, 'type'=>$type))?>	            					            				
	            					
			                    	<div class="form-group">
			                        	<label>Fecha inicio:</label>
			                            <div class="input-group">
			                            	<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			                            	<?php echo form_input(array('name' => 'fechaInicio', 'id' => 'fechaInicio', 'class'=>'form-control data-mask', 'data-inputmask'=>"'alias':'yyyy/mm/dd'", 'value' =>set_value('fechaInicio', $etapa->fechaInicio)));?>                                			                                
			                            </div>
			                            <?php echo (form_error('fechaInicio') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('fechaInicio')."</label>" : ""; ?>
			                        </div>
			                        				
			                        <div class="form-group">
			                        	<label>Fecha fin:</label>
			                            <div class="input-group">
			                            	<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			                            	<?php echo form_input(array('name' => 'fechaFin', 'id' => 'fechaFin', 'class'=>'form-control data-mask', 'data-inputmask'=>"'alias':'yyyy/mm/dd'", 'value' =>set_value('fechaFin', $etapa->fechaFin)));?>                                			                                
			                            </div>
			                            <?php echo (form_error('fechaFin') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('fechaFin')."</label>" : ""; ?>
			                        </div>
			                        	
			                        <div class="form-group">
				                       	<label for="exampleInputFile">Nombre:</label>
				                       	<?php echo form_input(array('name' => 'nombre', 'type'=>'nombre', 'id' => 'cpassword', 'class'=>'form-control', 'placeholder'=>'Nombre de etapa', 'value' =>set_value('nombre', $etapa->nombre)));?>
			                        	<?php echo (form_error('nombre') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('nombre')."</label>" : ""; ?>	                        			
			                        </div> 
			                        
			                        <div class="form-group">
				                       	<label for="exampleInputFile">Premio:</label>
				                       	<?php echo form_input(array('name' => 'premio', 'type'=>'premio', 'id' => 'premio', 'class'=>'form-control', 'placeholder'=>'Nombre de premio', 'value' =>set_value('premio', $etapa->premio)));?>
			                        	<?php echo (form_error('premio') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('premio')."</label>" : ""; ?>	                        			
			                        </div>                        				                   		
                        			
                        			<br>
                        			<div class="form-group">
                        				<button class="btn btn-primary" type="submit">Guardar</button>
                        			</div>
                        			
	            				<?php echo form_close()?>
	            			</div>
	            			<!-- End contenido -->            	   
						</div>					            	            	            				            				        
					</div>
					
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->              

    </body>
</html>
<?php /*evo.PROMOTORES.2015*/ ?>