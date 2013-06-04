{{ Form::open('user/login', 'POST') }}
  {{ Form::text('username', '' ,array('placeholder' => 'Email')) }}
  {{ Form::password('password' , array('placeholder' => 'Password')) }}
  {{ Form::submit('Entrar', array('class' => 'btn btn-success')) }} 
  {{ HTML::link_to_action('user@register', 'Registrate',array() ,array('class' => 'btn btn-primary')) }}
{{ Form::close() }} 
