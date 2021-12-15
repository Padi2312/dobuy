<?php

include_once '../database/repository/product_repository.php';
include_once 'session.php';
include_once 'filehandler.php';

class Product
{

    private $productRepo;
    private $fileHandler;

    function __construct()
    {
        $this->productRepo = new ProductRepository();
        $this->fileHandler = new FileHandler();
    }

    function addProduct($name, $description, $price,  $category, $quantity = 1)
    {
        $session = new Session();
        $uploadResult = $this->fileHandler->uploadImage();
        if ($uploadResult !== null) {
            $this->productRepo->addProduct($name, $description, $price, $quantity, $uploadResult, $session->getUsername(), $category);
            return true;
        } else {
            return false;
        }
    }

    function getProductById($productId)
    {
        return $this->productRepo->getProductById($productId);
    }
}
