$(document).ready(function(){

	$('input[name=sexo]').change( function() {
		var valueSelect = $('input[name=sexo]:checked').val()
		//console.log(valueSelect)
		$.ajax({
			type: "POST",
			url: "../data/usuarios",
			data: {
				"sexo"	:	valueSelect
			},
			dataType: "json",
			success: buildgraph,
			error: showerror
		})
	})

})

function buildgraph(response){
	//console.log(response)
	$(".total h4").html(response["total"])
	var delegacion = new Array();
	var numbers = new Array();
	var cont = 0;
	$.each( response.delegacion, function( key, value ) {
		delegacion[cont] = [ response.delegacion[cont].delegacion]
		numbers[cont] = parseInt(response.delegacion[cont].count)
		cont++;
	});

	//console.log(delegacion);

	var plot1 = $.jqplot ('graphDelegacion', [numbers], {
		seriesDefaults: {
			renderer:$.jqplot.BarRenderer,
			rendererOptions: {
				barPadding: 130,
				varyBarColor: true,
				barWidth: 60,
				//barDirection : 'horizontal'
			},
			pointLabels: { show: false }
		},
		axes: {
			xaxis: {
				renderer: $.jqplot.CategoryAxisRenderer,
				rendererOptions: {
					tickRenderer: $.jqplot.DateTickRenderer,
				}
			}
		},
		highlighter: {
			show:true,
			tooltipLocation: 'n',
			tooltipAxes: 'pieref',
			tooltipAxisX: 20,
			tooltipAxisY: 20,
			useAxesFormatters: false,
			formatString:'%s, %P',
		}
	});

	//$('#graphDelegacion .jqplot-series-canvas:first').css( "z-index", 99999);


	$('#graphDelegacion').bind('jqplotDataHighlight', function (ev, seriesIndex, pointIndex, data) {
		//alert("na")
		//console.log(ev + "\n" + seriesIndex + "\n" + pointIndex + "\n" + data)
		var data1 = data+""
		var data2 = data1.split(",")
		$('#info2').html('Delegacion: '+delegacion[pointIndex]+ ', Usuarios: '+ data2[1]);
	});

	$('#graphDelegacion').bind('jqplotDataUnhighlight', function (ev) {
		$('#info2').html('Sin selección');
	});
}

function showerror(response){
	console.log(response.toString())
}

