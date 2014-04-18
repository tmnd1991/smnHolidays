<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once($root."/include/globals.php");
include_once('translate_data.php'); 
header("content-type: application/javascript");
?>
var directionsService = new google.maps.DirectionsService();
var directionsDisplay;
var map;
var marker;
google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
	/********************************* setup mappa *********************************/
	var $panel = $('.panel')
	var width = ($panel.width()-parseInt($panel.css('padding-right'))-parseInt($panel.css('padding-left')));
  var map_canvas = document.getElementById('map_canvas');
  $(map_canvas).css('width', width+'px');
  var map_options = {
    center: new google.maps.LatLng(39.985079, 9.683766),
    zoom: 7, //16
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(map_canvas, map_options);
	/********************************* marker ***********************************/
	marker = new google.maps.Marker({
	    position: new google.maps.LatLng(39.985079, 9.683766),
	    icon: 'icon.png',
	    map: map,
	    title:"Casa Olivastro",
	    animation: google.maps.Animation.DROP,
	});

	var contentString = ''
		+'<div id="map_content" style="width:'+Math.floor(width/4)+'px; height : 150px">'
		+'<h2>Casa Olivastro</h2>'
		+'<p>via Montebianco, Tancau<br/>Santa Maria Navarrese</p>'
		+'</div>';

	var infowindow = new google.maps.InfoWindow({
	    content: contentString,
	});
	google.maps.event.addListener(marker, 'click', function() {
	  infowindow.open(map,marker);
	});
	
	marker.setMap(map);
	/********************************* directions *********************************/
	directionsDisplay = new google.maps.DirectionsRenderer();
	directionsDisplay.setMap(map);

}
function calcRoute() {
  var start = document.getElementById("start").value;
  var travelMode;
  switch ($('input[name=veicolo]:checked').val())
  {
  	case 'BICYCLING':
  		travelMode = google.maps.TravelMode.BICYCLING;
  		break;
  	case 'DRIVING'	:
  		travelMode = google.maps.TravelMode.DRIVING;
  		break;
  	case 'TRANSIT'	:
  		travelMode = google.maps.TravelMode.TRANSIT;
  		break;
  }
  var end =  new google.maps.LatLng(39.985079, 9.683766);
  console.log();
  var request = {
    origin:start,
    destination:end,
    travelMode: travelMode
  };
  directionsService.route(request, function(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(result);
		  var myRoute = result.routes[0].legs[0];
		  var directionBox = document.getElementById('directions');
		  var url = 'https://maps.google.com/?f=d&saddr='+result.routes[0].legs[0].start_address+'&daddr='+result.routes[0].legs[0].end_address;
		  url = url.replace(/\s+/g, '+');
		  console.log(url);
		  directionBox.innerHTML = '';
		  directionBox.innerHTML+='<li class="url_to_google"><a target="_blank" href="'+url+'"> <?=$visualizeOnMaps?></a></li>';
		  if (result.routes[0].warnings!='')
			  directionBox.innerHTML+='<li class="direction_warning">'+result.routes[0].warnings+'</li>';
		  directionBox.innerHTML+='<li class="direction_title"><?=$RouteFrom?> '+result.routes[0].legs[0].start_address+' <?=$RouteTo?> '+result.routes[0].legs[0].end_address+'</li>';
		  for (var i = 0; i < myRoute.steps.length; i++) {
		  		directionBox.innerHTML+='<li class="bullet-item">'+(i+1)+' - '+myRoute.steps[i].instructions+'</li>';
		  }

    }
    else
    {
	    directionsDisplay.set('directions', null);
	    marker.setMap(map);
	    alert('Impossibile calcolare il percorso con il veicolo corrente');
    }
  });
  marker.setMap(null);
}