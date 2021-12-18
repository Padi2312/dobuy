<?php
include_once '../common/filehandler.php';
include_once '../common/product.php';

$name = $_POST['productname'];
$price = $_POST['price'];
$description = $_POST['description'];
$type = $_GET["type"];


$productHandler = new Product();
if ($type == 1) {
    $result = $productHandler->addProduct($name, $description, $price, "Elektronik & Computer");
    header("location: productsite.php?id=$result&type=created");
} else {
    $result = $productHandler->addProductOfUser($name, $description, $price, "Elektronik & Computer");
    header("location:  thanksforselling.php");
}
