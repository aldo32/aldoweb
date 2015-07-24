<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header("Expires: 0");


if ($type == "todos")
{	
	?>
	<table>
		<thead>
			<tr><th colspan ="13" style="font-size:20px; font-weight:bold; color:#000000;">REPORTE DE ENTRADAS - EVO'S</th></tr>
			<tr style="background:#0067A0; color: white; font-weight: bold">
				<th>ID</th> 
               	<th>Nombre</th>  
               	<th>Fecha</th>                  					                            
                <th>Llegada</th>
                <th>Min Tarde</th>
                <th>Permiso</th>
                <th>Multa</th>
                <th>Tipo</th>				               
			</tr>
		</thead>
		<tbody>
			<?php 
			if (isset($llegadas))
			{
				$i=1;
				foreach ($llegadas as $row)
				{
					$time = strtok($row->hrLlegada, " ");
                    $time = strtok("");
                    $retardo="";
                    
                    if ($row->retardo == "1") { $retardo = "Retardo"; }
                    if ($row->retardo == "2") { $retardo = "Falta"; }
                    if ($row->retardo == "") { $retardo = "-"; }
                    ?>
                    <tr>
                    	<td><?php echo $row->idUsuario?></td>
                        <td><?php echo $row->nombre?></td>
                        <td><?php echo strtok($row->hrLlegada, " ")?></td>			                        							                        				
                        <td><?php echo $this->general_library->dateFormat($row->hrLlegada)." - ".$time?></td>
                        <td><?php echo $row->minutosTarde?></td>
                        <td><?php echo ($row->permiso == 0) ? "No" : "Si";?></td>
                        <td><?php echo "$".$row->multa?></td>
                        <td><?php echo $retardo?></td>			                        							                        				
                    </tr>
                    <?php
				}									
			}
			else
			{
				?>
				<tr><td colspan="7">No hay registros</td></tr>
				<?php 
			}
			?>	
		</tbody>
	</table>					
	<?php 
}	
else if ($type != "agrupado"){
	?>
		<table>
			<thead>
				<tr><th colspan ="13" style="font-size:20px; font-weight:bold; color:#000000;">REPORTE DE ENTRADAS - EVO'S</th></tr>
				<tr style="background:#0067A0; color: white; font-weight: bold">
					<th>Fecha</th>
					<th>Llegada</th>
                    <th>Min Tarde</th>
                    <th>Permiso</th>
                    <th>Multa</th>
                    <th>Tipo</th>				
				</tr>
			</thead>
			<tbody>
				<?php 			                        	
                    if (isset($llegadas)) {
                    	foreach ($llegadas AS $row) {
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
                        		<td><?php echo ($row->permiso == 0) ? "No" : "Si";?></td>
                        		<td><?php echo "$".$row->multa?></td>
                        		<td><?php echo $retardo?></td>			                        							                        				
                        	</tr>
                        	<?php 
                        }
                    }
                    else
                    {
                    	?>
                    	<tr><td colspan="7">No hay registros</td></tr>
                    	<?php 
                    }
                ?>                
			</tbody>
		</table>					
		<?php
}
else {
	?>
	<table>
		<thead>
					<tr><th colspan ="13" style="font-size:20px; font-weight:bold; color:#000000;">REPORTE DE ENTRADAS DEL <?php echo $initDate?> AL <?php echo $endDate?></th></tr>
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
                    if (isset($llegadas)) {
                    	foreach ($llegadas AS $row) {
                        	
                        	?>
                        	<tr>			                        							                        				
                        		<td><?php echo $row->idUsuario?></td>
                        		<td><?php echo $row->nombre?></td>
                        		<td><?php echo $row->minutosTarde?></td>                        		
                        		<td><?php echo "$".$row->multa?></td>   
                        		<td><?php echo $row->retardos?></td>
                        		<td><?php echo $row->faltas?></td>                     					                        							                        			
                        	</tr>
                        	<?php 
                        }
                    }
                    else
                    {
                    	?>
                    	<tr><td colspan="7">No hay registros</td></tr>
                    	<?php 
                    }
                ?>                
		</tbody>
	</table>					
	<?php
}