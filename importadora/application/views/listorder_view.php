<html>
	<head>
		<title>Reporte</title>
		<style type="text/css">
		#page { width: 700px; margin: 0; font-family: arial; }		
		</style>
	</head>
<body>
	<div id="page">					
		<table width="700">
			<tr><td><strong>Pedido No: <?php echo $orderid?></strong></td></tr>
			<tr><td><strong>Nombre: <?php echo $user->name." ".$user->lastname." [".$user->email."]";?></strong></td></tr>
			<tr><td><strong>Fecha: <?php echo $order->date?></strong></td></tr>
			<tr><td>&nbsp;</td></tr>			
		</table>
		
		<table width="700">
			<tr><td><strong>Detalle del pedido</strong></td></tr>						
		</table>
		
		<table width="700" border="1">
			<tr>
				<td width="30">ID</td>
				<td width="350">Nombre</td>
				<td width="50">Cantidad</td>				
				<td width="50">Codigo</td>
				<td width="50">Precio/Unitario</td>
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
						<td align="center"><?php echo $row->amount;?></td>						
						<td><?php echo $row->code;?></td>
						<td>$<?php echo $row->price;?></td>
					</tr>
					<?php 
				}
			}
			?>			
			
			<tr><td colspan="4" align="left">Total:</td><td>$<?php echo $total?></td></tr>
		</table>
	</div>	
</body>
</html>