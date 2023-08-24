function calculartiempo(latituduser, longituduser, latitud, longitud, costodelivery, tipo, limite, totalcostoproducto) {
        console.log("Ingresó en calculartiempo");
        var lat = latituduser;
        var lon = longituduser;
        var lat1 = latitud;
        var lng1 = longitud;
        lat1 = gradosARadianes(lat1);
        lng1 = gradosARadianes(lng1);
        lat = gradosARadianes(lat);
        lon = gradosARadianes(lon);
        console.log("Empresa:", lat1, lng1);
        console.log("Persona:", lat, lon);
        // Aplicar fórmula para calcular la distancia en kilómetros
        const RADIO_TIERRA_EN_KILOMETROS = 6371;
        let diferenciaEntreLongitudes = lng1 - lon;
        let diferenciaEntreLatitudes = lat1 - lat;
        console.log("diferenciaEntreLongitudes:", diferenciaEntreLongitudes);
        console.log("diferenciaEntreLatitudes:", diferenciaEntreLatitudes);
        let a = Math.pow(Math.sin(diferenciaEntreLatitudes / 2.0), 2) + Math.cos(lat1) * Math.cos(lat) * Math.pow(Math.sin(diferenciaEntreLongitudes / 2.0), 2);
        let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        let distanciaEnKilometros = RADIO_TIERRA_EN_KILOMETROS * c;
        console.log("a:", a);
        console.log("c:", c);
        console.log("distanciaEnKilometros:", distanciaEnKilometros);

        // Multiplicar la distancia por la cotización y redondear al entero mayor más cercano
        let distanciaMultiplicada = Math.ceil(distanciaEnKilometros * costodelivery);
        console.log("Distancia multiplicada:", distanciaMultiplicada);

        // Actualizar el elemento HTML con el costo del delivery
        var elementoDelivery = document.getElementById("costrarcostodelivery");
        if (elementoDelivery) {
            elementoDelivery.innerHTML = distanciaMultiplicada + " ₲";
        }
    function gradosARadianes(grados) {
        return (grados * Math.PI) / 180;
    }
    return distanciaMultiplicada;
}
