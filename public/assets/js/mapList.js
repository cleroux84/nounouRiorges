let macarte = L.map('macarte').setView([46.0345572, 4.0729178], 15);

let latitude = document.querySelectorAll(".latitude").innerHTML;
let longitude = document.querySelectorAll(".longitude").innerHTML;

let markerProfil = L.marker([46.0165084, 4.0844663], 13).addTo(macarte); 

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic291MTIwMSIsImEiOiJja2Z4cTVtYXIwMGd3MnVvYjhlZTZzOXQ5In0.57jfhOgMezPmmVZ_b4SHIw '
}).addTo(macarte);

