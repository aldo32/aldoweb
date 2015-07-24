<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reportes extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();	

		$this->load->model("grupos_model");
		$this->load->model("etapas_model");
		$this->load->model("usuarios_model");
		$this->load->library("general_library");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {						
		$usuario = $this->sessionData["user_data"];
		$data = $this->general($usuario);	
		$data["usuario"] = $usuario;																		
				
		$llegadas = $this->usuarios_model->getLlegadasAll();
		$data["llegadas"] = $llegadas;						
		
		$this->load->view('reportes_view', $data);
	}
	
	function unico() {
		$usuario = $this->sessionData["user_data"];
		$data = $this->general($usuario);
		
		$data["usuarios"] = $this->usuarios_model->getAllActiveUsersCombo();
		
		$this->load->view("reportes_unico_view", $data);
	}
	
	function showUserAssistance() {
		$idUsuario = $this->input->post("idUsuario");
		
		$llegadasUsuario = $this->usuarios_model->getLlegadasUsuario($idUsuario);
		
		$comboPermiso = $this->usuarios_model->getComboPermisosUser();
						
		$data="''";
		if (isset($llegadasUsuario)) {
			$data = "[";
			foreach ($llegadasUsuario AS $row) {
				$data .= "{day: '".strtok($row->hrLlegada, " ")."', minutos: ".$row->minutosTarde."},";
			}
			$data .= "]";
		}
				
		?>
		<script src="<?php echo base_url()?>resources/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>resources/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
						
		<script type="text/javascript">
			$(function() {                       		           
		     	// AREA CHART
		        var personal = new Morris.Area({
		            element: 'personal',
		            resize: true,
		            parseTime: false,
		            data: <?php echo $data;?>,
		            xkey: 'day',
		            ykeys: ['minutos'],
		            labels: ['Min Tarde'],	            	           
		            lineColors: ['#3c8dbc'],
		            hideHover: 'auto',
		            yLabelFormat : function (y) { return y.toString() + ' Min'; },	            
		        });	     					
		     	
		        oTable = $('#llegadasTable').dataTable({
		        	"fnDrawCallback": function( oSettings ) {
		        		$(".idPermisoUsuario").change(function() {
					        var idPermiso = $(this).val();
					        var fecha = $(this).attr("param1");
					        var comentario = "";
					        var idUsuario = <?php echo $idUsuario?>;

					        if (idPermiso != 0) {
					        	$.ajax({													
							        url: "<?php echo base_url()?>usuarios/guardarPermiso",        
							        data: "idPermiso="+idPermiso+"&fecha="+fecha+"&comentario="+comentario+"&idUsuario="+idUsuario+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",		             
							        dataType: "html",		                	                	      
							        success: function(datos) {  	        	
							        	$('#showUser').html("Cargando...");				
										$.ajax({													
									        url: "<?php echo base_url()?>reportes/showUserAssistance",        
									        data: "idUsuario="+idUsuario+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",		             
									        dataType: "html",		                	                	      
									        success: function(datos) {  	        	
									        	$('#showUser').fadeOut('fast', function() { $('#showUser').html(datos).fadeIn('fast'); });	        	
									        },
									        type: "POST"
										});        	
							        },
							        type: "POST"
								});
						    }
					        else {			        				        				        						
					        	$.ajax({													
							        url: "<?php echo base_url()?>reportes/getPermisoUsuarioId",        
							        data: "idUsuario="+idUsuario+"&fecha="+fecha+"&idPermiso="+idPermiso+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",		             
							        dataType: "json",		                	                	      
							        success: function(datos) {  	  						              	
							        	$.ajax({													
									        url: "<?php echo base_url()?>usuarios/eliminarPermiso/"+datos.idPermisoUsuario+"/"+idUsuario,        
									        data: "<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",		             
									        dataType: "html",		                	                	      
									        success: function(datos) {  	  						              	
									        	$('#showUser').html("Cargando...");				
												$.ajax({													
											        url: "<?php echo base_url()?>reportes/showUserAssistance",        
											        data: "idUsuario="+idUsuario+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",		             
											        dataType: "html",		                	                	      
											        success: function(datos) {  	        	
											        	$('#showUser').fadeOut('fast', function() { $('#showUser').html(datos).fadeIn('fast'); });	        	
											        },
											        type: "POST"
												}); 
									        },
									        type: "GET"
										});      	
							        },
							        type: "POST"
								});								        												  
						    }
					    });	
		        	}
		        });		        	        
			});    			
		</script>
				
		<div class="box-body table-responsive">
        	<table id="llegadasTable" class="table table-bordered table-striped">
            	<thead>
                	<tr>			    
                		<th>Fecha</th>                    					                            
                    	<th>Llegada</th>
                        <th>Min Tarde</th>                        
                        <th>Multa</th>
                        <th>Tipo</th>
                        <th>Permisos</th>                                			                                			                                                                                               			                                
                    </tr>
                </thead>
                <tbody>
                	<?php 			                        	
                    if (isset($llegadasUsuario)) {
                    	foreach ($llegadasUsuario AS $row) {
                    		$query = $this->db->get_where("permisosusuarios", array("id"=>$row->permiso));
                    		$permiso = $query->row();
                    		
                    		$permiso = (empty($permiso)) ? 0 : $permiso->idPermiso;                    		
                    		
                        	$time = strtok($row->hrLlegada, " ");
                        	$time = strtok("");
                        	
                        	$retardo="";                        	
                        	if ($row->retardo == "1") { $retardo = "Retardo"; }
                        	if ($row->retardo == "2") { $retardo = "Falta"; }
                        	if ($row->retardo == "") { $retardo = "-"; }
                        	?>
                        	<tr>		
                        		<td><?php echo strtok($row->hrLlegada, " ")?></td>	                        							                        				
                        		<td><?php echo $this->general_library->dateFormat($row->hrLlegada)." - ".$time?></td>
                        		<td><?php echo $row->minutosTarde?></td>                        		
                        		<td><?php echo "$".$row->multa?></td>
                        		<td><?php echo $retardo ?></td>
                        		<td><?php echo form_dropdown("idPermiso", $comboPermiso, $permiso, "class='idPermisoUsuario', param1='".strtok($row->hrLlegada,	" ")."'")?></td>			                        							                        				
                        	</tr>
                        	<?php 
                        }
                    }
                    ?>			                        	                    	                        	                          
                </tbody>
            </table>
            
            <a href="<?php echo base_url("reportes/exportar/".$idUsuario)?>" id=""><button class="btn btn-sm btn-success">Exportar a Excel</button></a>
        </div>
		
		<div class="chart" id="personal" style="height: 300px;"></div>						
		<?php 
	}
	
	function exportar($type="todos") {
		if ($type == "todos") {
			$llegadas = $this->usuarios_model->getLlegadasAll();
			$data["llegadas"] = $llegadas;
			$data["type"] = $type;
			$data["filename"] = "EntradasEvosTodos_".date("Y-m-d");
		}		
		else if ($type != "agrupado"){			
			$idUsuario = $type;
			$usuario = $this->usuarios_model->checkUser($idUsuario);
			$llegadas = $this->usuarios_model->getLlegadasUsuario($idUsuario);
			
			$data["llegadas"] = $llegadas;
			$data["type"] = $idUsuario;
			$data["filename"] = "Entradas".strtok($usuario->nombre, " ")."_".date("Y-m-d");
		}
		else {
			$initDate = str_replace("_", "-", $this->uri->segment(4));
			$endDate = str_replace("_", "-", $this->uri->segment(5));
			
			$llegadas = $this->usuarios_model->getLlegadasByDateRange($initDate, $endDate);
			$data["llegadas"] = $llegadas;
			$data["type"] = $type;
			$data["filename"] = "EntradasAgrupadosFechas_".date("Y-m-d");
			$data["initDate"] = $initDate;
			$data["endDate"] = $endDate;
		}
		
		$this->load->view("reportes_export_view", $data);
	}
	
	function getPermisoUsuarioId() {
		$idPermiso = $this->input->post("idPermiso");
		$fecha = $this->input->post("fecha");
		$idUsuario = $this->input->post("idUsuario");
		
		$query = $this->db->get_where("permisosusuarios", array("fecha"=>$fecha, "idUsuario"=>$idUsuario));
		$res = $query->row();		

		echo json_encode(array("idPermisoUsuario"=>$res->id));
	}
	
	function agrupado() {
		$usuario = $this->sessionData["user_data"];
		$data = $this->general($usuario);
		
		$this->load->view("reportes_agrupado_view", $data);		
	}
	
	function showReporGrouDates() {
		$initDate = $this->input->post("initDate");
		$endDate = $this->input->post("endDate");
		
		$registros = $this->usuarios_model->getLlegadasByDateRange($initDate, $endDate);		
		
		?>
		<link rel="stylesheet" href="<?php echo base_url()?>/resources/nyroModal/styles/nyroModal.css">
		
		<script src="<?php echo base_url()?>/resources/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/nyroModal/js/jquery.nyroModal.js" type="text/javascript"></script>
        
        <script>
        $(document).ready(function() {
			//oTable = $('#usuariosTable').dataTable();		
			$(".nyroModal").nyroModal();	
		});
        </script>
		
		<div class="box-body table-responsive">
        	<table id="usuariosTable" class="table table-bordered table-striped">
            	<thead>
                	<tr>			                        					                            
                    	<th>ID</th>
                        <th>Nombre</th>                        
                        <th>Minutos Tarde</th>
                        <th>Multa</th>
                        <th>Retardos</th>
                        <th>Faltas</th>                                			                                			                                                                                               			                                
                    </tr>
                </thead>
                <tbody>
                	<?php 			                        	
                    if (isset($registros)) {
                    	foreach ($registros AS $row) {                    		
                        	?>
                        	<tr>			                        							                        				
                        		<td><?php echo $row->idUsuario?></td>
                        		<td><?php echo $row->nombre?></td>
                        		<td><?php echo $row->minutosTarde?></td>                        		
                        		<td><?php echo "$".$row->multa?></td>   
                        		<td>
                        			<?php 
                        			if ($row->retardos != 0) {
                        				?>
                        				<a href="<?php echo base_url("reportes/detailUserDelay/1/".$row->idUsuario."/".str_replace("-", "_", $initDate)."/".str_replace("-", "_", $endDate))?>" class="nyroModal" style="text-decoration: underline;"><?php echo $row->retardos?></a></td>
                        				<?php 
                        			} else {
                        				echo $row->retardos;
                        			}
                        			?>
                        		
                        		<td>
                        			<?php 
                        			if ($row->faltas != 0) {
                        				?>
                        				<a href="<?php echo base_url("reportes/detailUserDelay/2/".$row->idUsuario."/".str_replace("-", "_", $initDate)."/".str_replace("-", "_", $endDate))?>" class="nyroModal" style="text-decoration: underline;"><?php echo $row->faltas?></a></td>
                        				<?php 
                        			} else {
                        				echo $row->faltas;
                        			}
                        			?>
                        		</td>                     					                        							                        			
                        	</tr>
                        	<?php 
                        }
                    }
                    ?>			                        	                    	                        	                          
                </tbody>
            </table>
            <br>
            <a href="<?php echo base_url("reportes/exportar/agrupado/".str_replace("/", "_", $initDate)."/".str_replace("/", "_", $endDate))?>" target="_blank" id=""><button class="btn btn-sm btn-success">Exportar a Excel</button></a>                        
        </div>
		<?php 
	}
	
	function detailUserDelay($type, $idUsuario, $initDate, $endDate) {
		$initDate = str_replace("_", "-", $initDate);
		$endDate = str_replace("_", "-", $endDate);
		
		$usuario = $this->usuarios_model->checkUser($idUsuario);
		
		$delays = $this->usuarios_model->getDalaysUser($type, $idUsuario, $initDate, $endDate);
		
		$title="";
		if ($type == "1") {
			$title = "Detalle de retardos para ".$usuario->nombre;
		}
		else {
			$title = "Detalle de faltas para ".$usuario->nombre;
		}
		?>
		<style>
			#delay-wrap { width: 600px; height: 400px; overflow: auto; margin: 0 auto; background: white; }
				#delay-title { width: 100%; height: 35px; line-height: 35px; font-weight: bold; color: #fff; background: #3c8dbc; margin-top: 15px; text-align: center; font-size: 16px; }
				#delay-content { margin: 25px; }
		</style>
		
		<div id="delay-wrap">
			<div id="delay-title"><?php echo $title?></div>
			<div id="delay-content">
				<table id="usuariosTable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Hora de entrada</th>													
						</tr>
					</thead>
					
					<tbody>
						<?php 
						if (isset($delays)) {
							foreach ($delays AS $row) {
								?>
								<tr>
									<td><?php echo strtok($row->fecha, " ")?></td>
									<td><?php echo strtok("")?></td>									
								</tr>
								<?php 
							}
						}
						?>						
					</tbody>					
				</table>
			</div>			
		</div>
		<?php 
	}
	
	function general($session) {
		$info["session"] =  $session;
			
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);
	
		$data["etapas"] = $this->grupos_model->getComboEtapas();
	
		return $data;
	}
}