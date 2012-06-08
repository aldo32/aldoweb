<?php echo $includes;?>

<?php echo $menu;?>

<style>
	#page { position: relative; z-index: 100; width: 800px; height: 450px; top:240px; margin: 0 auto; font-family: Arial,Helvetica,Sans-Serif; font-size: 13px; color: #fff; float: left; clear: both; }		
		#catalog { list-style:none;}
			#catalog li { margin: 0px 45px 10px 0px; width: 140px; height: 200px; float: left; }
	.p-description {font-size: 10px; margin-bottom: 10px; }
	.p-price { margin-top: 10px; }
	.p-pedir { float: right; margin-right: 10px; margin-top: 10px; }
	#link-pages { width: 700px; text-align: center;}		
	#messages { width: 100%; text-align: left; font-size: 14px; color: green; margin-bottom: 10px; margin-left: 40px; font-weight: bold; }
	
	#order { position: absolute; z-index: 100; width: 320px; height: 400px; top:320px; left: 780px; font-family: Arial,Helvetica,Sans-Serif; font-size: 13px; color: #fff; border: 2px solid green; }
		#list-product { font-size: 12px; color: #fff; }
		#list-product td { font-size: 10px; color: #fff; }	
		#products { width: 320px; height: 320px; overflow: auto; }
		#send-order { float: right; margin-top: 10px; }
		#total { float: left; margin-top: 10px; }		
		#total span { font-size: 18px; }
		#cancelar-pedido { margin-left: 440px; margin-top: -15px; position: relative; }
	#clearb { clear: both; }
	
	#elaborate { position: absolute; z-index: 100; width: 320px; height: 33px; top:730px; left: 780px; font-family: Arial,Helvetica,Sans-Serif; font-size: 13px; color: #fff; border: 2px solid green; padding-top: 10px; }
</style>

<script>
$(document).ready(function(){			   								
	$("#amountp").keyup(function(){
		if ($(this).val() != '')
			$(this).val($(this).attr('value').replace(/[^0-9]/g, ""));	
	});	
});

function addProduct(productid, orderid, description, amount)
{								
	if (amount != "")
	{	
		$.ajax({										
	        url: "<?php echo base_url()?>pedidos/saveProductInOrder",        
	        data: 'productid='+productid+'&orderid='+orderid+"&amount="+amount,     			     
	        dataType: "html",           	                	       
	        success: function(datos){	
		        $('#order').html(datos);
		        $('#messages').hide().html('Se agrego el producto: <strong>'+description+'</strong> a su lista de pedidos.').fadeIn('slow').delay(4000).fadeOut('slow');																
	        },        
	        type: "POST"
		});

		$('#amount'+productid).val("");
	}		
	else
	{
		alert("Debe escribir una cantidad para poder continuar. Gracias");
	}																		
}

function delProductOrder(orderid, productid, description)
{
	$.ajax({										
        url: "<?php echo base_url()?>pedidos/delProductOrder",        
        data: 'productid='+productid+'&orderid='+orderid,     			     
        dataType: "html",           	                	       
        success: function(datos){	
	        $('#order').html(datos);
	        $('#messages').hide().html('Se elimino el producto: <strong>'+description+'</strong> de su lista de pedidos.').fadeIn('slow').delay(4000).fadeOut('slow');																
        },        
        type: "POST"
	});
}

function cancelOrder(orderid, userid)
{
	$.ajax({										
        url: "<?php echo base_url()?>pedidos/cancelOrder",        
        data: 'orderid='+orderid+'&userid='+userid,     			     
        dataType: "json",           	                	       
        success: function(datos){	
	        if (datos.status=='success')
	        {
		        location="<?php echo base_url()?>pedidos/index/message";
		    }	               																			
        },        
        type: "POST"
	});	

	$.ajax({										
        url: "<?php echo base_url()?>pedidos/cancelOrder",        
        data: 'orderid='+orderid+'&userid='+userid,     			     
        dataType: "json",           	                	       
        success: function(datos){	
	        if (datos.status=='success')
	        {
		        location="<?php echo base_url()?>pedidos/index/message";
		    }	               																			
        },        
        type: "POST"
	});
}

