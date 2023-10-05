<?php
// Récupération des données du formulaire
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$password = $_POST['password'];

// Création de l'objet de données à envoyer à l'API
$data = array('lastName' => $lastName, 'firstName' => $firstName, 'email' => $email, 'password' => $password);

// Convertir l'objet en format JSON
$jsonData = json_encode($data);

// Configuration de l'en-tête pour l'API
$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-type: application/json',
        'content' => $jsonData
    )
);

// Création d'un contexte HTTP
$context = stream_context_create($options);

// Envoi des données à l'API et réception de la réponse
$result = file_get_contents('http://localhost:3000/api/signup', false, $context);
$token = json_decode($result)->{
    "token"
    };

$providedCookie = "providedCookie";
$expiration = time() + 3600; // Expire dans 1 heure (3600 secondes)
setcookie($providedCookie, $token, $expiration, "/");
header("Location:http://localhost/Hackaton2023-2024/src/home.php");
exit();
?>