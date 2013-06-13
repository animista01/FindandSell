@layout('default.master')
@section('content')
	<section id="sidebar">
		<h4>Encuentra lo que quieres comprar</h4>
		<div id="placeList">
			<p>Hay {{ $countsellers }} Vendedores</p>
		</div>

		@if (Session::has('error_no_id'))
			<script>
            	alertify.error("No no no.. :P");
			</script>
        @endif

        @if (Session::has('mensaje_enviado'))
			<script>
            	alertify.success("Mensaje enviado.!");
			</script>
        @endif
	</section>
	<section id="main">
		<div id="map_sellers"></div>
	</section>
	
	<script>
		$(document).on('ready', recibe);
		function recibe() {
			var map;
		    var data = {{ $jsonSellers }}; //El Json
			var user = {{ $userlogeado }};
			console.log(user[0]);
			var center = new google.maps.LatLng(10.943944,-74.796073);
		    var mapOptions = {
		        zoom: 12,
		        center: center,
		        mapTypeId: google.maps.MapTypeId.ROADMAP,
			    mapTypeControl: false
		    };
		     
		    map = new google.maps.Map(document.getElementById("map_sellers"), mapOptions);
			
			//Ventana que sale cuando das click sobre un marcador
			var infowindow = new google.maps.InfoWindow();
			var marker, i;    

		    for (i = 0; i < data.length; i++) {
			    var content = '<div class="infoWindow"> <strong>'+ data[i].name +'</strong>\
			    				<br><small>'+data[i].company+'</small><br><a href="'+BASE+'/user/profile/'+data[i].id+'">Contactar</a></div>';
		        var position = new google.maps.LatLng(data[i].lat, data[i].lng);
		        marker = new google.maps.Marker({
		            position: position,
		            map: map, 
		            title: data[i].name //Nombre del vendedor
		        });
		         
		        (function(marker, content){                       
			        google.maps.event.addListener(marker, 'click', function() {
			            infowindow.setContent(content);
			            infowindow.open(map, marker);
			        });
			    })(marker,content);
			}//End For
		}
	</script>
@endsection