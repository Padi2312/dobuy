<?php
include_once '../common/user.php';

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$user = new User();


if ($user->existsUser($username)) {
    echo "Nutzer existiert bereits";
    header("location: register.php?error=true");
} else {
    $user->signup($username, $password, $firstname, $lastname, $email);

    header("location: login.php");
}
