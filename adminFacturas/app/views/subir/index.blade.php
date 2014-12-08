@extends('layout')

@section('content')
	<script>
	$(document).ready( function () {
	   
	});
	</script>
	
	<div id="upload-wrap">
		{{ Form::open(array('action' => 'SubirController@uploadFiles', 'name'=>'uploadFiles	', 'method'=>'post', 'files' => true)) }}
			<table width="400">
				<tr>
					<td>Archivo PDF:</td>
					<td><input type="file" name="filepdf"></td>					
				</tr>
				<tr><td colspan="2"><?php echo ($errors->has('filepdf')) ? "<label for='inputError' class='control-label' style='color: orange'><i class='fa fa-times-circle-o'></i> ".$errors->first('filepdf')."</label>" : "";  ?></td></tr>
				
				<tr><td>&nbsp;</td></tr>
				
				<tr>
					<td>Archivo XML:</td>
					<td><input type="file" name="filexml"></td>					
				</tr>
				<tr><td colspan="2"><?php echo ($errors->has('filexml')) ? "<label for='inputError' class='control-label' style='color: orange'><i class='fa fa-times-circle-o'></i> ".$errors->first('filexml')."</label>" : "";  ?></td></tr>
				
				<tr><td>&nbsp;</td></tr>
				
				<tr>
					<td>Mensaje:</td>									
				</tr>
				<tr><td colspan="2"><textarea rows="5" cols="50" name="message"></textarea></td></tr>
				<tr><td colspan="2"><?php echo ($errors->has('message')) ? "<label for='inputError' class='control-label' style='color: orange'><i class='fa fa-times-circle-o'></i> ".$errors->first('message')."</label>" : "";  ?></td></tr>
				
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				
				<tr><td colspan="2"><input type="submit" class="button" value="Enviar" /></td></tr>
			</table>
		{{ Form::close(); }}
	</div>
@stop
 
             
   
