<?php
include 'form.php';
include 'footer.php';
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
    #carte {
      height: 400px;
      right: 0;
      width: 50%;
    }
  </style>
</head>
<body>
  <div id="carte"></div>
</body>
</html>