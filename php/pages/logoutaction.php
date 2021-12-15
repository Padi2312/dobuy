<?php
include_once '../common/session.php';
$session = new Session();
$session->setIsLoggedIn(false);
header('location: /');