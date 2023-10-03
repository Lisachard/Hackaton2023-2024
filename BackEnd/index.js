const { Client } = require('@googlemaps/google-maps-services-js');

const client = new Client({});

const adresse = '20 Bd Général de Gaulle, 44200 Nantes'; // Adresse à géocoder

client.geocode({
  params: {
    address: adresse,
    key: 'AIzaSyBF3zytez7dzeCMDOM8qDCXpBjauc83A2E', // Remplacez par votre clé API Google Maps
  },
})
  .then((response) => {
    const location = response.data.results[0].geometry.location;
    console.log(`Coordonnées de ${adresse}:`);
    console.log(`Latitude: ${location.lat}`);
    console.log(`Longitude: ${location.lng}`);
  })
  .catch((error) => {
    console.error('Erreur de géocodage:', error.response.data.error_message);
  });
