$(document).on('ready', geo);
function geo() {
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			bien,
			error,
			{enableHighAccuracy: true}
		);
		function bien(position) {
		    var lat = position.coords.latitude;
		    var lon = position.coords.longitude;
			var coordenadas = new google.maps.LatLng(lat, lon);
			//Add map options
			var mapOptions = {	 
			//zoom level, between 0 to 21.
			    zoom: 17,
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
	            map: map,
	            title: "Aqui estas"
	        });
	        $("#aSi").on("click", function(){
		        $.post(BASE+'/mapContainer', {
	   				lati: lat,
	   				longi: lon
				});
	        });
		}
		function error(){
			alert("Error al localizarte");
		}
	}else{
	    alert("Su navegador no soporta geolocalizacion, intente con un navegador moderno");
	}
}