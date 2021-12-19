<!-- Diese Datei führt die Änderung der Produkte aus -->
<?php
include_once '../common/filehandler.php';
include_once '../common/product.php';


$productHandler = new Product();
$id = $_GET['id'];
$type = $_GET["type"];
if ($type == "delete") {
    $productHandler->deleteProduct($id);
    header("location: home.php");
}


$name = $_POST['productname'];
$price = $_POST['price'];
$description = $_POST['description'];


$fileHandler = new FileHandler();
$uploadResult = $fileHandler->uploadImage();
if ($uploadResult !== null) {
    $productHandler->updateProduct($id, $name, $description, $price, $uploadResult, "Elektronik & Computer", 1);
} else {
    $productHandler->updateProduct($id, $name, $description, $price, "", "Elektronik & Computer", 1);
}
header("location: productsite.php?id=$id");
