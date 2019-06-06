( function ( $ ) {
    "use strict";

    //bar chart
    var ctx = document.getElementById( "barChart" );
    //    ctx.height = 200;
    var meses = [];
    var ingresos = [];

    var mesesB = [];
    var datosB = [];

    $.ajax({
		type: "POST",
        url: './controllers/getIngresos.php',
        async:false,
		data: {
			duenio:1
		}
	}).done(function(data) {
		//console.log("Se ha recibido respuesta del servidor.");
        var datos = JSON.parse(data);
        meses.push( datos['1']['meses'] );
        meses.push( datos['3']['meses'] );
        ingresos.push( datos['1']['ingresos'] );
        ingresos.push( datos['3']['ingresos'] );
		//console.log(tabla);
	}).fail(function( jqXHR, textStatus, errorThrown ) {
		console.log("Ha habido un error:\n");
		console.log(textStatus);
		$("#boton").attr("disabled", false);
	});

    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: meses[0],//[ "Marzo", "Abril", "Mayo", "Junio"],
            datasets: [
                {
                    label: "ABD-F29",
                    data: ingresos[0],//[ 507000, 509000, 206500, 186000, 375000, 225000, 210000 ],
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                }
            ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );

    //bar chart
    var ctx = document.getElementById( "barChart2" );
    //    ctx.height = 200;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: meses[1],//[ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio" ],
            datasets: [
                {
                    label: "CFG-156",
                    data: ingresos[1], //[ 280000, 480000, 400000, 190000, 208000, 270000, 450000 ],
                    borderColor: "rgba(0,0,0,0.1)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0,0,0,0.3)"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );


} )( jQuery );