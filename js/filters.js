var lines  = new Array()
var lineCoordinates = new Array()

$(document).ready(function(){

	$('#refreshHour').click( function(event) {
		event.preventDefault()
		
		/*if ($("#minutetxt").val() < 10) {
			minute = "0"+ $("#minutetxt").val()
		};
		if ($('#hourtxt').val() < 10) {
			hour = "0"+ $("#hourtxt").val()
		};*/
		var valueSelect =  $("#hourtxt").val() + ":" + $("#minutetxt").val()    
		console.log(valueSelect)
		$.ajax({
			type: "POST",
			url: "../data/horaDia",
			data: {
				"hora"	:	valueSelect
			},
			dataType: "json",
			success: buildmap,
			error: showerror
		})
	})

})

function buildmap(response){
	$("#map-resultados").html( response.hora + " viajes.")
	
	for (var i = lines.length - 1; i >= 0; i--) {
		lines[i].setMap(null);
		lines[i] = null;
	};

	//lines = new Array()
	//lineCoordinates = new Array()

	var cont = 0;

	

	$.each(response.estaciones.llegada, function(key, value){
		lineCoordinates[cont] = [ new google.maps.LatLng(response.estaciones.salida[cont].latitude, response.estaciones.salida[cont].longitude ) ,
		new google.maps.LatLng(response.estaciones.llegada[cont].latitude, response.estaciones.llegada[cont].longitude )		]

		lines[cont] = new google.maps.Polyline({
			path: lineCoordinates[cont],
			icons: [{
				icon: lineSymbol,
				offset: '100%'
			}],
			map: map
		});

		cont++;
	})

}

function showerror(response){
	console.log(response)
}