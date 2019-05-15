$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });
	/*Auto completado de dirección*/
	var autocomplete = new google.maps.places.Autocomplete(document.getElementById('txtlocation'));
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        /*Guardar en la DB!!! */
        var dataloc = { "direct": place.formatted_address, 
        "lat": place.geometry.location.lat(), 
        "long": place.geometry.location.lng(),
        "widht":parseFloat(document.getElementById('txtxWidth').value),
        "height": parseFloat(document.getElementById('txtHeight').value)};
	});
});
function initAutocomplete() {
   

        console.log(dataloc);
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: dataloc["lat"], lng: dataloc["long"] },
            zoom: 8
        });
        const marker = new google.maps.Marker({
            map: map,
            position:  { lat: dataloc["lat"], lng: dataloc["long"] },
            visible: true
        })
        //$("#map").addClass("map")
   

}