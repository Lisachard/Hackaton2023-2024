require('dotenv').config()
const { Client } = require('@googlemaps/google-maps-services-js');

const express = require("express");
const router = express.Router();

let users = [{email:"test@gmail.com", password:"test", name:"Chevalier", firstName:"Théo"}];

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
    let center = req.body.center;
    res.send()
});

module.exports = router;