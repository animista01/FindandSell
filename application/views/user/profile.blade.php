@layout('master')

@section('content')
	<div class="row-fluid">
		<div class="span12" id="content">
			<div id="details" class="span7">
				<p><img src="{{ URL::base(); }}/uploads/users/default.jpg" width="160" height="160"></p>
				<h3>{{ HTML::entities($user->name) }}</h3>
				<br>
		        <table class="table table-striped">
		            <tbody>
			            <tr>
			                <td>Celular:</td>
			                <td><i class="icon-headphones"></i> {{e($user->telephone)}}</td>
			            </tr>
			            <tr>
			                <td>Email:</td>
			                <td><i class="icon-envelope"></i> {{e($user->email)}}</td>
			            </tr>
			            <tr>
			                <td>Trabajo:</td>
			                <td><i class="icon-briefcase"></i> {{e($user->company)}}</td>
			            </tr>
		        	</tbody>
		    	</table>
			</div>
		</div>
	</div>
@endsection