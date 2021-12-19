<!-- Diese Datei verarbeitet die LogIn-Anfrage -->
<?php

include_once '../common/user.php';
include_once '../common/session.php';

$username = $_POST['name'];
$password = $_POST['password'];
$session = new Session();
$user = new User();
if ($user->login($username, $password)) {
    echo '<script>window.history.go(-2);</script>';
    //header("location: ../../");
    $session->setIsLoggedIn(true);
    $session->setUsername($username);
} else {
    header("location: /php/pages/login.php?error=true");
    $session->setIsLoggedIn(false);
    $session->setUsername(null);
}
