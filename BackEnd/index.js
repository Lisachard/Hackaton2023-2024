require('dotenv').config()
const { Client } = require('@googlemaps/google-maps-services-js');
const express = require("express");

const client = new Client({});
const app = express();
const port = 3000;

app.get("/:adress", function (req, res) {
  res.send("test\n" + process.env.TEST);
});

app.listen(port, function () {
  console.log(`Example app listening on port ${port}!`);
  console.log(process.env.GOOGLE_API_KEY);
});