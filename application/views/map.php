<style type="text/css">
	
	div#crosshair {
	display: block;
	position: absolute;
	top: 58%;
  	left: 50%;
	height: 21px;
	width: 21px;
	margin-left: -10px;
  	margin-top: -10px;
}
div#crosshair:before,
div#crosshair:after {
  content: '';
  display: block;
  position: absolute;
  background-color: #000;
  outline: rgba(255,255,255,0.75);
}
div#crosshair:before {
  top: 10px;
  left: 0;
  width: 21px;
  height: 1px;
}
div#crosshair:after {
  top: 0;
  left: 10px;
  width: 1px;
  height: 21px;
}
</style>

<div class="row">
	             <div class="col-md-7">
			            <div class="coordinates" >
						      <em class="lat" ><mark>Latitud:</mark></em>
						      <em class="lon" style="margin-left:105px;"><mark>Longitud:</mark></em>
						      <br>
						      <input type="text" id="lat" disabled />
						      <input type="text" id="lng" disabled />
			    		</div>
			    		
					    <div class="address" style="margin-top:5px;">
					    	<em class="lon"  ><mark>Direcci&oacute;n:</mark></em>
						   	<br>
					      	<span id="formatedAddress" style="background-color:#7094B8;color: #F1F4F8;"></span>
					    </div>
		           
			            	
			                <div id="googleMap" style="width:500px;height:400px;"></div>
			                <div id="crosshair"></div>
			    	</div>
			    	<div class="col-md-5">
			            <label for="ced">Id factura:</label>
	            		<input id="idFac" readonly type="text" value="<?php echo $FACTURA[0]['id'];?>" class="form-control"  >
	       				<label for="ced">C&eacute;dula del Cliente:</label>
	            		<input readonly type="text" value="<?php echo $FACTURA[0]['cedula'];?>" class="form-control"  >
	      				 <label for="ced">Nombre del Cliente:</label>
	            		<input readonly type="text" value="<?php echo $FACTURA[0]['nombre'];?>" class="form-control"  >
	       				<label for="ced">Empresa:</label>
	            		<input readonly type="text" value="<?php echo $FACTURA[0]['nombrecomercial'];?>" class="form-control"  >
	       				
	       				<label for="ced">Dias restantes aprox.:</label>
	            		<input  type="text"  class="form-control"  id="dias">
	            		<br>
	            		<label><input type="checkbox" id="receive"> Registrar como Entregado</label>
	            		<br>
	       				<input type="button" id="btnReg" class="btn btn-success" value="Registra Tracking" />
			             
			        </div>
	                </div>
            <!-- jQuery -->
 
 <script type="text/javascript">
 var map;
 var zoomLevel=1;

 $("#btnReg").click(function()
		 {
	 		var lat =("#lat").val();
	 		var lat =("#lon").val();
	 		var id =("#idFac").val();
	 		var dias =("#dias").val();
	 		
	 		alert("");
		 });
 $( document ).ready(function() {
	 loadScript();
 });
 function initialize()
 {
//  	if(!esNuevo && bd_visible == 1) // hay que cargarlo desde bd
//  		{
//  		var mapProp = {
//  			    center: new google.maps.LatLng(parseFloat(bd_latitud),parseFloat(bd_longuitud)),
//  			    zoom:parseInt(bd_zoom),
//  			    mapTypeId: google.maps.MapTypeId.ROADMAP
 			    
//  			  };
//  			  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
//  			  geocoder = new google.maps.Geocoder();
//  			  setupEvents();
//  			  centerChanged();
//  			  var opt = { minZoom: 3 };
//  			  map.setOptions(opt);
//  		}
//  	else //corre el default
//  		{
 		var mapProp = {
 			    center: new google.maps.LatLng(21.49151013,-51.53546897915044),
 			    zoom:zoomLevel,
 			    mapTypeId: google.maps.MapTypeId.ROADMAP
 			    
 			  };
 			  map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
 			  geocoder = new google.maps.Geocoder();
 			  setupEvents();
 			  centerChanged();
 			  var opt = { minZoom: 3 };
 			  map.setOptions(opt);
//  		}
 	
   
 }

 function loadScript()
 {
	// AIzaSyDsXtlvUB3yJ168CY_tXcTLvcknl9G7K9Y 
   var script = document.createElement("script");
   script.type = "text/javascript";
   script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDsXtlvUB3yJ168CY_tXcTLvcknl9G7K9Y&sensor=false&callback=initialize";
   //document.body.appendChild(script);
   document.getElementById("formulario").appendChild(script);
 }

 //window.onload = loadScript;

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
</script>
 
 	