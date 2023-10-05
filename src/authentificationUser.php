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
    <form action="traitement.php" method="post">
        <div class="flex">
            <input type="text" id="lastName" name="lastName" placeholder="Last name" required>

            <input type="text" id="firstName" name="firstName" placeholder="First name" required>

            <input type="mail" id="email" name="email" placeholder="Email" required>

            <input type="text" id="password" name="password" placeholder="Password" required>

            <button type="submit">S'inscrire</button>
        </div>
    </form>
</body>

</html>