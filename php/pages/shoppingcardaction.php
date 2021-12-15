<?php

include_once '../common/shoppingcard.php';

$id = $_GET["id"];
$shoppingCardRepo = new ShoppingCardRepository();
$username = Session::getUsername();

$shoppingCardRepo->addProductToShoppingCard($username, $id);
