const express = require("express");
const jwt = require("jsonwebtoken");
const api = require("./routes/api");
const fs = require("fs");

const app = express();
const port = 3000;

const authenticateToken = function (req, res, next) {

  next(); // Call next() so Express will call the next middleware function in the chain.
};

const checkRequestParam = function (req, res, next) {
  let route = req.originalUrl.match(/\/api\/(.*)/)[1];
  let bodyParams;
  let rawData = fs.readFile('./body_parameters.json', (err, data) => {
    if (err) throw err;
    bodyParams = JSON.parse(data);

    for (const [key, value] of Object.entries(bodyParams[route])) {
      if (!Object.hasOwn(req.body, key)) return res.status(400).send("Missing parameters");
    }
  });

  next(); // Call next() so Express will call the next middleware function in the chain.
};

app.use(express.json());

app.use(authenticateToken);

//app.use(checkRequestParam);

app.use("/api", api);

app.listen(port, function () {
  console.clear();
  console.log(`Nudge API is running on port ${port}!`);
});