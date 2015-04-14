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
		
		if (isset($llegadasUsuario)) {
			$data = "[";
			foreach ($llegadasUsuario AS $row) {
				$data .= "{day: '".strtok($row->hrLlegada, " ")."', minutos: ".$row->minutosTarde."},";
			}
			$data .= "]";
		}
		?>
		<script src="<?php echo base_url()?>/resources/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>/resources/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		
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

		        oTable = $('#llegadasTable').dataTable();

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
			        	alert("Opción aun no disponible");
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
				    }
			    });		        
			});    			
		</script>
		
		<div class="chart" id="personal" style="height: 300px;"></div>		
		
		<div class="box-body table-responsive">
        	<table id="llegadasTable" class="table table-bordered table-striped">
            	<thead>
                	<tr>			                        					                            
                    	<th>Llegada</th>
                        <th>Min Tarde</th>                        
                        <th>Multa</th>
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
                        	?>
                        	<tr>			                        							                        				
                        		<td><?php echo $this->general_library->dateFormat($row->hrLlegada)." - ".$time?></td>
                        		<td><?php echo $row->minutosTarde?></td>                        		
                        		<td><?php echo "$".$row->multa?></td>
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
		<?php 
	}
	
	function exportar($type="todos") {
		if ($type == "todos") {
			$llegadas = $this->usuarios_model->getLlegadasAll();
			$data["llegadas"] = $llegadas;
			$data["type"] = $type;
			$data["filename"] = "EntradasEvosTodos_".date("Y-m-d");
		}		
		else {			
			$idUsuario = $type;
			$usuario = $this->usuarios_model->checkUser($idUsuario);
			$llegadas = $this->usuarios_model->getLlegadasUsuario($idUsuario);
			
			$data["llegadas"] = $llegadas;
			$data["type"] = $idUsuario;
			$data["filename"] = "Entradas".strtok($usuario->nombre, " ")."_".date("Y-m-d");
		}
		
		$this->load->view("reportes_export_view", $data);
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