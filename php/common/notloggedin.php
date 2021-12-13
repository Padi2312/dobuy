<?php
include_once 'session.php';
if (!Session::isLoggedIn()) { //if login in session is not set
    header("Location: /php/pages/login.php");
}
