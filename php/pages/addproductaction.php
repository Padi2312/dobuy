<!-- Diese Datei verarbeitet die Dateien, die die Kunden zu Ihren Produkten angeben, um speißt sie in die Datenbank ein -->
<?php
include_once '../common/filehandler.php';
include_once '../common/product.php';

$name = $_POST['productname'];
$price = $_POST['price'];
$description = $_POST['description'];
$type = $_GET["type"];
$category = $_POST["category"];

$productHandler = new Product();
if ($type == 1) {
    $result = $productHandler->addProduct($name, $description, $price, $category);
    header("location: productsite.php?id=$result&type=created");
} else {
    $result = $productHandler->addProductOfUser($name, $description, $price, $category);
    header("location:  thanksforselling.php");
}
