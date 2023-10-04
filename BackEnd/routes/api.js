const { Client } = require('@googlemaps/google-maps-services-js');
const client = new Client({});

require('dotenv').config()

const express = require("express");
const router = express.Router();

let users = [{ email: "test@gmail.com", password: "test", name: "Chevalier", firstName: "Théo" }];

router.post("/signup", async (req, res) => {
    //Inscription
    var found = users.find(x => x.email === req.body.email)
    if (found === undefined) {
        users.push(req.body)
        res.send("User created")
    }
    else {
        res.send("User already exist")
    }
});
router.post("/signin", async (req, res) => {
    //Connexion
    var found = users.find(x => x.email === req.body.email)
    if (found === undefined) {
        users.push(req.body)
        res.send("User doesn't exist")
    }
    else {
        res.send("Connected")
    }
});
router.post("/publish", async (req, res) => {
    // Parametre Adresse Heure date Nb de passagers
    res.send("Trajet publié");
});
router.delete("/deleteRide", async (req, res) => {
    // Supprimer un trajet
});
router.get("/rides", async (req, res) => {
    // Recuperer les trajets
});
router.get("/ridesInsideRadius", async (req, res) => {
    // Recuperer les trajets dans un rayon
    //47.210079 -1.5472952
    // 47.205997467041016 -1.538791537284851
    let center = req.body.center;
    let radius = req.body.radius;
    //let distance = utilities.distance(47.210079, -1.5472952, 47.205997467041016, -1.538791537284851);
    client.geocode({
        params: {
            address: center,
            key: process.env.GOOGLE_API_KEY,
        },
        timeout: 1000, // milliseconds
    }).then((r) => {
        center = r.data.results[0].geometry.location;
        console.log(center);
        let distanceT = distance(center.lat, center.lng, 47.2101169, -1.5491591);
        console.log(distanceT);
        res.send((distanceT ).toString());
        //res.send(r.data.results[0].geometry.location);
    }).catch((e) => {
        console.log(e.response.data.error_message);
    });
});
router.get("/autocomplete", async (req, res) => {
    let input = req.body.input; 
    client.placeAutocomplete({
        params: {
            input: input,
            key: process.env.GOOGLE_API_KEY,
        },
        timeout: 1000, // milliseconds
    }).then((r) => {
        console.log(r.data.predictions);
        res.send(r.data.predictions);
    }).catch((e) => {
        console.log(e.response.data.error_message);
    })
});
const distance = (lat1, lon1, lat2, lon2) => //https://www.geeksforgeeks.org/program-distance-two-points-earth/
{
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
}



module.exports = router;