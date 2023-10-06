<?php
require_once './components/lookingForRides.php';
include './components/footer.php';
include './components/backHome.php  ';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/footer.css">
    <title>Carte Google Maps</title>
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
        body {
            background: linear-gradient(60deg,
                    rgba(84, 58, 199, 1) 0%,
                    rgb(179, 100, 224) 100%);
        }

        .bonhomme {
            height: 25px;
            width: 25px;
        }

        .vert {
            filter: invert(42%) sepia(93%) saturate(1352%) hue-rotate(87deg) brightness(119%) contrast(119%);
        }

        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: white;
            border-radius: 5px;
            height: 150px;
            width: 400px;
            margin: 10px;
            padding: 10px;
        }

        #carte {
            height: 400px;
            right: 0;
            width: 50%;
        }

        .flexy {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            transform: translateY(10%);
        }
    </style>
</head>

<body>
    <div class="flexy">
        <div id="carte"></div>

        <div class="flex-column">
            <div class="card">
                <span><strong>Anne</strong></span>
                <span>Départ : 20 Boulevard du Général de Gaulle, 12/03/2020 12h</span>
                <span>Destination : 6 Boulevard Adolphe Billault, 12/03/2020 12h05</span>
                <div class="flexy">
                    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
                    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
                    <img class="bonhomme vert" src="../Annex/Logo/person-svgrepo-com.svg">
                    <img class="bonhomme vert" src="../Annex/Logo/person-svgrepo-com.svg">
                </div>
            </div>
            <div class="card">
                <span><strong>Baptiste</strong></span>
                <span>Départ : 20 Boulevard du Général de Gaulle, 06/03/2014 17h</span>
                <span>Destination : 14 Cité du Soleil Levant, 08/03/2016 18h30</span>
                <div class="flexy">
                    <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
                    <img class="bonhomme vert" src="../Annex/Logo/person-svgrepo-com.svg">
                </div>
            </div>
            <div class="card">
                <span><strong>Louise</strong></span>
                <span>Départ : 67ter Route Nationale, 12/06/2020 12h</span>
                <span>Destination : 20 Boulevard du Général de Gaulle, 01/10/2052 16h</span>
                <div class="flexy">
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