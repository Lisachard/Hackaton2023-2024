<?php
// Récupération des données du formulaire
$name = $_POST['name'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Création de l'objet de données à envoyer à l'API
$data = array('name' => $name, 'firstname' => $firstname, 'email' => $email, 'password' => $password);

// Convertir l'objet en format JSON
$jsonData = json_encode($data);

// Configuration de l'en-tête pour l'API
$options = array(
  'http' => array(
    'method'  => 'POST',
    'header'  => 'Content-type: application/json',
    'content' => $jsonData
  )
);

// Création d'un contexte HTTP
$context  = stream_context_create($options);

// Envoi des données à l'API et réception de la réponse
$result = file_get_contents('URL_DE_VOTRE_API', false, $context);

// Affichage de la réponse de l'API
echo $result;


$token = "token";
$valeur = "Valeur du cookie";
$expiration = time() + 3600; // Expire dans 1 heure (3600 secondes)
setcookie($token, $valeur, $expiration, "/");



// quand le bouton est cliqué, génère cookie = valeur :> fonction GenerateCookie
?>