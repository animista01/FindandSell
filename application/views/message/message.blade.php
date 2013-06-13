@layout('default.master')

@section('content')
	<label for="">Mensaje: </label>
	<p>{{e($mensaje->body)}}</p>

	<h5>Enviando por: {{e($mensaje->user->name)}}</h5>
@endsection