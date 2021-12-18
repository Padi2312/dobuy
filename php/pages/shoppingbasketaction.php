<?php

include_once '../common/shoppingcard.php';
$shoppingCard = new ShoppingCard();

if (isset($_GET["type"]) && $_GET["type"] == "buy") {
    $shoppingCard->buyProductsFromShoppingCard();
    header("location: thanksfororder.php");
} else {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $shoppingCard->deleteProductFromShoppingCard($id);
    }
    header("location: shoppingbasket.php");
}
