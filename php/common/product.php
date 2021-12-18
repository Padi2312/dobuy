<?php

include_once '../database/repository/product_repository.php';
include_once 'session.php';
include_once 'filehandler.php';
include_once '../models/productmodel.php';

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
            return $this->productRepo->addProduct($name, $description, $price, $quantity, $uploadResult, $session->getUsername(), $category);
        } else {
            return $this->productRepo->addProduct($name, $description, $price, $quantity, "", $session->getUsername(), $category);
        }
    }

    function addProductOfUser($name, $description, $price,  $category, $quantity = 1)
    {
        $session = new Session();
        $uploadResult = $this->fileHandler->uploadImage();
        if ($uploadResult !== null) {
            return $this->productRepo->addProduct($name, $description, $price, $quantity, $uploadResult, $session->getUsername(), $category, false);
        } else {
            return $this->productRepo->addProduct($name, $description, $price, $quantity, "", $session->getUsername(), $category, false);
        }
    }

    function makeProductVisible($id)
    {
        $this->productRepo->changeVisibilityOfProduct($id, true);
    }


    function getProductById($productId)
    {
        return $this->productRepo->getProductById($productId);
    }

    function getAllProducts(): array
    {
        return $this->productRepo->getAllProducts();
    }

    function getAllVisibleProducts()
    {
        return $this->productRepo->getAllVisibleProducts();
    }

    function getAllUserProducts()
    {
        return $this->productRepo->getAllUserProducts();
    }

    function deleteProduct($id)
    {
        $this->productRepo->deleteProduct($id);
    }

    function updateProduct($productId, $name, $description, $price, $imagePath, $category, $quantity)
    {
        $product = $this->productRepo->getProductById($productId);
        if ($imagePath === "") {
            $imagePath = $product->getImagePath();
        }
        $this->productRepo->updateProduct($productId, $name, $description, $price, $imagePath,  $category, $quantity);
    }

    function getRandomProducts($amount): array
    {
        return $this->productRepo->getRandomProducts($amount);
    }
}
