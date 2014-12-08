@extends('layout')

@section('content')
	<script>
	$(document).ready( function () {
	    $('#facturas').DataTable();
	});
	</script>
	
	<?php echo (isset($alert)) ? $alert : 'Aldo';?>
	<br><br>
		
	<table id="facturas" class="display">
    <thead>
        <tr>
            <th>URL PDF</th>
            <th>URL XML</th>
            <th>FECHA</th>
            <th>OPERACIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		if (count($bills) >= 1) {
			foreach ($bills AS $row) {
				?>
				<tr>
					<td><a target="_blank" href="<?php echo app_path()."../".$row->urlpdf?>">Ver PDF</a></td>
					<td><a target="_blank" href="<?php echo app_path()."../".$row->urlxml?>">Ver XML</a></td>					
					<td><?php echo $row->created_at?></td>
					<td>
						<a href="{{ URL::to('/'); }}/inicio/eliminarFactura/<?php echo $row->idbill?>">[X] Eliminar</a>
					</td>
				</tr>
				<?php
			}
		}
		else {
			?><tr><td colspan="5">No hay registros</td></tr><?php
		} 
		?>
    </tbody>
</table>
@stop
 
             
   
