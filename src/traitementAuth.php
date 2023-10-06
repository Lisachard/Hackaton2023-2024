<?php
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$password = $_POST['password'];

$data = array('lastName' => $lastName, 'firstName' => $firstName, 'email' => $email, 'password' => $password);

$jsonData = json_encode($data);

$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-type: application/json',
        'content' => $jsonData
    )
);

$context = stream_context_create($options);

$result = file_get_contents('http://localhost:3000/api/signup', false, $context);
$token = json_decode($result)->{
    "token"
    };

$providedCookie = "providedCookie";
$expiration = time() + 3600;
setcookie($providedCookie, $token, $expiration, "/");
header("Location:http://localhost/Hackaton2023-2024/src/home.php");
exit();
?>