//funcion para marcar  ubicacion
function marcar(latitud,longitud){
    var lat = latitud;
    var lng = longitud;
    console.log(lat + '=>' + lng);
    //asignando valor al div
    document.getElementById('id_lat').value = lat;
    document.getElementById('id_lng').value = lng;
    var map = L.map('mapa').setView([lat, lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; OpenStreetMap contributors',
        maxZoom: 20
    }).addTo(map);
    //
    var initialMarker = L.marker([lat, lng]).addTo(map);
    var userMarker = null; // Variable para almacenar el marcador seleccionado por el usuario

    map.on('click', function(e) {
        // Si el marcador de usuario ya existe, lo eliminamos
        if (userMarker) {
            map.removeLayer(userMarker);
        }

        // Eliminamos el marcador inicial (ubicación actual)
        map.removeLayer(initialMarker);
        // Actualizamos las variables lat y lng con las coordenadas seleccionadas por el usuario
        lat = e.latlng.lat;
        lng = e.latlng.lng;

        // Creamos un nuevo marcador en la posición seleccionada por el usuario
        userMarker = L.marker(e.latlng, { draggable: true }).addTo(map);
        userMarker.bindPopup("" + e.latlng).openPopup();
        
        // Imprimimos las nuevas coordenadas en la consola
        console.log('lat', lat,'lng', lng);
        //asignando valor al div
        document.getElementById('id_lat').value = lat;
        document.getElementById('id_lng').value = lng;

        // Cuando se haga clic en el marcador, se eliminará
        userMarker.on('click', function() {
            map.removeLayer(userMarker);
            userMarker = null;
        });
    });

    initialMarker.on('click', function() {
        // Si hay un marcador de usuario, lo eliminamos
        if (userMarker) {
            map.removeLayer(userMarker);
            userMarker = null;
        }
    });
    $('#mostrarmapa').removeClass('fade').addClass('show'); 
    $('#mostrardelivery').removeClass('fade').addClass('show'); 
} 
function initMap(lat,lng,empresa,direccion){
    var lat = lat;
    var lng = lng;
    console.log(lat + '=>' + lng);
    var map = L.map('mapa').setView([lat, lng], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; OpenStreetMap contributors',
        maxZoom: 20
    }).addTo(map);
    //
    var initialMarker = L.marker([lat, lng]).addTo(map);

}
function initMap(lat,lng,empresa,direccion){
    var lat = lat;
    var lng = lng;
    console.log(lat + '=>' + lng);
    var map = L.map('mapa').setView([lat, lng], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; OpenStreetMap contributors',
        maxZoom: 20
    }).addTo(map);
    //
    var initialMarker = L.marker([lat, lng]).addTo(map);

}