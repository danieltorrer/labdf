 var lineSymbol = {
 	path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
 	//strokeOpacity: 0.6,
 	//strokeColor: '#6dbd44',
 	//fillColor: '#6dbd44'
 };

 /*var styles = [
 {
 	featureType: 'landscape.man_made',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#353535' },
 	{ saturation: -100 },
 	{ lightness: -77 },
 	{ visibility: 'on' }
 	]
 },{
 	featureType: 'road.arterial',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#222222' },
 	{ saturation: -100 },
 	{ lightness: -83 },
 	{ visibility: 'on' }
 	]
 },{
 	featureType: 'poi',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#444444' },
 	{ saturation: -100 },
 	{ lightness: -66 },
 	{ visibility: 'on' }
 	]
 },{
 	featureType: 'administrative',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#111111' },
 	{ saturation: 0 },
 	{ lightness: -87 },
 	{ visibility: 'on' }
 	]
 },{
 	featureType: 'road.highway',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#222222' },
 	{ saturation: -100 },
 	{ lightness: -79 },
 	{ visibility: 'on' }
 	]
 },{
 	featureType: 'road.local',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#222222' },
 	{ saturation: -100 },
 	{ lightness: -87 },
 	{ visibility: 'on' }
 	]
 },{
 	featureType: 'water',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#666666' },
 	{ saturation: -100 },
 	{ lightness: -47 },
 	{ visibility: 'on' }
 	]
 },{
 	featureType: 'landscape.natural',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#444444' },
 	{ saturation: -100 },
 	{ lightness: -72 },
 	{ visibility: 'on' }
 	]
 },{
 	featureType: 'transit',
 	elementType: 'all',
 	stylers: [
 	{ hue: '#2b2b2b' },
 	{ saturation: 0 },
 	{ lightness: -78 },
 	{ visibility: 'simplified' }
 	]
 }
 ];*/

 var styles = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]

 var options = {
 	mapTypeControlOptions: {
 		mapTypeIds: [ 'Styled']
 	},
 	center: new google.maps.LatLng(19.421633, -99.162613),
 	zoom: 13,
 	mapTypeId: 'Styled',
	//zoomControl: false,
	streetViewControl: false,
	overviewMapControl: false,
	mapTypeControl: false,
};

var div = document.getElementById('map');
var map = new google.maps.Map(div, options);
var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
var layer, layer2, layer3, layer4
var heatmap, heatmap2

function initialize(){
	map.mapTypes.set('Styled', styledMapType);

	var heatmap = new google.maps.visualization.HeatmapLayer({
		data: heatmapData
	});

	var gradient = [
	'rgba(0, 255, 255, 0)',
	'rgba(0, 255, 255, 1)',
	'rgba(0, 191, 255, 1)',
	'rgba(0, 127, 255, 1)',
	'rgba(0, 63, 255, 1)',
	'rgba(0, 0, 255, 1)',
	'rgba(0, 0, 223, 1)',
	'rgba(0, 0, 191, 1)',
	'rgba(0, 0, 159, 1)',
	'rgba(0, 0, 127, 1)',
	'rgba(63, 0, 91, 1)',
	'rgba(127, 0, 63, 1)',
	'rgba(191, 0, 31, 1)',
	'rgba(255, 0, 0, 1)'
	]

	var gradient2 = [
	'rgba(102,255,0,0)', 
	'rgba(147,255,0,1)', 
	'rgba(193,255,0,1)', 
	'rgba(238,255,0,1)', 
	'rgba(244,227,0,1)', 
	'rgba(244,227,0,1)', 
	'rgba(249,198,0,1)', 
	'rgba(255,170,0,1)', 
	'rgba(255,113,0,1)', 
	'rgba(255,57,0,1)', 
	'rgba(255,0,0,1)'
	]

	heatmap.set('radius', 15);
	heatmap.set('gradient', gradient);
	//heatmap.setMap(map);
	//////////////////////////////////////////////////////////

	var heatmap2 = new google.maps.visualization.HeatmapLayer({
		data: heatmapData2
	});
	
	heatmap2.set('radius', 10);
	heatmap2.set('gradient', gradient2);
	heatmap2.set("opacity", 0.4);
	//heatmap2.setMap(map);


	layer = new google.maps.FusionTablesLayer({
		query: {
			select: "col7",
			from: "1_feIi3FzByJjmV18wgwDjwpvpz-4JoU0NxmMoWI",
		}
	});

	layer.setMap(map);

	$('#accidentes').bind("change", function() {
		if($(this).is(":checked")) {
			heatmap.setMap(map);
		}
		else{
			heatmap.setMap(null);
		} 
	});


	$('#baches').bind("change", function() {
		if($(this).is(":checked")) {
			heatmap2.setMap(map);
		}
		else{
			heatmap2.setMap(null);
		} 
	});
}

google.maps.event.addDomListener(window, 'load', initialize);