function updateamountp(productid, orderid)
{
	if ($('#amountp'+productid+'_'+orderid).val() != '')
		$('#amountp'+productid+'_'+orderid).val($('#amountp'+productid+'_'+orderid).attr('value').replace(/[^0-9]/g, ""));

	amount=$('#amountp'+productid+'_'+orderid).val();

	$.ajax({										
        url: "<?php echo base_url()?>pedidos/updateamountp",        
        data: 'productid='+productid+'&orderid='+orderid+'&amount='+amount,     			     
        dataType: "json",           	                	       
        success: function(datos){	
	        	               																			
        },        
        type: "POST"
	});
	
}
</script>

<div id="order">	
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
						<td align="center" width="20"><a href="#" onclick="delProductOrder(<?php echo $row->orderid?>, <?php echo $row->productid;?>, '<?php echo str_replace('"', '', $row->description);?>')"; style="color: red;"><strong>X</strong></a></td>
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
	<div id="send-order"><input type="submit" value="Enviar pedido" onclick="if(document.orderform.elaboratename.value == '') { alert('Debe escribir el nombre de quien elabora el pedido.'); } else { document.orderform.submit(); }"></div>
</div>
<form name="orderform" id="orderform" action="<?php echo base_url()?>pedidos/enviarpedido" method="post">
	<input type="hidden" name="orderid" value="<?php echo $orderid;?>">
	<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'];?>">
	<div id="elaborate">
		Elaboro:&nbsp;&nbsp;&nbsp;<input type="text" name="elaboratename" id="elaboratename" size="35" maxlength="60">
	</div>
</form>
<div id="cancelar-pedido"><input type="button" value="Cancelar pedido" onclick="cancelOrder(<?php echo $orderid;?>, <?php echo $_SESSION['userid']?>)"></div>
 
<div id="page">
	<?php 
	if ($catalogid != 6)
	{
		?>
		<div style="margin-left: 40px;"> Seleccione una familia:
			<form name="showcatalog" id="showcatalog" method="post" action="<?php echo base_url()?>pedidos/catalogo">
				<select name="catalogid" onchange="document.showcatalog.submit();">
					<option value="1" <?php if ($catalogid==1) { echo "SELECTED"; }?>>TODO</option>
					<option value="2" <?php if ($catalogid==2) { echo "SELECTED"; }?>>MANCERA PISOS</option>
					<option value="3" <?php if ($catalogid==3) { echo "SELECTED"; }?>>MANCERA COCINA</option>
					<option value="4" <?php if ($catalogid==4) { echo "SELECTED"; }?>>MANCERA MANTENIMIENTO</option>
					<option value="5" <?php if ($catalogid==5) { echo "SELECTED"; }?>>MANCERA MEDICAMENTOS</option>
				</select>
			</form>
		</div>
		<?php
	} 
	?>	
	<div id="messages"><?php if (isset($messages)) { echo urldecode($messages); }?></div>
	<div id="clearb">
	<ul id="catalog">
		<?php 
		if (isset($catalog))
		{
			foreach ($catalog as $row)
			{
				?>
				<li>
					<img alt="p1" src="<?php echo base_url().$row->imageurl?>" width="140" height="100">
					<div class="p-description"><?php echo $row->description?></div>
					<?php 
					if ($catalogid != 6)
					{
						?>
						<div class="p-price">Precio: <strong>$<?php echo $row->price?></strong></div>
						<?php 
					}
					?>					
					<div class="p-pedir"><input type="text" id="amount<?php echo $row->productid;?>" size="3" maxlength="3" value="">&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="addProduct(<?php echo $row->productid?>, <?php echo $_SESSION['orderid'];?>, '<?php echo str_replace('"', '', $row->description); ?>', $('#amount<?php echo $row->productid;?>').val())"><strong>Comprar</strong></a></div>
				</li>
				<?php 
			}
		}
		?>				
	</ul>	
	</div>
	<br><br>
	<div id="link-pages" style="clear:both;"><?php echo $this->pagination->create_links();?></div>			
</div>

</div>
</div>

</body>
</html>
