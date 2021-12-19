<?php

/**
 * Checks whether a user is logged in if not then redirect to login page
 */
include_once 'session.php';
$session = new Session();
if (!$session->isLoggedIn()) { //if login in session is not set
    header("Location: ../pages/login.php");
}
