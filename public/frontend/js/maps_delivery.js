function calculartiempo(latitud,longitud,tipo,cotizaciondelivery,limite,totalcostoproducto){
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(objPosition){
            var lon = objPosition.coords.longitude;
            var lat = objPosition.coords.latitude;
            var persona = lat+","+lon;
            var lat1 = latitud;
            var lng1 = longitud;
            var empresa = lat1+","+lng1;

            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [persona],
                destinations: [empresa],
                travelMode: google.maps.TravelMode.DRIVING,
                avoidHighways: false,
                avoidTolls: false
            }, callback);

            function callback(response, status) {
                if (status != google.maps.DistanceMatrixStatus.OK) {
                    console.log(err);
                } else {
                    var origin = response.originAddresses[0];
                    var destination = response.destinationAddresses[0];
                    if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                        document.getElementById("error").innerHTML = "No pudimos establecer rutas desde " 
                          + origin + " y " + destination;
                        $('#error').removeClass('fade').addClass('show'); 
                    } else {
                        var distance = response.rows[0].elements[0].distance;
                        var duration = response.rows[0].elements[0].duration;
                        var distance_value = distance.value;
                        var distance_text = distance.text;
                        var duracion_text = duration.text;
                        var miles = distance_text.substring(0, distance_text.length - 3);
                        var calculodistancia=parseInt(distance_value)/1000;
                        
                        if (calculodistancia > limite) {
                            document.getElementById("error").innerHTML = "Lo sentimos, no se encuentra en nuestra zona de delivery, igualmente puede realizar su pedido y nos comunicaremos con Usted";
                            $('#error').removeClass('fade').addClass('show');
                        }
                        if (tipo == 'kilometro') {
                            var calculocostodistancia = Math.round((parseInt(distance_value)/1000)*parseInt(cotizaciondelivery));
                            document.getElementById('costrarcostodelivery').innerHTML=' '+calculocostodistancia+' ₲';
                            var pagar = parseInt(calculocostodistancia)+parseInt(totalcostoproducto);
                            document.getElementById('totalapagar').innerHTML=' '+pagar+' ₲';
                            document.getElementById('costodelivery').innerHTML=' '+calculocostodistancia;
                        }
                        if (tipo == 'fijo') {
                            var pagar = parseInt(cotizaciondelivery)+parseInt(totalcostoproducto);
                            document.getElementById('totalapagar').innerHTML=' '+pagar+' ₲';
                            document.getElementById('costodelivery').innerHTML=' '+cotizaciondelivery;
                        }
                    }
                }
            }
            //dibujar en el mapa la trayectoria

            var directionsService = new google.maps.DirectionsService;
            var directionsRenderer = new google.maps.DirectionsRenderer;

            var map = new google.maps.Map(document.getElementById('mapa'), {
                zoom: 6,
                center: {lat: 41.85, lng: -87.65}
            });

            directionsRenderer.setMap(map);

            calculateAndDisplayRoute(directionsService, directionsRenderer, lat, lon, latitud, longitud);

        }, function(objPositionError){
            switch (objPositionError.code)
            {
                case objPositionError.PERMISSION_DENIED:
                    alert("Negaste el acceso a tu ubicación, favor activa tu ubicación GPS");
                break;
                case objPositionError.POSITION_UNAVAILABLE:
                    alert("No se ha podido acceder a la información de su posición.");
                break;
                case objPositionError.TIMEOUT:
                    alert("El servicio ha tardado demasiado tiempo en responder, vuelve a intentarlo.");
                break;
                default:
                    document.getElementById("error").innerHTML = "Error desconocido.";
                    $('#error').removeClass('fade').addClass('show'); 
            }
        }, {
            maximumAge: 75000,
            timeout: 15000
        });
    }else{
        document.getElementById("error").innerHTML = "Su navegador no soporta la API de geolocalización.";
        $('#error').removeClass('fade').addClass('show'); 
    }

   
}

function calculateAndDisplayRoute(directionsService, directionsRenderer, origen, destino, latitud, longitud) {
    var waypts = [];

    directionsService.route({
      origin: new google.maps.LatLng(origen,destino),
      destination: new google.maps.LatLng(latitud,longitud),
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsRenderer.setDirections(response);
        
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
}