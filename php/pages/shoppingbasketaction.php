<?php

include_once '../common/shoppingcard.php';
$shoppingCard = new ShoppingCard();
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $shoppingCard->deleteProductFromShoppingCard($id);
}
header("location: shoppingbasket.php");
