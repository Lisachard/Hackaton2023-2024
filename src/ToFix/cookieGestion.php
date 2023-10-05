<?php
if (isset($_COOKIE['providedCookie'])) {
    $valeur_cookie = $_COOKIE['providedCookie'];
    echo "La valeur du cookie est : " . $valeur_cookie;
} else {
    echo "Le cookie 'providedCookie' n'existe pas.";
}
?>