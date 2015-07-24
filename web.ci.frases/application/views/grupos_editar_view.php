<?php 
if ($grupo == ""){
	class variables {
		var $id = "";
		var $idEtapa = "";		
		var $nombre = "";		
	}
	
	$grupo = new variables();
	$type = "insert";
	$title = "Nuevo grupo";
}
else {
	$type = "update";
	$title = "Editando grupo ".$grupo->nombre;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Evolve Asistencias</title>
        
        <?php echo $includes?>                	  
                
		<script>
		$(document).ready(function() {
				
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
                        Administrar grupos
                        <small><?php echo $title?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url("inicio")?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="<?php echo base_url("grupos")?>">Grupos</a></li>
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
				                <h3 class="box-title"><?php echo $grupo->nombre?></h3>
				                <div class="box-tools pull-right">
				                	<button data-widget="collapse" class="btn btn-default btn-sm"><i class="fa fa-minus"></i></button>                 
				                </div>
				            </div>	            	            	            	      	
				            
				            <!-- Contenido -->
	            			<div class="box-body table-responsive">
	            				<?php echo form_open("grupos/guardarGrupo", array("name"=>"grupoForm", "id"=>"grupoForm", "method"=>"post"), array("idGrupo"=>$grupo->id, 'type'=>$type))?>	            					            					            								                    	
			                        	
			                        <div class="form-group">
			                        	<label for="exampleInputFile">Etapa:</label>
			                        	<?php echo form_dropdown("idEtapa", $etapas, $grupo->idEtapa)?>
			                        	<?php echo (form_error('idEtapa') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('idEtapa')."</label>" : ""; ?>                        				                        	   			                        	                                                
                        			</div> 
			                        
			                        <div class="form-group">
				                       	<label for="exampleInputFile">Nombre:</label>
				                       	<?php echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'class'=>'form-control', 'placeholder'=>'Nombre de etapa', 'value' =>set_value('nombre', $grupo->nombre)));?>
			                        	<?php echo (form_error('nombre') != "") ? "<label for='inputError' class='control-label' style='color: #F56954'><i class='fa fa-times-circle-o'></i> ".form_error('nombre')."</label>" : ""; ?>	                        			
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