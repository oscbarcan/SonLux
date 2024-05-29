document.addEventListener("DOMContentLoaded", function () {
    var divActual = 1;
    var botonContinuar = document.getElementById("continuar");
    var botonAtras = document.getElementById("atras");
    var botonEnviar = document.getElementById("enviar");
    var formulario = document.getElementById("formulario");

    botonContinuar.addEventListener("click", function () {
        if (validarDiv(divActual)) {
            mostrarDiv(divActual + 1);
        }
    });

    botonAtras.addEventListener("click", function () {
        mostrarDiv(divActual - 1);
    });

    botonEnviar.addEventListener("click", function (event) {
        if (!validarDiv(divActual)) {
            event.preventDefault();
        }
    });

    function mostrarDiv(numeroDiv) {
        document.getElementById("div" + divActual).style.display = "none";
        divActual = numeroDiv;
        document.getElementById("div" + divActual).style.display = "block";

        if (divActual > 1) {
            botonAtras.disabled = false;
            botonAtras.classList.remove("boton-desactivado");
        } else {
            botonAtras.disabled = true;
            botonAtras.classList.add('boton-desactivado');
        }

        if (divActual === 4) {
            botonContinuar.style.display = "none";
            botonEnviar.style.display = "inline-block";
        } else {
            botonContinuar.style.display = "inline-block";
            botonEnviar.style.display = "none";
        }
    }

    function validarDiv(numeroDiv) {
        var div = document.getElementById("div" + numeroDiv);
        var grupos = div.querySelectorAll(".tipo-casa, .tipo-almacenamiento, .puntos-cardinales, .tipo-electricidad, .tipo-cargador");
        var valid = true;

        grupos.forEach(function (grupo) {
            var inputs = grupo.querySelectorAll("input[required]");
            var grupoValido = Array.from(inputs).some(input => input.checked);

            if (!grupoValido) {
                inputs.forEach(input => input.parentElement.classList.add("invalid"));
                valid = false;
            } else {
                inputs.forEach(input => input.parentElement.classList.remove("invalid"));
            }
        });

        return valid;
    }

    // Mapa Leaflet y otras configuraciones existentes
    var drawnItems = new L.FeatureGroup();
    var m2 = document.getElementById("m2");
    var superficie = document.getElementById("superficie");

    var map = L.map("map").setView([39.47, -0.38], 13);
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

    var drawControl = new L.Control.Draw({
        draw: {
            polygon: true,
            marker: false,
            circle: false,
            rectangle: false,
            polyline: false,
        },
        edit: {
            featureGroup: drawnItems,
        },
    });

    map.addControl(drawControl);
    map.addLayer(drawnItems);

    map.on("draw:created", function (e) {
        var layer = e.layer;
        drawnItems.addLayer(layer);

        var area = L.GeometryUtil.geodesicArea(layer.getLatLngs()[0]);
        var areaMetrosCuadrados = Math.abs(area).toFixed(2);

        m2.textContent = areaMetrosCuadrados + "m2";
        superficie.value = areaMetrosCuadrados;
    });
});
