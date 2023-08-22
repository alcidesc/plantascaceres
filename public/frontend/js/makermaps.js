function initialize(lat, lng){

    $('#id_lat').val( lat );
    $('#id_lng').val( lng );

    var GLatLng = new google.maps.LatLng(lat, lng);

    var mapSettings = {
        center: GLatLng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map($('#mapa').get(0), mapSettings);

    var marker = new google.maps.Marker({
        position: GLatLng,
        map: map,
        draggable: true,
        title: 'Arrastrame!'
    });

    

    google.maps.event.addListener(marker, 'position_changed', function(){
        getMarkerCoords(marker);
    });
}

function getMarkerCoords(marker){
    var markerCoords = marker.getPosition();
    $('#id_lat').val( markerCoords.lat() );
    $('#id_lng').val( markerCoords.lng() );
}