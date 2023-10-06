const fs = require("fs");

const checkRequestParam = function (req, res, next) {
    let route = req.originalUrl.match(/\/api\/(.*)/)[1];
    let bodyParams;
    let rawData = fs.readFile("./body_parameters.json", (err, data) => {
        if (err) throw err;
        bodyParams = JSON.parse(data);
        for (const [key, value] of Object.entries(bodyParams[route])) {
            if (!Object.hasOwn(req.body, key)) return res.status(400).send("Missing parameters");
        }
        next();
    });
};

module.exports = checkRequestParam;