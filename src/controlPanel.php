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
        body {
            background: linear-gradient(60deg,
                    rgba(84, 58, 199, 1) 0%,
                    rgb(179, 100, 224) 100%);
        }

        .flex-column {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .bonhomme {
            height: 50px;
            width: 50px;
            color: grey;
        }

        .vert {
            color: palegreen;
        }

        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid black;
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
    </style>
</head>

<body>
    <div id="carte"></div>

    <div class="flex-column">
        <div class="card">
            <span>Anne</span>
            <span>Départ : 20 Boulevard du Général de Gaulle, 12/03/2020 12h</span>
            <span>Destination : 6 Boulevard Adolphe Billault, 12/03/2020 12h05</span>
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
        </div>
        <div class="card">
            <span>Baptiste</span>
            <span>Départ : 20 Boulevard du Général de Gaulle, 06/03/2014 17h</span>
            <span>Destination : 14 Cité du Soleil Levant, 08/03/2016 18h30</span>
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
        </div>
        <div class="card">
            <span>Anne</span>
            <span>Départ : 67ter Route Nationale, 12/06/2020 12h</span>
            <span>Destination : 20 Boulevard du Général de Gaulle, 01/10/2052 16h</span>
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
            <img class="bonhomme" src="../Annex/Logo/person-svgrepo-com.svg">
        </div>
    </div>
</body>

</html>