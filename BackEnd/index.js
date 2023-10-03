require('dotenv').config()
const { Client } = require('@googlemaps/google-maps-services-js');
const express = require("express");
const api = require("./routes/api");

const client = new Client({});
const app = express();
const port = 3000;

app.use(express.json());

app.use("/api", api);

app.listen(port, function () {
  console.log(`Example app listening on port ${port}!`);
});

function distance(lat1, lat2, lon1, lon2)
{
// The math module contains a function
// named toRadians which converts from
// degrees to radians.
lon1 =  lon1 * Math.PI / 180;
lon2 = lon2 * Math.PI / 180;
lat1 = lat1 * Math.PI / 180;
lat2 = lat2 * Math.PI / 180;

// Haversine formula
let dlon = lon2 - lon1;
let dlat = lat2 - lat1;
let a = Math.pow(Math.sin(dlat / 2), 2)
+ Math.cos(lat1) * Math.cos(lat2)
* Math.pow(Math.sin(dlon / 2),2);

let c = 2 * Math.asin(Math.sqrt(a));

// Radius of earth in kilometers. Use 3956
// for miles
let r = 6371;

// calculate the result
return(c * r);
}

function adressToCoord(adress){ // Généré par Github Copilot
  client.geocode({
    params: {
      address: adress,
      key: process.env.GOOGLE_API_KEY,
    },
    timeout: 1000, // milliseconds
  }).then((r) => {
    console.log(r.data.results[0].geometry.location)
    let lat = r.data.results[0].geometry.location.lat;
    let long = r.data.results[0].geometry.location.lng;
    return {lat, long};
  }).catch((e) => {
    console.log(e.response.data.error_message);
  });
}