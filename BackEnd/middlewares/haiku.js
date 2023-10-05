const haiku = function (req, res, next) {
    const drink = req.headers['drink'];

    if (drink == 'coffee') {
        return res.status(418).send('I\'m a teapot');
    }
    else next();
}

// Portes close, silence,
// Théière pleine, rêve froid,
// Refus énigmatique.

module.exports = haiku;