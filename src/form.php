<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="./assets/style/commonStyle.css">
    <link rel="stylesheet" type="text/css" href="./assets/style/form.css">
    <title>Formulaire de Recherche de Trajet</title>
</head>

<body>
    <h1>Recherche de Trajet</h1>
    <form action="traitement.php" method="post">
        <div class="flex">
            <input type="text" id="depart" name="depart" placeholder="Départ" required>

            <input type="text" id="destination" name="destination" placeholder="Destination" required>

            <input type="date" id="date" name="date" placeholder="Date">

            <div class="passenger-counter">
                <button type="button" id="decrease-passengers">-</button>
                <input type="number" id="passagers" name="passagers" value="1" min="1" required>
                <button type="button" id="increase-passengers">+</button>
            </div>
            <input type="submit" value="Rechercher">
        </div>
    </form>
</body>

</html>

<script>
    document.getElementById('increase-passengers').addEventListener('click', function () {
        var passengersInput = document.getElementById('passagers');
        passengersInput.value = parseInt(passengersInput.value) + 1;
    });

    document.getElementById('decrease-passengers').addEventListener('click', function () {
        var passengersInput = document.getElementById('passagers');
        if (parseInt(passengersInput.value) > 1) {
            passengersInput.value = parseInt(passengersInput.value) - 1;
        }
    });
</script>