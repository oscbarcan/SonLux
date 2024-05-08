document.addEventListener("DOMContentLoaded", function () {
    var divActual = 1;
    var botonContinuar = document.getElementById("continuar");
    var botonAtras = document.getElementById("atras");
    var drawnItems = new L.FeatureGroup();
    var m2 = document.getElementById("m2");
    var cards = document.querySelectorAll('.card');
    var radioButtons = document.querySelectorAll('input[type=radio]');

    botonContinuar.addEventListener("click", function () {
        document.getElementById("div" + divActual).style.display = "none";
        divActual++;
        document.getElementById("div" + divActual).style.display = "block";

        if (divActual > 1) {
            botonAtras.style.display = "inline-block";
        }
        if (divActual == 4) {
            botonContinuar.style.display = "none";
            document.getElementById("enviar").style.display = "inline-block";
        }
    });

    botonAtras.addEventListener("click", function () {
        document.getElementById("div" + divActual).style.display = "none";
        divActual--;
        document.getElementById("div" + divActual).style.display = "block";

        if (divActual == 1) {
            botonAtras.style.display = "none";
        }
        if (divActual < 4) {
            botonContinuar.style.display = "inline-block";
            document.getElementById("enviar").style.display = "none";
        }
    });



    // Mapa Leaflet
    var map = L.map("map").setView([39.47, -0.38], 13);
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

    // Agregar capa de dibujo al mapa
    var drawControl = new L.Control.Draw({
        draw: {
            polygon: true, // Permitir dibujar polígonos
            marker: false,
            circle: false,
            rectangle: false,
            polyline: false,
        },
        edit: {
            featureGroup: drawnItems,
        },
    });

    // Agregar control de dibujo al mapa
    map.addControl(drawControl);

    // Video Indio
    var drawnFeatures = new L.FeatureGroup();
    map.addLayer(drawnFeatures);

    // Escuchar evento de dibujo terminado
    map.on("draw:created", function (e) {
        var layer = e.layer;
        drawnItems.addLayer(layer);
        drawnFeatures.addLayer(layer);

        // Obtener el área del polígono
        var area = L.GeometryUtil.geodesicArea(layer.getLatLngs()[0]); // Obtener los puntos del polígono y calcular el área

        // Convertir el área a metros cuadrados (suponiendo que la proyección del mapa sea en metros)
        area = Math.abs(area); // Asegurar un valor positivo
        var areaMetrosCuadrados = area.toFixed(2); // Redondear el resultado a dos decimales

        m2.textContent = areaMetrosCuadrados + "m2";
        // Mostrar área al usuario
        // alert('Área seleccionada: ' + areaMetrosCuadrados + ' metros cuadrados');
    });

    // radioButtons.forEach(function(radioButton) {
    //     radioButton.addEventListener('change', function() {
    //         cards.forEach(function(card) {
    //             card.classList.remove('clicked');
    //         });
    //         var selectedCard = document.getElementById('card-' + this.value);
    //         console.log(this.value)
    //         selectedCard.classList.add('clicked');
    //     });
    // });
});
