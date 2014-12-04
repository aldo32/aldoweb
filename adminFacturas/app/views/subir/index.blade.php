@extends('layout')

@section('content')
	<script>
	$(document).ready( function () {
	   
	});
	</script>
	
	<div id="upload-wrap">
		{{ Form::open(array('action' => 'LoginController@access', 'name'=>'uploadprov', 'method'=>'post', 'files' => true)) }}
			<table width="400">
				<tr>
					<td>Archivo PDF:</td>
					<td><input type="file" name="filepdf"></td>
				</tr>
				
				<tr><td>&nbsp;</td></tr>
				
				<tr>
					<td>Archivo XML:</td>
					<td><input type="file" name="filexml"></td>
				</tr>
				
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				
				<tr><td colspan="2"><input type="submit" class="button" value="Enviar" /></td></tr>
			</table>
		{{ Form::close(); }}
	</div>
@stop
 
             
   
