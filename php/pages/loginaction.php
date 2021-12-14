<?php

include_once '../common/user.php';

$username = $_POST['name'];
$password = $_POST['password'];

$user = new User();
if ($user->login($username, $password)) {
    header("location: /");
    Session::setIsLoggedIn(true);
    error_log(print_r($_SESSION["isLoggedIn"], TRUE));
} else {
    header("location: /php/pages/login.php?error=true");
    Session::setIsLoggedIn(false);
}
