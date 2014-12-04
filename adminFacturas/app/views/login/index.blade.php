@extends('menu')

@section('content')
	<div id="content-wrap">
		<div id="content" class="padding-15 fontZ22">
			Acceso a proveedores	
		</div>		
		
		{{ Form::open(array('action' => 'LoginController@access', 'name'=>'clientaccess', 'method'=>'post', 'files' => false)) }}
			<div class="centerTxt">
				<br>
				<div><?php echo Form::text('email', (isset($Input['email']))?$Input['email']:'', array('class'=>'inputLogin', 'placeholder'=>'Email')); ?></div>
				<br>
				<div><input type="password" name="password" class="inputLogin" placeholder="Password" /></div>
				<br><br>
				<input type="submit" value="Login" class="button">
			</div>		
			<br><br>
			<?php                                                            
            foreach ($errors->all() as $message) {
				echo '<span style="color: #E8E8E8; font-weight: bold;">&nbsp;&nbsp;'.$message.'</span><br>';						
			}
					
			if (isset($errorAccess)) { echo '<span style="color: red; font-weight: bold;">'.$errorAccess.'</span><br>';  }										
            ?>							
		{{ Form::close() }}
	</div>
@stop
 
             
   
