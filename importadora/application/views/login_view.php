<?php echo $includes;?>

<?php echo $menu;?>

<style>
	#page { position: relative; z-index: 100; width: 800px; height: 400px; top:270px; margin: 0 auto; font-family: Arial,Helvetica,Sans-Serif; font-size: 13px; }
	#login-wrap { width: 300px; height: 200px; color: #fff; margin: 0 auto; color: #fff; font-weight: bold; }
	#login-form { width: 270px; margin: 0 auto; padding-top: 50px; }
	table { color: #fff; font-weight: bold }
	#error { color: red; }	
</style>

<script>
$(document).ready(function(){			   								
	$('#loginform').submit(function (e) {	
		e.preventDefault();																		
		$.ajax({										
	        url: "<?php echo base_url()?>pedidos/login",        
	        data: $(this).serialize(),     			     
	        dataType: "json",           	                	       
	        success: function(datos){	
		        if (datos.status=="success")
			        document.loginform.submit();
		        else
			        $('#error').hide().html(datos.status).fadeIn('slow').delay(3000).fadeOut('slow');																
	        },        
	        type: "POST"
		});																			
	});
});
</script>

<div id="page">
	<div id="login-wrap">
		<div id="login-form">
			<div id="error"><?php if (isset($message)) { echo $message; }?></div>
			<br>
			<form name="loginform" id="loginform" method="post" action="<?php echo base_url()?>pedidos/catalogo">
				<table width="300">
					<tr>
						<td>Email:</td>
						<td><input type="text" name="user" size="38"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="pass" size="38"></td>
					</tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Entrar"></td></tr>
				</table>	
				<br>				
				<br>
				<center>Ultimos 20 pedidos</center>
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
			</form>
		</div>
	</div>	
</div>

</div>
</div>

</body>
</html>
