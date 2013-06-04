@layout('master')
@section('content')
<div class="span4 offset4">
  <div class="row">
    <div class="span4">
        @if (Session::has('success_message'))
            {{ Alert::success("Cuenta creada, ya puedes ingresar!") }}
        @endif
      <p class="lead">Iniciar sesión</p>
        {{ Form::open('user/login', 'POST',array('class'=>'well')); }}
        {{ Form::token() }}
        @if (Session::has('error_login'))
            {{ Alert::error("Usuario o contraseña incorrecta.") }}
        @endif
        {{ Form::text('username', Input::old('username'), array('class' => 'span3', 'placeholder' => 'Email'));}}
        {{ Form::password('password', array('class' => 'span3', 'placeholder' => 'Contraseña'));}}
        
        {{ Form::submit('Entrar', array('class'=>'btn-info'));}}
        {{ Form::close() }}
    </div>
  </div>
</div>
@endsection