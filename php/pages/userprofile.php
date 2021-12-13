<?php
include_once '../common/session.php';
if (!Session::isLoggedIn()) { //if login in session is not set
    header("Location: /php/pages/login.php");
}
