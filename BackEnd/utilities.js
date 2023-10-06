const { Client } = require('@googlemaps/google-maps-services-js');
const client = new Client({});

const jwt = require("jsonwebtoken");
require('dotenv').config()

module.exports = {
  generateAccessToken: function (email) { // A function used to generate a token for the user
    return jwt.sign({ email: email }, process.env.JWT_KEY, { expiresIn: '1h' });
  },

  distance: function (lat1, lon1, lat2, lon2) { //https://www.geeksforgeeks.org/program-distance-two-points-earth/ A function used to calculate the distance between two points on earth
    console.log(lat1, lon1, lat2, lon2);
    // The math module contains a function
    // named toRadians which converts from
    // degrees to radians.
    lon1 = lon1 * Math.PI / 180;
    lon2 = lon2 * Math.PI / 180;
    lat1 = lat1 * Math.PI / 180;
    lat2 = lat2 * Math.PI / 180;

    // Haversine formula
    let dlon = lon2 - lon1;
    let dlat = lat2 - lat1;
    let a = Math.pow(Math.sin(dlat / 2), 2)
      + Math.cos(lat1) * Math.cos(lat2)
      * Math.pow(Math.sin(dlon / 2), 2);

    let c = 2 * Math.asin(Math.sqrt(a));

    // Radius of earth in kilometers. Use 3956
    // for miles
    let r = 6371;

    // calculate the result
    return (c * r);
  },

  addressToCoord: function (address) { // A function used to convert an address to coordinates using the Google Maps API
    client.geocode({
      params: {
        address: address,
        key: process.env.GOOGLE_API_KEY,
      },
      timeout: 1000, // milliseconds
    }).then((r) => {
      console.log(r.data.results[0].geometry.location);
      return r.data.results[0].geometry.location;
    }).catch((e) => {
      console.log(e.response.data.error_message);
    })
  },
};