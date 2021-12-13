<?php
$user = $_POST['name'];
$pw = $_POST['password'];

$db = new UserRepository();

if ($db->checkIfUserExists($user)){
    if ($db->checkIfUserMatchesPw($user, $pw)) {
        echo '<meta http-equiv="reresh" content="2; url="';
    } else {
        echo "Nutzer und Passwort stimmen nicht überein!";
        echo '<meta http-equiv="reresh" content="2; url=login.php"';
    }
} else{
    echo "Der eingegebene Nutzername ist unserem System nicht bekannt.";
    echo '<meta http-equiv="reresh" content="2; url=login.php"';
}