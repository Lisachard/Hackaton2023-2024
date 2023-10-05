const { Client } = require('@googlemaps/google-maps-services-js');
const client = new Client({});

require('dotenv').config()

const express = require("express");
const mysql = require("mysql");
const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");
const router = express.Router();

let con = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DATABASE
});

con.connect(function (err) {
    if (err) throw err;
    console.log("Connected to the database");
});

router.post("/signup", async (req, res) => {
    //Inscription parametre email password nom prenom
    let query = `SELECT * FROM client WHERE email = ` + mysql.escape(req.body.email);
    con.query(query, function (err, result, fields) {
        if (err) throw err;
        if (result.length > 0) {
            res.send("User already exists");
        }
        else {
            query = `INSERT INTO client (email, mot_de_passe, last_name, first_name) VALUES (` + mysql.escape(req.body.email) + `, ` + mysql.escape(bcrypt.hashSync(req.body.password, 8)) + `, ` + mysql.escape(req.body.name) + `, ` + mysql.escape(req.body.firstName) + `)`;
            con.query(query, function (err, result, fields) {
                if (err) throw err;
            })
            console.log("User created");
            res.send(result);
        }
    });
});
router.post("/signin", async (req, res) => {
    //Connexion
});
router.post("/publish", async (req, res) => {
    // Parametre Adresse Heure date Nb de passagers Direction
    for (const [key, value] of Object.entries(req.body)) {
        if(`${value}` === undefined) res.send("Missing parameter");
        else {
            let query = `INSERT INTO trajet (adresse, heure, date, nb_passagers, direction) VALUES (` + mysql.escape(req.body.addresse) + `, ` + mysql.escape(req.body.heure) + `, ` + mysql.escape(req.body.date_trajet) + `, ` + mysql.escape(req.body.direction) + `)`;
            res.send("Trajet publié");
        } 
    }
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
    client.geocode({
        params: {
            address: center,
            radius: radius,
            key: process.env.GOOGLE_API_KEY,
        },
        timeout: 1000, // milliseconds
    }).then((r) => {
        center = r.data.results[0].geometry.location;
        console.log(center);
        let distanceT = distance(center.lat, center.lng, 47.2101169, -1.5491591);
        console.log(distanceT);
        res.send((distanceT).toString());
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

function generateAccessToken(username) {
    return jwt.sign(username, process.env.TOKEN_SECRET, { expiresIn: '1800s' });
}

module.exports = router;