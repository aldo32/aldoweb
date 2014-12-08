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
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
@stop
 
             
   
