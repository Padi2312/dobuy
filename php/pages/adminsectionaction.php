<?php
include_once '../common/product.php';

$id = $_GET["id"];
$productHandler = new Product();
$productHandler->makeProductVisible($id);

header("location: productsite.php?id=$id");
