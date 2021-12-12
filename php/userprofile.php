<?php

if (!isset($_SESSION['login'])) { //if login in session is not set
    header("Location: pages/login.php");
}
