<?php
include_once '../common/filehandler.php';
include_once '../common/product.php';

$name = $_POST['productname'];
$price = $_POST['price'];
$description = $_POST['description'];

$productHandler = new Product();
$result = $productHandler->addProduct($name, $description, $price, "Elektronik & Computer");
if ($result === null) {
    //TODO: Redirect to error
} else {
    header("location: productsite.php?id=$result&type=created");
}
