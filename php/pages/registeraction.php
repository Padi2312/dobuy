<?php
$user = $_POST['name'];
$pw = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$db = new UserRepository();

if ($db->checkIfUserExists($user)){
    echo "Nutzer existiert bereits";
    echo '<meta http-equiv="reresh" content="2; url=register.php"';

} else{
    $db->insertUser($user, $pw, $firstname, $lastname, $email);
    echo '<meta http-equiv="reresh" content="2; url=login.php"';
}