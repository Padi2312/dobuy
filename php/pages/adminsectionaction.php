<!-- Diese Datei lässt den Admin ein vorgeschlagenes Produkt veröffentlichen -->
<?php
include_once '../common/product.php';

$id = $_GET["id"];
$productHandler = new Product();
$productHandler->makeProductVisible($id);

header("location: userprofile.php");
