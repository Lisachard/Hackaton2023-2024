<?php
include './components/lookingForRides.php';
include './components/footer.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Carte Google Maps</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
  <script>
    function initMap() {
      var center = { lat: 47.205997467041016, lng: -1.538791537284851 };
      var map = new google.maps.Map(document.getElementById('carte'), {
        zoom: 16,
        center: center
      });
    }
  </script>
  <style>
    .flex-column {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .bonhomme {
      height: 25px;
      width: 25px;
      filter: invert(42%) sepia(93%) saturate(1352%) hue-rotate(87deg) brightness(119%) contrast(119%);
    }

    .vert {
      filter: invert(42%) sepia(93%) saturate(1352%) hue-rotate(87deg) brightness(119%) contrast(119%);
    }

    .card {
      display: flex;
      flex-direction: column;
      align-items: center;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      border-radius: 5px;
      width: 300px;
      margin: 10px;
      padding: 10px;
    }

    #carte {
      height: 400px;
      right: 0;
      width: 50%;
    }
    .flex {
      display: flex;
      justify-content: space-evenly;
    }

  </style>
</head>
<body>
  <div class="flex">
  <div id="carte"></div>

<div class="flex-column">
  <div class="card">
    <span>Anne</span>
    <span>Départ : 20 Boulevard du Général de Gaulle, 12/03/2020 12h</span>
    <span>Destination : 6 Boulevard Adolphe Billault, 12/03/2020 12h05</span>
    <div class="flex">
    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
    <img class="bonhomme vert" src="../Annex/Logo/person-svgrepo-com.svg">
    <img class="bonhomme vert" src="../Annex/Logo/person-svgrepo-com.svg">
    </div>
  </div>
  <div class="card">
    <span>Batiste</span>
    <span>Départ : 20 Boulevard du Général de Gaulle, 06/03/2014 17h</span>
    <span>Destination : 14 Cité du Soleil Levant, 08/03/2016 18h30</span>
    <div class="flex">
    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
    <img class="bonhomme vert" src="../Annex/Logo/person-svgrepo-com.svg">
    </div>
  </div>
  <div class="card">
    <span>Anne</span>
    <span>Départ : 67ter Route Nationale, 12/06/2020 12h</span>
    <span>Destination : Amien, 01/10/2052 16h</span>
    <div class="flex">
    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
    <img class="bonhomme vert" src="../Annex/Logo/person-svgrepo-com.svg">
    </div>
  </div>
</div>
  </div>
</body>
</html>