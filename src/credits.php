<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(60deg,
                    rgba(84, 58, 199, 1) 0%,
                    rgb(179, 100, 224) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-around;
            /* Centrer les cartes horizontalement */
            align-items: center;
            max-width: 600px;
            text-align: center;
            flex-wrap: wrap;
            /* Permettre le retour à la ligne si l'espace est insuffisant */
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .emoji {
            font-size: 24px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php include "components/backHome.php" ?>
    <div class="container">
        <div class="card">
            <p>Pierre LEPESANT</p>
            <p>B3 Développeur</p>
            <div class="emoji">&#128187;</div>
        </div>

        <div class="card">
            <p>Lisa ACHARD</p>
            <p>B3 Cybersécurité</p>
            <div class="emoji">&#128373;</div>
        </div>

        <div class="card">
            <p>Mostapha TOURABI</p>
            <p>B3 Ia-Data</p>
            <div class="emoji">&#128301;</div>
        </div>
    </div>
</body>

</html>