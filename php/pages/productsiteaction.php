<?php
include_once "../common/rating.php";
include_once "../common/session.php";

$rating = new Rating();

$optradio = $_GET["optradio"];
$comment = $_GET["comment"];
$productId = $_GET["id"];

if (!Session::isLoggedIn()) {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "&error=notloggedin");
} else {
    $username = Session::getUsername();
    $rating->addRating($comment, $optradio, $username,  $productId);
    $prevUrl = $_SERVER['HTTP_REFERER'];
    header("Location: $prevUrl");
}
