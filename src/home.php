<?php
require_once './footer.php';
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main page</title>
    <link rel="icon" type="image/png" href="/Annex/Logo/Nudge logo.png">
    <link rel="stylesheet" href="./assets/style/commonStyle.css">
    <link rel="stylesheet" href="./assets/style/home.css">
    <link rel="stylesheet" href="./assets/style/footer.css">

</head>

<body>
    <div class="header">

        <div class="inner-header flex">
            <img src="/Annex/Logo/Nudge logo.png" alt="Salomé queen" class="logo">
            <h1>N U D G E</h1>
        </div>

        <div>
            <a href="authentificationUser.php" class="auth-button">S'authentifier</a>
        </div>

        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(253,158,62,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(214,236,101,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <div class="content flex"></div>
    </div>

    <?php include 'footer.php' ?>

</body>