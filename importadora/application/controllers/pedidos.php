<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pedidos extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('pedidos_model');
		$this->load->library('pagination');		
	}
	
	public function index()
	{
		$data=$this->general('');
		if ($this->uri->segment(3) == "message")
		{
			$data['message']="Se cancelo la orden actual";
		}
				
		$this->load->view('login_view', $data);
	}
	
	function login()
	{
		$user=$this->input->post('user');
		$pass=$this->input->post('pass');

		$res=$this->pedidos_model->login($user, md5($pass));
		if ($res)
		{	
			$_SESSION['login']=TRUE;
			$_SESSION['userid']=$res->userid;
			$_SESSION['companyid']=$res->company;
			$_SESSION['usertypeid']=$res->usertypeid;
			$_SESSION['catalogid']=$res->catalogid;
			$_SESSION['name']=$res->name;
			$_SESSION['email']=$res->email;
			$_SESSION['lastname']=$res->lastname;
			echo json_encode(array('status'=>'success'));
		}
		else
			echo json_encode(array('status'=>'Usuario o contraseña incorrectos'));
	}
	
	function catalogo()
	{		
		$data=$this->general('');				
		$temp=$_SESSION['catalogid'];
		
		$cid=$this->uri->segment(3);
		if ($cid == "") { $cid=$this->input->post('catalogid'); }
						
		if ($_SESSION['catalogid'] != 6 && $cid != "")
		{
			$temp=$cid;			
		}
		else
		{
			$temp=$_SESSION['catalogid'];
		}									
		
		//echo $temp;
		$catalog=$this->pedidos_model->getProductsByCatalogid($temp);
		
		$config['base_url'] = base_url()."pedidos/catalogo/$temp";
		$config['total_rows'] = count($catalog);		
		$config['per_page'] = '20'; 
		$config['uri_segment'] = 4;
		$config['first_link'] = 'Primera';		
		$config['last_link'] = '&Uacute;ltima';
		$config['next_link'] = 'Siguiente &raquo;';
		$config['prev_link'] = '&laquo; Anterior';
		$config['num_links'] = 4;
		$config['use_page_numbers'] = false;		

		$this->pagination->initialize($config);
		
		$data['catalog']=$this->pedidos_model->getProductsByCatalogidPagination($temp, $config['per_page'], (int)$this->uri->segment(4));
		$orderid=$this->pedidos_model->checkOrderUser($_SESSION['userid']);
		$data['orderid']=$orderid;
		$_SESSION['orderid']=$orderid;
		$data['orderproduct']=$this->pedidos_model->getProductsByOrderid($orderid);
		$data['catalogid']=$temp;
		
		$this->load->view('catalogo_view', $data);
	}
	
	function saveProductInOrder()
	{
		$productid=$this->input->post('productid');
		$orderid=$this->input->post('orderid');
		$amount=$this->input->post('amount');
		
		$res=$this->pedidos_model->saveProductOrder($productid, $orderid, $amount);	
		$orderproduct=$this->pedidos_model->getProductsByOrderid($orderid);

		?>
		
		<strong>Pedido No <?php echo $orderid?></strong>
		<div>Cliente: <strong><?php echo $_SESSION['name']." ".$_SESSION['lastname']?></strong></div><br>
		<div id="products">
			Productos:<br>
			<table id="list-product" width="300">
				<tr>
					<td><strong>Id</strong></td>
					<td width="130"><strong>Nombre</strong></td>
					<td><strong>Cantidad</strong></td>
					<td><strong>Precio/U</strong></td>
					<td><strong>Borrar</strong></td>
				</tr>
				<?php 
				$total=0;
				if (isset($orderproduct))
				{
					foreach ($orderproduct as $row)
					{
						$total=$total+($row->price*$row->amount);
						?>
						<tr>
							<td><?php echo $row->productid;?></td>
							<td><?php echo $row->description;?></td>				
							<td align="center"><input type="text" name="amountp<?php echo $row->productid."_".$row->orderid?>" id="amountp<?php echo $row->productid."_".$row->orderid?>" onkeyup="updateamountp(<?php echo $row->productid;?>, <?php echo $row->orderid;?>);" size="3" value="<?php echo $row->amount;?>"></td>
							<td>$<?php echo $row->price;?></td>
							<td align="center" width="20"><a href="#" onclick="delProductOrder(<?php echo $row->orderid?>, <?php echo $row->productid;?>, '<?php echo $row->description;?>')"; style="color: red;"><strong>X</strong></a></td>
						</tr>
						<?php 
					}
				}
				else 
				{
					?><tr><td colspan="4" align="center">No se han agregado productos</td></tr><?php 
				}
				?>											
			</table>
		</div>	
		<div id="total">Total del pedido <span>$<?php echo $total;?></span></div>
		<div id="send-order"><input type="submit" value="Enviar pedido" onclick="document.orderform.submit();"></div>		
		<?php 
	}
	
	function delProductOrder()
	{
		$productid=$this->input->post('productid');
		$orderid=$this->input->post('orderid');
		
		$res=$this->pedidos_model->delProductOrder($productid, $orderid);
		$orderproduct=$this->pedidos_model->getProductsByOrderid($orderid);

		?>
		
		<strong>Pedido No <?php echo $orderid?></strong>
		<div>Cliente: <strong><?php echo $_SESSION['name']." ".$_SESSION['lastname']?></strong></div><br>
		<div id="products">
			Productos:<br>
			<table id="list-product" width="300">
				<tr>
					<td><strong>Id</strong></td>
					<td width="130"><strong>Nombre</strong></td>
					<td><strong>Cantidad</strong></td>
					<td><strong>Precio/U</strong></td>
					<td><strong>Borrar</strong></td>
				</tr>
				<?php 
				$total=0;
				if (isset($orderproduct))
				{
					foreach ($orderproduct as $row)
					{
						$total=$total+($row->price*$row->amount);
						?>
						<tr>
							<td><?php echo $row->productid;?></td>
							<td><?php echo $row->description;?></td>				
							<td align="center"><input type="text" name="amountp<?php echo $row->productid."_".$row->orderid?>" id="amountp<?php echo $row->productid."_".$row->orderid?>" onkeyup="updateamountp(<?php echo $row->productid;?>, <?php echo $row->orderid;?>);" size="3" value="<?php echo $row->amount;?>"></td>
							<td>$<?php echo $row->price;?></td>
							<td align="center" width="20"><a href="#" onclick="delProductOrder(<?php echo $row->orderid?>, <?php echo $row->productid;?>, '<?php echo $row->description;?>')"; style="color: red;"><strong>X</strong></a></td>
						</tr>
						<?php 
					}
				}
				else 
				{
					?><tr><td colspan="4" align="center">No se han agregado productos</td></tr><?php 
				}
				?>											
			</table>
		</div>	
		<div id="total">Total del pedido <span>$<?php echo $total;?></span></div>
		<div id="send-order"><input type="submit" value="Enviar pedido" onclick="document.orderform.submit();"></div>		
		<?php
	}
		
	function enviarpedido()
	{		
		$userid=$this->input->post('userid');
		$orderid=$this->input->post('orderid');

		$data['orderproduct']=$this->pedidos_model->getProductsByOrderid($orderid);		
		$data['orderid']=$orderid;
		$data['user']=$this->pedidos_model->getUserByUserid($userid);		
		$data['order']=$this->pedidos_model->getOrderByOrderid($orderid);				
		//$this->load->view('listorder_view', $data);
		
		/*send mail*/				
		$message='Se ha registradio un nuevo pedido.<br><br>Por favor visite el siguiente link para darle seguimiento <a href="'.base_url().'pedidos/validarpedido/'.$orderid.'/'.$userid.'">Pedido</a><br><br><a href="'.base_url().'pdf/'.$orderid.'_order.pdf"><br><br>Liga para descargar el PDF</>';		
		$this->sendmail('direccion@importadorarym.com.mx, aldo.maranon@gbmobile.com, julio.mora@mx.ey.com, octavio.lopez.davila@gmail.com', $message, 'Nuevo pedido');
		//$this->sendmail('aldo.maranon@gbmobile.com', $message, 'Nuevo pedido');
		/*--------*/
		
		$this->pedidos_model->updateStatusOrder($orderid, '2'); //1: iniciado   2:validad   3: Finalizado
		
		$html = $this->load->view('listorder_view', $data, TRUE);			
		$this->pdf_create($html, $orderid);				
								
		$this->mensaje("Tu pedido ha sido enviado, Espera nuestra respuesta");
		?>
		<script>
		location="<?php echo base_url()?>pedidos";
		</script>
		<?php 
	}	

	function cancelOrder()
	{
		$orderid=$this->input->post('orderid');
		$userid=$this->input->post('userid');
		
		$res = $this->pedidos_model->deleteOrderByOrderid($orderid, $userid);
		echo json_encode(array('status'=>'success'));		
	}				
	
	function pdf_create($html, $orderid, $stream=FALSE)
	{		
		require_once("system/helpers/dompdf/dompdf_config.inc.php");
	
		$dompdf = new DOMPDF();		
		$dompdf->load_html($html);
		$dompdf->render();		
		if ($stream) 
		{			
			$dompdf->stream($orderid."_order.pdf");
		} 
		else 
		{			
			$this->load->helper('file');
			write_file("./pdf/".$orderid."_order.pdf", $dompdf->output());
		}
	}

	function mensaje($message)
	{
		$data=$this->general('');
		$data['message']=$message;	
		$data['pedidos']=$this->pedidos_model->getLastPedidos();	
		$this->load->view('login_view', $data);
	}
	
	function validarpedido()
	{
		$orderid=$this->uri->segment(3);
		$userid=$this->uri->segment(4);
		
		$checkorder=$this->pedidos_model->getOrderByOrderid($orderid);
		$checkuser=$this->pedidos_model->getUserByUserid($userid);
		
		if ($checkuser->userid != "" && $checkorder->orderid != "")
		{
			$data=$this->general('');
			$data['orderproduct']=$this->pedidos_model->getProductsByOrderid($orderid);
			$data['orderid']=$orderid;
			$data['userid']=$userid;
			$data['user']=$this->pedidos_model->getUserByUserid($userid);
			$this->load->view('validaventa_view', $data);
		}
		else
		{
			$this->index();
		}
	}
	
	function delProductOrderSell()
	{
		$productid=$this->input->post('productid');
		$orderid=$this->input->post('orderid');
		
		$res=$this->pedidos_model->delProductOrder($productid, $orderid);
		$orderproduct=$this->pedidos_model->getProductsByOrderid($orderid);

		?>
		<table id="list-product" width="800">
			<tr>
				<td width="50"><strong>Id</strong></td>
				<td><strong>Nombre</strong></td>
				<td><strong>Cantidad</strong></td>
				<td><strong>Precio/U</strong></td>
				<td><strong>Borrar</strong></td>
			</tr>
			<?php 
			$total=0;
			if (isset($orderproduct))
			{
				foreach ($orderproduct as $row)
				{
					$total=$total+($row->price*$row->amount);
					?>
					<tr>
						<td><?php echo $row->productid;?></td>
						<td><?php echo $row->description;?></td>				
						<td align="center"><input type="text" name="amountp<?php echo $row->productid."_".$row->orderid?>" id="amountp<?php echo $row->productid."_".$row->orderid?>" onkeyup="updateamountp(<?php echo $row->productid;?>, <?php echo $row->orderid;?>);" size="3" value="<?php echo $row->amount;?>"></td>
						<td>$<?php echo $row->price;?></td>
						<td align="center" width="20"><a href="#" onclick="delProductOrder(<?php echo $row->orderid?>, <?php echo $row->productid;?>, '<?php echo $row->description;?>')"; style="color: red;"><strong>X</strong></a></td>
					</tr>
					<?php 
				}
			}
			else 
			{
				?><tr><td colspan="4" align="center">No se han agregado productos</td></tr><?php 
			}
			?>		
			<tr><td>&nbsp;</td></tr>
			<tr><td colspan="3" align="right">Total:</td><td>$<?php echo $total;?></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td align="center" colspan="5">
				<input type="submit" value="Validar"><br><br>
				<input type="button" value="Cancelar pedido" onclick="cancelOrder(<?php echo $orderid;?>, <?php echo $_SESSION['userid']?>)">				
			</td></tr>									
		</table>
		<?php 
	}
	
	function sendmail($mail, $message, $subjet)
	{			
		$this->load->library('email');
		
		$config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.importadorarym.com.mx';
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'admin@importadorarym.com.mx';
        $config['smtp_pass']    = 'admin12';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or
        
        $this->email->initialize($config);		
			
		$this->email->from('admin@importadorarym.com.mx', 'Información de venta');
		$this->email->to($mail);		
					
		$this->email->subject($subjet);
		$this->email->message($message);				
														
		$res=$this->email->send();
		
		return $res; 
	}
	
	function finalizaventa()
	{
		$productid=$this->input->post('productid');
		$orderid=$this->input->post('orderid');				
		
		/*send mail*/		
		$message='Se ha realizado un nuevo pedido.<br><br><a href="'.base_url().'pdf/'.$orderid.'_order.pdf"><br><br>Liga para descargar el PDF del pedido</>';		
		$this->sendmail('sperdomo@importadorarym.com.mx, aldo.maranon@gbmobile.com, julio.mora@mx.ey.com, octavio.lopez.davila@gmail.com', $message, 'Nuevo pedido');
		//$this->sendmail('aldo.maranon@gbmobile.com', $message, 'Nuevo pedido');
		/*--------*/
		
		$this->pedidos_model->updateStatusOrder($orderid, '3'); //1: iniciado   2:validad   3: Finalizado
		$this->mensaje("El pedido se ha finalizado correctamente");
	}
	
	function updateamountproduct()
	{
		$orderid=$this->input->post('orderid');
		$productid=$this->input->post('productid');
		$amount=$this->input->post('amount');

		$res=$this->pedidos_model->updateamountproduct($orderid, $productid, $amount);
		
		echo json_encode(array('status'=>'success'));
	}
	
	function showmeorders()
	{
		$user=$this->input->post('user');
		$pass=$this->input->post('pass');

		$res=$this->pedidos_model->login($user, md5($pass));
		if ($res)
		{
			$pedidos=$this->pedidos_model->getLastPedidos($res->userid);
			?>
			<table width="700" style="position: absolute; top: 250px; left: 90px;">
				<tr>
					<td align="center">ID</td>						
					<td align="center">Nombre</td>
					<td align="center">Fecha pedido</td>
					<td align="center">Status</td>
				</tr>
				<?php 
				if (isset($pedidos))
				{
					foreach ($pedidos as $row)
					{
						?>
						<tr>
							<td><?php echo $row->orderid?></td>
							<td><?php echo $row->name?></td>
							<td><?php echo $row->date?></td>
							<td><?php echo $row->status?></td>
						</tr>
						<?php 
					}
				}
				?>
			</table>
			<?php 
		}
		else
		{
			echo "Los datos para mostrar sus pedidos no son correctos";
		}
	}
	
	function general($info)
	{
		$data['includes']=$this->load->view('general_includes_view', '', TRUE);
		$data['menu']=$this->load->view('general_menu_view', '', TRUE);
		
		return $data;
	}
	
	function updateamountp()
	{
		$productid=$this->input->post('productid');
		$orderid=$this->input->post('orderid');
		$amount=$this->input->post('amount');
		
		$this->pedidos_model->updateAmountOrder($productid, $orderid, $amount);
	}
}
?>