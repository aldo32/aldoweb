<?php echo $includes;?>

<?php echo $menu;?>

<style>
	#page { position: relative; z-index: 100; width: 800px; height: 400px; top:270px; margin: 0 auto; font-family: Arial,Helvetica,Sans-Serif; font-size: 13px; color: #fff; }
	#login-wrap { width: 300px; height: 200px; color: #fff; margin: 0 auto; color: #fff; font-weight: bold; }
	#login-form { width: 270px; margin: 0 auto; padding-top: 50px; }
	table { color: #fff; font-weight: bold }
	#error { color: red; }	
	#messages { width: 100%; text-align: left; font-size: 14px; color: green; margin-bottom: 10px; margin-left: 40px; font-weight: bold; }
</style>

<script>
$(document).ready(function(){			   								
	
});

function delProductOrder(orderid, productid, description)
{
	$.ajax({										
        url: "<?php echo base_url()?>pedidos/delProductOrderSell",        
        data: 'productid='+productid+'&orderid='+orderid,     			     
        dataType: "html",           	                	       
        success: function(datos){	
	        $('#products').html(datos);
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
}

function updateOrder(orderid, productid, amount)
{
	$.ajax({										
        url: "<?php echo base_url()?>pedidos/updateamountproduct",        
        data: 'orderid='+orderid+'&productid='+productid+'&amount='+amount,     			     
        dataType: "json",           	                	       
        success: function(datos){	
	        if (datos.status=='success')
	        {
		        $('#message').hide().html('Se cambio la cantidad del producto con éxito').fadeIn('slow').delay(4000).fadeOut('slow');
		    }	               																			
        },        
        type: "POST"
	});
}
</script>

<div id="page">
	<div id="messages"></div>
	<strong>Pedido No <?php echo $orderid?></strong>
	<div>Cliente: <strong><?php echo $user->name." ".$user->lastname;?></strong></div><br>
	
	<form name="formvalid" id="formvalid" action="<?php echo base_url()?>pedidos/finalizaventa" method="post">
		<div id="products">
		<table id="list-product" width="950">
			<tr>
				<td width="50"><strong>Id</strong></td>
				<td><strong>Nombre</strong></td>
				<td><strong>Cantidad</strong></td>
				<td><strong>Precio/U</strong></td>
				<td><strong>Borrar</strong></td>
				<td><strong>&nbsp;</strong></td>
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
						<td align="center"> <input type="text" id="amount<?php echo $row->productid;?>" size="3" maxlength="3" value="<?php echo $row->amount;?>"></td>
						<td>$<?php echo $row->price;?></td>
						<td align="center" width="20"><a href="#" onclick="delProductOrder(<?php echo $row->orderid?>, <?php echo $row->productid;?>, '<?php echo $row->description;?>')"; style="color: red;"><strong>X</strong></a></td>
						<td><input type="button" value="Guardar nueva cantidad" onclick="updateOrder(<?php echo $orderid?>, <?php echo $row->productid?>, $('#amount<?php echo $row->productid?>').val());"></td>
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
				<input type="button" value="Cancelar pedido" onclick="cancelOrder(<?php echo $orderid;?>, <?php echo $userid;?>)">				
			</td></tr>				
			<tr><td>&nbsp;</td></tr>
			<tr><td id="message" align="center" colspan="5">&nbsp;</td></tr>					
		</table>
		</div>
		<input type="hidden" name="orderid" value="<?php echo $orderid;?>">
		<input type="hidden" name="userid" value="<?php echo $userid;?>">
	</form>			
</div>

</div>
</div>

</body>
</html>
