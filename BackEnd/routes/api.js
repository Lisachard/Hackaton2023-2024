const { Client } = require('@googlemaps/google-maps-services-js');
const client = new Client({});

const express = require("express");
const router = express.Router();

const mysql = require("mysql");
const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");
require('dotenv').config()

const authenticateToken = require("../middlewares/authentificateToken");
const utilities = require("../utilities");

let con = mysql.createConnection({ //Necessary informations to connect to the database, doens't take .env variables for a reason
    host: process.env.MYSQL_HOST,
    user: process.env.MYSQL_USER,
    password: process.env.MYSQL_PASSWORD,
    database: process.env.MYSQL_DATABASE
});

con.connect(function (err) { //Connect to the database
    if (err) throw err;
    console.log("Connected to the database");
});

router.post("/signup", async (req, res) => {    //Route to create a new user
    //Inscription parametre email password nom prenom
    let query = `SELECT * FROM client WHERE email = ` + mysql.escape(req.body.email);
    con.query(query, function (err, result, fields) {
        if (err) throw err;
        if (result.length > 0) {
            res.send("User already exists");
        }
        else {
            query = `INSERT INTO client (email, password, last_name, first_name) VALUES (` + mysql.escape(req.body.email) + `, ` + mysql.escape(bcrypt.hashSync(req.body.password, 8)) + `, ` + mysql.escape(req.body.lastName) + `, ` + mysql.escape(req.body.firstName) + `)`;
            con.query(query, function (err, result, fields) {
                if (err) throw err;
            })
            console.log("User created");
            res.status(201).send({
                token: utilities.generateAccessToken(req.body.email)
            }); // Replace by sending user informations and generated token
        }
    });
});
router.post("/signin", async (req, res) => {    //Route to connect an existing user
    //Connexion
    let query = `SELECT * FROM client WHERE email = ` + mysql.escape(req.body.email);
    con.query(query, function (err, result, fields) {
        if (err) throw err;
        if (result.length > 0) {
            if (bcrypt.compareSync(req.body.password, result[0].password)) {
                res.status(200).send({
                    token: utilities.generateAccessToken(req.body.email)
                }); // Replace by sending user informations and generated token
            }
            else {
                res.send("Wrong password");
            }
        }
        else {
            res.send("User doesn't exist");
        }
    });
});
router.post("/publish", authenticateToken, async (req, res) => {   //Route to publish a ride
    // Parametre Adresse Heure date Nb de passagers Direction
    let query = `INSERT INTO ride (address, time, date, client, direction) VALUES (` + mysql.escape(req.body.address) + `, ` + mysql.escape(req.body.time) + `, ` + mysql.escape(req.body.date) + `, ` + mysql.escape(req.user.email) + `, ` + mysql.escape(req.body.direction) + `)`;
    con.query(query, function (err, result, fields) {
        if (err) throw err;
        res.send("Trajet publié");
    });
});
router.delete("/deleteRide", authenticateToken, async (req, res) => {  //Route to delete a ride
    // Supprimer un trajet
});
router.get("/rides", authenticateToken, async (req, res) => {  //Route to get all rides
    let query = `SELECT * FROM ride`;
    con.query(query, function (err, result, fields) {
        if (err) throw err;
        res.send(result);
    });
});
router.get("/ridesInsideRadius", authenticateToken, async (req, res) => { //Route to get all rides from a user defined center point inside a radius
    // Recuperer les trajets dans un rayon
    let center = req.body.center;
    let radius = req.body.radius;

    let centerCoord = utilities.addressToCoord(center);
    console.log(centerCoord);
    // let distanceT = utilities.distance(center.lat, center.lng, 47.2101169, -1.5491591);
    // console.log(distanceT);
    // res.send((distanceT).toString());
    res.send("Trajets dans un rayon");
});
router.get("/autocomplete", authenticateToken, async (req, res) => { //Route used to autocomplete when searching an address, to be implemented in the front end
    let input = req.body.input;
    client.placeAutocomplete({
        params: {
            input: input,
            key: process.env.GOOGLE_API_KEY,
        },
        timeout: 1000, // milliseconds
    }).then((r) => {
        //console.log(r.data.predictions);
        res.send(r.data.predictions);
    }).catch((e) => {
        console.log(e.response.data.error_message);
    })
});
router.get("/user", authenticateToken, async (req, res) => { //Route to get user informations
    let query = `SELECT * FROM client WHERE email = ` + mysql.escape(req.user.email);
    con.query(query, function (err, result, fields) {
        if (err) throw err;
        res.send(result[0]);
    });
});
module.exports = router;