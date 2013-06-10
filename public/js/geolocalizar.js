$(document).on('ready', geo);
function geo() {
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			bien,
			error,
			{enableHighAccuracy: true}
		);
		function bien(position) {
			var lat, lon;
		    lat = position.coords.latitude;
		    lon = position.coords.longitude;
			var coordenadas = new google.maps.LatLng(lat, lon);
			//Add map options
			var mapOptions = {	 
			//zoom level, between 0 to 21.
			    zoom: 15,
			    //center to the user location
			    center: coordenadas,
			    //add map type controls.
			    mapTypeControl: true,
			    //navigation control options
			    navigationControlOptions: {
			        style: google.maps.NavigationControlStyle.SMALL
			        },
			    //default map type
			    mapTypeId: google.maps.MapTypeId.ROADMAP
			    };
			// Create the map, and place it in the mapContainer div
			var map = new google.maps.Map(document.getElementById("mapContainer"), mapOptions);
			// Place the initial marker
		    var marker = new google.maps.Marker({
	            position: coordenadas,
	            draggable: true,
	            map: map
	        });

		    google.maps.event.addListener(marker, 'dragend', function(evt){
		    	lat = evt.latLng.lat().toFixed(3);
		    	lon = evt.latLng.lng().toFixed(3);
			});

			google.maps.event.addListener(marker, 'dragstart', function(evt){
			    alertify.log("Llévalo hasta tu verdadera ubicación y cuando termines dale Si");
			});

	        $("#aSi").on("click", function(){
		        $.post(BASE+'/mapContainer', {
	   				lati: lat,
	   				longi: lon
				});
				alertify.success("Ubicación Guardada");
	        });
		}
		function error(){
			alert("Error al localizarte");
		}
	}else{
	    alert("Su navegador no soporta geolocalizacion, intente con un navegador moderno");
	}

	//Mostrar el input text company cuando la persona es vendedor
	$("#TipoPersona").change(function(){
		var value = this.value;
		if (value == 'V') {
			$("#company").css("display", "block");
		}else{
		   $("#company").css("display", "none");
		}
	});

	//Cuando no esta bien la ubicaCION
	$('#aNo').click(function() {
      alertify.alert("Arrastra el marcador hasta tu verdadera ubicación");
  	}); 	
}