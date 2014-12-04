@extends('login')

@section('content')
		<div class="form-box" id="login-box">
            <div class="header">Login Aldosworld CMS</div>
           	{{ Form::open(array('action' => 'LoginController@access')) }}            
                <div class="body bg-gray">
                    <div class="form-group">                        
                        <?php echo Form::text('email', (isset($Input['email']))?$Input['email']:'', array('class'=>'form-control', 'placeholder'=>'Email')); ?>
                    </div>
                    <div class="form-group">  
                    	<input name="password" type="password" class="form-control", placeholder="Password">                                              
                    </div>                              
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Entrar</button>  
                    
                    <p>{{ link_to('login/restorepassword', "Perdi mi contraseña", $attributes = array(), $secure = null); }}</p>
                    <br/>                    
                    <?php                                                            
                    foreach ($errors->all() as $message) {
						echo '<span style="color: red; font-weight: bold;">'.$message.'</span><br>';						
					}
					
					if (isset($errorAccess)) { echo '<span style="color: red; font-weight: bold;">'.$errorAccess.'</span><br>';  }										
                    ?>                                                                              
                </div>
            {{ Form::close() }}            
        </div>
@stop