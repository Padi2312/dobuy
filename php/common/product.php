<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/database/repository/product_repository.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/common/session.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/common/filehandler.php';


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
