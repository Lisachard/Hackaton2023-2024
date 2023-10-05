const express = require("express");
const api = require("./routes/api");

const checkRequestParam = require("./middlewares/checkRequestParam");

const app = express();
const port = 3000;

app.use(express.json());

app.use(checkRequestParam);

app.use("/api", api);

app.listen(port, function () {
  console.clear();
  console.log(`Nudge API is running on port ${port}!`);
});