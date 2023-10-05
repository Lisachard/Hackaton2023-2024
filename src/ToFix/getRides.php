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
        'method' => 'GET',
        'header' => 'Content-type: application/json\r\n' . "Authorization: " . $valeur_cookie,
        'content' => $jsonData
    )
);

$context = stream_context_create($options);

$url = urlencode('http://78.202.0.64:3000/api/rides');
$result = file_get_contents($url, false, $context);
echo $result;
?>