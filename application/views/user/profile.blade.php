@layout('default.master')

@section('content')
	<script>
		$(document).on("ready",inicio);
		function inicio(){
			$("#liperfil").addClass("active");
			$("#inicio").removeClass("active");
		}
	</script>
	<div class="row-fluid">
		<div class="span12" id="content">
			<div id="details" class="span7">
				<p><img src="{{ URL::base(); }}/uploads/users/default.jpg" width="160" height="160"></p>
				<h3 id="h3UserName">{{ HTML::entities($user->name) }}</h3>
				<br>
		        <table class="table table-striped">
		            <tbody>
			            <tr>
			                <td>Trabajo:</td>
			                <td><i class="icon-briefcase"></i> {{e($user->company)}}</td>
			            </tr>
		        	</tbody>
		    	</table>
		    	@if(Auth::user()->id != $id)
				<div class="span6 well" id="concactarMensaje">	
			    	{{ Form::open('message/message', 'POST') }}
						{{ Form::token(); }}
						<input type="hidden" name="some" value="{{$id}}">
						{{ $errors->first('message', Alert::error(":message")) }}
						{{ Form::textarea('message', Input::old('message'),array('class' => 'span5','placeholder' => 'Mensaje...', 'id' => 'message', 'rows'=>'', 'cols'=>'')) }}
						
						{{ Form::submit('Enviar', array('class' => 'btn btn-success')) }}
					{{ Form::close() }}
				</div>
				@endif
			</div>
		</div>
	</div>
@endsection