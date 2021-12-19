<!-- Diese Datei verarbeitet die LogOut-Anfrage -->
<?php
include_once '../common/session.php';
$session = new Session();
$session->setIsLoggedIn(false);
$session->setUsername(null);
header("location: ../../");
