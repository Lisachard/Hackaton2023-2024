<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="./assets/style/commonStyle.css">
    <link rel="stylesheet" href="./assets/style/authentification.css">
</head>

<body>
    <div class="flex">
        <button id="registerButton">S'inscrire</button>
        <button id="loginButton">Se connecter</button>
    </div>

    <form id="registerForm" class="container" action="traitementAuth.php" method="post">
        <div class="flex">
            <input type="text" id="lastName" name="lastName" placeholder="Last name" required>

            <input type="text" id="firstName" name="firstName" placeholder="First name" required>

            <input type="mail" id="email" name="email" placeholder="Email" required>

            <input type="text" id="password" name="password" placeholder="Password" required>

            <button type="submit">S'inscrire</button>
        </div>
    </form>

    <form id="loginForm" action="traitement_connexion.php" method="post">
        <div class="flex">
            <input type="text" id="lastName" name="lastName" placeholder="Last name" required>
            <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required>
            <button type="submit">Se connecter</button>
        </div>
    </form>
    </div>

    <script>
        document.getElementById("registerButton").addEventListener("click", function () {
            document.getElementById("registerForm").style.display = "block";
            document.getElementById("loginForm").style.display = "none";
            console.log(document.getElementById("registerForm"));
        });

        document.getElementById("loginButton").addEventListener("click", function () {
            document.getElementById("registerForm").style.display = "none";
            document.getElementById("loginForm").style.display = "block";
        });
    </script>
</body>

<?php include 'footer.php' ?>

</html>