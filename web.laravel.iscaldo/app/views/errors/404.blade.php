@extends('errors')

@section('content')
	<div>{{ HTML::image('resources/images/logo.png', '', array('class' => '', 'width'=>'480', 'height'=>'140')) }}</div>
	<br>
	Página no encontrada!
	<br><br>
	<div style="font-size: 16px;">Por favor da click <a href="{{ URL::to('/'); }}" style="color: #fff; font-weight: bold; ">Aquí</a> para regresar al sitio.</div> 		               
@stop