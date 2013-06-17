@layout('default.master')

@section('content')
	<label>Mensaje: </label>
	<div class="span5 well">
		<p>{{e($mensaje->body)}}</p>
	</div>
	<br /> <br /> <br /> <br />
	<h5>Enviando por: {{e($mensaje->user->name)}}</h5>	
@endsection