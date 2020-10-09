let latitude = document.querySelector("#lat").innerHTML;
let longitude = document.querySelector("#long").innerHTML;
console.log(longitude, latitude);


let mymap = L.map('map').setView([`${latitude}`, `${longitude}`], 13);

let markerProfil = L.marker([`${latitude}`, `${longitude}`], 13).addTo(mymap); 
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic291MTIwMSIsImEiOiJja2Z4cTVtYXIwMGd3MnVvYjhlZTZzOXQ5In0.57jfhOgMezPmmVZ_b4SHIw '
}).addTo(mymap);

/* L.popup()
    .setLatLng([46.04458999633789, 4.03352165222168])
    .setContent("I am a standalone popup.")
    .openOn(mymap); */ 



