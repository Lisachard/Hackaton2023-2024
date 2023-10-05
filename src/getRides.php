<?php
if (isset($_COOKIE['providedCookie'])) {
    $valeur_cookie = $_COOKIE['providedCookie'];
    echo "La valeur du cookie est : " . $valeur_cookie;
} else {
    echo "Le cookie 'providedCookie' n'existe pas.";
}

$data = array();
$jsonData = json_encode($data);

$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-type: application/json\r\n' . "Authorization: " . $valeur_cookie,
        'content' => $jsonData
    )
);

// Création d'un contexte HTTP
$context = stream_context_create($options);

$url = urlencode('http://78.202.0.64:3000/api/rides');
// Envoi des données à l'API et réception de la réponse
$result = file_get_contents($url, false, $context);
echo $result;
?>