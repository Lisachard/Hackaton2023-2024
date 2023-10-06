<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back home button</title>
    <style>
        .home-button {
            position: fixed;
            top: 20px;
            left: 20px;
            border-radius: 50%;
            text-align: center;
            cursor: pointer;
            z-index: 1000;
            height: auto;
            width: auto;
        }

        .home-button a {
            text-decoration: none;
            color: #fff;
        }

        .home-icon::before {
            content: "\1F3E0";
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="home-button">
        <a href="../src/home.php" class="home-icon"></a>
    </div>
</body>

</html>