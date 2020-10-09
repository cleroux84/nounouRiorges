

let mymap = L.map('map').setView([46.04458999633789, 4.03352165222168], 30);

let marker = L.marker([46.04458999633789, 4.03352165222168]).addTo(mymap); 
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic291MTIwMSIsImEiOiJja2Z4cTVtYXIwMGd3MnVvYjhlZTZzOXQ5In0.57jfhOgMezPmmVZ_b4SHIw '
}).addTo(mymap);

/* L.popup()
    .setLatLng([46.04458999633789, 4.03352165222168])
    .setContent("I am a standalone popup.")
    .openOn(mymap); */ 

/* let test = 'https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyBMe0i4JuejdKoSlVcz6YKOfs55hld2w24'
console.log(test); */

