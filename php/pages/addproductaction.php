<?php
include_once '../common/filehandler.php';
include_once '../common/product.php';

$name = $_POST['productname'];
$price = $_POST['price'];
$description = $_POST['description'];

$productHandler = new Product();
if ($productHandler->addProduct($name, $description, $price, "Elektronik & Computer")) {
    //TODO: Redirect to Page maybe?
}
