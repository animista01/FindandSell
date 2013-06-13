<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style>
    .artwork{
      margin-top: 30px;
      margin-bottom: 30px;
    }
    .masthead h1{
      color: #1F2C33;
      font-size: 120px;
      line-height: 1;
      letter-spacing: -2px;
    }
  </style>
  {{ HTML::style('css/bootstrap.css') }}
  {{ HTML::style('css/bootstrap-responsive.css') }}
  {{ HTML::style('css/estiloMapa.css') }}

  {{ HTML::style('css/lib/Alertify/theme/alertify.core.css') }}
  {{ HTML::style('css/lib/Alertify/theme/alertify.default.css') }}

  {{ HTML::script('js/JQuery1.9.js') }}
  {{ HTML::script('js/bootstrap.js') }}
  {{ HTML::script('js/alertify.js') }}

  <script type="text/javascript">
    var BASE = "<?php echo URL::base(); ?>";
  </script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  {{ HTML::script('js/geolocalizar.js') }}
</head>
<body>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container-fluid">
        @if (!Auth::guest())
          {{ HTML::link_to_action('user@index', "Finds and Sells" , array(), array('class' => 'brand'))}}
        @else
          <a href="{{ URL::base(); }}" class="brand">
            Finds and Sells
          </a>
        @endif
        <div class="nav-collapse">
          <ul class="nav pull-right"> 
            @if (!Auth::guest())
              @if(isset($countMessages))
              <li class="dropdown visible-desktop">
                <a href="#" class="dropdown-toogle" data-toggle="dropdown">
                  <i class="icon-globe"></i>
                  <span id="unread_messages">
                    <span class="badge badge-inverse">{{$countMessages}}</span>
                  </span>
                  <strong class="caret"></strong>
                </a>
                <div class="dropdown-menu" id="dropdownNotifications">
                  @foreach($messages as $message)
                  <div class="span3">
                    {{ HTML::link_to_action('message@message', e($message->body), array($message->id)) }}
                    <hr>
                  </div> 
                  @endforeach
                </div>
              </li>
              @endif
            @endif
            @if(Auth::user())
              <li>{{ HTML::link_to_action('user@logout', 'Logout') }}</li>
            @else
              <li class="divider-vertical"></li>
              <li class="dropdown visible-desktop">
                <a href="#" class="dropdown-toogle" data-toggle="dropdown">Ingresar <strong class="caret"></strong></a>
                <div class="dropdown-menu" style="padding: 15px; height: 104px; padding-bottom= 0px;">
                  @include('user.login') 
                </div>
              </li>
            @endif
          </ul>
          <ul class="nav">
            @if (!Auth::guest())
              <li id="inicio" class="active">{{ HTML::link_to_action('user@index', "Inicio")}}
              <li id="liperfil">
                {{ HTML::link_to_action('user@profile', "Perfil", array(Auth::user()->id)) }} 
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>

	<div class="container">
		@yield('content') 
	</div>
  @yield('perfil')
</body>
</html>