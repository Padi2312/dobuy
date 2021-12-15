<?php
include_once 'session.php';
$session = new Session();
if (!$session->isLoggedIn()) { //if login in session is not set
    header("Location: /php/pages/login.php");
}
