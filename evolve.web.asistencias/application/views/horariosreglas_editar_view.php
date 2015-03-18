<?php 
if ($horariosregla == ""){
	class variables {
		var $id = "";		
		var $idHorario = "-1";
		var $horaInicio = "";
		var $horaFin = "";
		var $nombreHorario = "";
		var $multa = "";
	}
	
	$horariosregla = new variables();
	$type = "insert";
	$title = "Nuevo regla de horario";
}
else {
	$type = "update";
	$title = "Editando la regla de horario ".$horariosregla->nombreHorario;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>
        
        <link href="<?php echo base_url()?>/resources/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <script src="<?php echo base_url()?>/resources/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
                
		<script>
		$(document).ready(function() {
			$(".timepicker").timepicker({
				showInputs: false
            });
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
                        Administrar Reglas de horario
                        <small><?php echo $title?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url("horariosreglas")?>">Reglas de horarios</a></li>
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
				            	<i class="fa fa-edit"></i>
				                <h3 class="box-title"><?php echo $horariosregla->nombreHorario?></h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	
				            
				            <!-- Contenido -->
	            			<div class="box-body table-responsive">
	            				<?php echo form_open("horariosreglas/guardaHorariosregla", array("name"=>"reglasForm", "id"=>"reglasForm", "method"=>"post"), array("idHorarioregla"=>$horariosregla->id, 'type'=>$type))?>	            					            					            								                    	
			                        	
			                        <div class="form-group">
			                        	<label for="exampleInputFile">Horario:</label>
			                        	<?php echo form_dropdown("idHorario", $horariosCombo, $horariosregla->idHorario)?>
			                        	<?php echo (form_error('idHorario') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('idHorario')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div>
			                        	
			                        <div class="bootstrap-timepicker">	
			                        <div class="form-group">
				                       	<label for="exampleInputFile">Hora de inicio:</label>
				                       	<div class="input-group">                                   
				                       		<?php echo form_input(array('name' => 'horaInicio', 'id' => 'horaInicio', 'class'=>'form-control timepicker', 'value' =>set_value('horaInicio', $horariosregla->horaInicio)));?>                                                         
                                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                        </div>				                       	
			                        	<?php echo (form_error('horaInicio') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('horaInicio')."</label>" : ""; ?>	                        			
			                        </div>
			                        </div>
			                        
			                        <div class="bootstrap-timepicker">
			                        <div class="form-group">
				                       	<label for="exampleInputFile">Hora de fin:</label>
				                       	<div class="input-group">                                   
				                       		<?php echo form_input(array('name' => 'horaFin', 'id' => 'horaFin', 'class'=>'form-control timepicker', 'value' =>set_value('horaFin', $horariosregla->horaFin)));?>                                                         
                                            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                        </div>				                       	
			                        	<?php echo (form_error('horaFin') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('horaFin')."</label>" : ""; ?>	                        			
			                        </div>
			                        </div>
			                        
			                        <div class="form-group">
				                       	<label for="exampleInputFile">Multa:</label>
				                       	<?php echo form_input(array('name' => 'multa', 'id' => 'multa', 'class'=>'form-control', 'placeholder'=>'Multa', 'value' =>set_value('multa', $horariosregla->multa)));?>
			                        	<?php echo (form_error('multa') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('multa')."</label>" : ""; ?>	                        						                 			                  
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