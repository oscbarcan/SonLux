document.addEventListener("DOMContentLoaded", function () {
    // Mapa Leaflet
    var map = L.map("map").setView([39.47, -0.38], 13);
    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);

    L.marker([39.47, -0.38]).addTo(map)
    .bindPopup('Estamos Aqui!.')
    .openPopup();
});

