//Create map
const map = L.map('mapid').setView([-23.55252191865054, -46.69720574346255], 20)

//create and add tileLayer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map)

//create icon 
const icon = L.icon({
    iconUrl: "/images/map-marker.svg",
    iconSize: [58, 68],
    iconAnchor: [29, 68],
    popupAnchor: [170, 2]
})

var marker = L.marker([-23.55252191865054, -46.69720574346255]).addTo(map);
