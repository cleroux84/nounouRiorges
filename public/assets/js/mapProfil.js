let latitude = document.querySelector("#lat").innerHTML;
let longitude = document.querySelector("#long").innerHTML;
let nom = document.querySelector("#nom").innerHTML;

let mymap = L.map('map').setView([`${latitude}`, `${longitude}`], 15);
L.popup()
    .setLatLng([`${latitude}`, `${longitude}`])
    .setContent(`${nom}`)
    .openOn(mymap); 
/* let markerProfil = L.marker([`${latitude}`, `${longitude}`], 13).addTo(mymap);  */
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic291MTIwMSIsImEiOiJja2Z4cTVtYXIwMGd3MnVvYjhlZTZzOXQ5In0.57jfhOgMezPmmVZ_b4SHIw '
}).addTo(mymap);
