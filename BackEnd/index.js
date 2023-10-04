require('dotenv').config()
const express = require("express");
const api = require("./routes/api");

const app = express();
const port = 3000;

const a_middleware_function = function (req, res, next) {
  console.log("Middleware function called");
  next(); // Call next() so Express will call the next middleware function in the chain.
};

app.use(express.json());

app.use(a_middleware_function);

app.use("/api", api);

app.listen(port, function () {
  console.log(`Example app listening on port ${port}!`);
});