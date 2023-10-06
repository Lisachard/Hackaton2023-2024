<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="./assets/style/commonStyle.css">
    <link rel="stylesheet" href="./assets/style/authentification.css">
    <link rel="stylesheet" href="./assets/style/footer.css">
</head>

<body>
    <form id="registerForm" class="container" action="traitementAuth.php" method="post">
        <div class="flex">
            <h1>Créer un compte</h1>
            <div>
                <input type="text" id="lastName" name="lastName" placeholder="Last name" required>

                <input type="text" id="firstName" name="firstName" placeholder="First name" required>



                <input type="mail" id="email" name="email" placeholder="Email" required>

                <input type="text" id="password" name="password" placeholder="Password" required>


                <button id="loginButton">Se connecter</button>
                <button type="submit">S'inscrire</button>
            </div>

        </div>
        </div>
    </form>

    <form id="loginForm" class="container" action="traitement_connexion.php" method="post">
        <div class="flex">
            <h1>Se connecter</h1>

            <div>
                <span class="containInput">
                    <input type="text" id="lastName" name="lastName" placeholder="Last name" required>
                    <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required>
                </span>
                <span class="containeButton">
                    <button id="registerButton">S'inscrire</button>
                    <button type="submit">Se connecter</button>
                </span>

            </div>
        </div>
    </form>
    </div>

    <script>
        document.getElementById("registerButton").addEventListener("click", function (e) {
            e.preventDefault();
            document.getElementById("registerForm").style.display = "block";
            document.getElementById("loginForm").style.display = "none";
            document.getElementById("registerButton").style.display = "none";
            document.getElementById("loginButton").style.display = "block";
        });

        document.getElementById("loginButton").addEventListener("click", function (e) {
            e.preventDefault();
            document.getElementById("registerForm").style.display = "none";
            document.getElementById("loginForm").style.display = "block";
            document.getElementById("registerButton").style.display = "block";
            document.getElementById("loginButton").style.display = "none";
        });
    </script>
</body>

<?php
include './components/footer.php';
include './components/backHome.php';
?>

</html>