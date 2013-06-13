@layout('default.master')
@section('content')
	<br />	<br />	<br />
	<div class="row">
		<div class="span5" id="izqRegistro">
			<div class="well">
				<legend>Registro</legend>
				@if (Session::has('error_register'))
		            {{ Alert::error("Error al registrate") }}
		        @endif
				{{ Form::open('user/register', 'POST') }}
					{{ Form::token(); }}
					{{ $errors->first('nombre', Alert::error(":message")) }}
					{{ Form::text('nombre',Input::old('nombre') ,array('class' => 'span3', 'placeholder' => 'Nombre Completo')) }}
					
					{{ $errors->first('email', Alert::error(":message")) }}
					{{ Form::text('email', Input::old('email'), array('class' => 'span3', 'placeholder' => 'Email')) }}
					
					{{ $errors->first('password', Alert::error(":message")) }}
					{{ Form::password('password' , array('class' => 'span3', 'placeholder' => 'Password')) }}
					
					{{ $errors->first('telefono', Alert::error(":message")) }}
					{{ Form::text('telefono', Input::old('telefono'),array('class' => 'span3', 'placeholder' => 'Telefono')) }}

					<select name="tipo" id="TipoPersona">
						<optgroup label="Tipo de persona">
						<option value="C">Comprador</option>
						<option value="V" id="vende">Vendedor</option>
					</select>

					<input type="text" name="company" id="company" class='span3' placeholder='Compañia.. ej: Avon, Lbel' />

			</div>
		</div>
		<div class="span5" id="derRegistro">
			<div class="well">
				<div id="mapContainer"></div>
			
				<label>Es esta tu ubicacion?</label>
				<a href="#" id="aSi">Si</a> &nbsp  &nbsp
				<a href="#" id="aNo">No</a>
				<br />
				<br />

				{{ Form::submit('Registrate', array('class' => 'btn btn-success')) }}
			
				{{ Form::close() }}
			</div>
		</div>
	</div>
	<div id="oculto">
		<br />
		<input type="text" name="dirrec" id="direccion" placeholder="Tu Dirección por favor" />
		<br />
	</div>
@endsection