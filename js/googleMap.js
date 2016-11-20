/**
 * Utilizado por nuevapropiedadsasasas.html
 * Crédito: http://www.bufa.es/google-maps-latitud-longitud/
 * Modificado por : Harry Castillo
 */
var map;
var zoomLevel=9;
$( document ).ready(function() {
    console.log( "ready!" );
});
function initialize()
{
	if(!esNuevo && bd_visible == 1) // hay que cargarlo desde bd
		{
		var mapProp = {
			    center: new google.maps.LatLng(parseFloat(bd_latitud),parseFloat(bd_longuitud)),
			    zoom:parseInt(bd_zoom),
			    mapTypeId: google.maps.MapTypeId.ROADMAP
			    
			  };
			  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
			  geocoder = new google.maps.Geocoder();
			  setupEvents();
			  centerChanged();
			  var opt = { minZoom: 3 };
			  map.setOptions(opt);
		}
	else //corre el default
		{
		var mapProp = {
			    center: new google.maps.LatLng(8.969292772021408,-79.53546897915044),
			    zoom:zoomLevel,
			    mapTypeId: google.maps.MapTypeId.ROADMAP
			    
			  };
			  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
			  geocoder = new google.maps.Geocoder();
			  setupEvents();
			  centerChanged();
			  var opt = { minZoom: 3 };
			  map.setOptions(opt);
		}
	
  
}

function loadScript()
{
	console.log("Iniciandooo................");
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=&sensor=false&callback=initialize";
  document.body.appendChild(script);
}

window.onload = loadScript;

function setupEvents() {
    reverseGeocodedLast = new Date();
    centerChangedLast = new Date();

    setInterval(function() {
      if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
        if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
          reverseGeocode();
      }
    }, 1000);

    google.maps.event.addListener(map, 'zoom_changed', function() {
    	zoomLevel = map.getZoom();
    });

    google.maps.event.addListener(map, 'center_changed', centerChanged);

    google.maps.event.addDomListener(document.getElementById('crosshair'),'dblclick', function() {
       map.setZoom(zoomLevel + 1);
    });

  }
function getCenterLatLngText() {
    return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
  }

  function centerChanged() {
    centerChangedLast = new Date();
  //  var latlng = getCenterLatLngText();
    var lat = map.getCenter().lat();
    var lng = map.getCenter().lng();
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
    document.getElementById('formatedAddress').innerHTML = '';
    currentReverseGeocodeResponse = null;
  }
  function reverseGeocode() {
	    reverseGeocodedLast = new Date();
	    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
	  }
  function reverseGeocodeResult(results, status) {
	    currentReverseGeocodeResponse = results;
	    if(status == 'OK') {
	      if(results.length == 0) {
	        document.getElementById('formatedAddress').innerHTML = 'None';
	      } else {
	        document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
	      }
	    } else {
	      document.getElementById('formatedAddress').innerHTML = 'Error';
	    }
	  }

	  function geocode() {
	    var address = document.getElementById("address").value;
	    geocoder.geocode({
	      'address': address,
	      'partialmatch': true}, geocodeResult);
	  }

	  function geocodeResult(results, status) {
	    if (status == 'OK' && results.length > 0) {
	      map.fitBounds(results[0].geometry.viewport);
	    } else {
	      alert("Geocode was not successful for the following reason: " + status);
	    }
	  }

	  function addMarkerAtCenter() {
	    var marker = new google.maps.Marker({
	        position: map.getCenter(),
	        map: map
	    });

	    var text = 'Lat/Lng: ' + getCenterLatLngText();
	    if(currentReverseGeocodeResponse) {
	      var addr = '';
	      if(currentReverseGeocodeResponse.size == 0) {
	        addr = 'None';
	      } else {
	        addr = currentReverseGeocodeResponse[0].formatted_address;
	      }
	      text = text + '<br>' + 'Dirección: <br>' + addr;
	    }

	    var infowindow = new google.maps.InfoWindow({ content: text });

	    google.maps.event.addListener(marker, 'click', function() {
	      infowindow.open(map,marker);
	    });
	  }