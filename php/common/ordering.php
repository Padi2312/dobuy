<?php

include_once '../database/repository/product_repository.php';
include_once '../database/repository/order_repository.php';
include_once '../models/ordermodel.php';
include_once '../models/productmodel.php';

class Ordering
{
    private $orderRepo;
    function __construct()
    {
        $this->orderRepo = new OrderRepository();
    }

    function addOrderForUser($productId, $quantity, $username)
    {
        $prodRepo = new ProductRepository();
        $product = $prodRepo->getProductById($productId);
        $productPrice = $product->getPrice();

        $this->orderRepo->addOrder($productId, $quantity, $productPrice, $username);
    }


    function getOrdersOfUser($username)
    {
        $prodRepo = new ProductRepository();

        $orders = $this->orderRepo->getOrdersByUsername($username);
        $products = array();
        foreach ($orders as $item) {
            $product = $prodRepo->getProductById($item->getProductId());
            array_push($products, $product);
        }
        return $products;
    }
}