<!-- Diese Klasse enthält die Daten der Bestellungen und hat Funktionen um diese zu verarbeiten oder bearbeiten-->
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

    /**
     * Adds an order with the given product id to
     * the user with the given username
     */
    function addOrderForUser($username, $productId)
    {
        $prodRepo = new ProductRepository();
        $product = $prodRepo->getProductById($productId);
        $productPrice = $product->getPrice();

        $this->orderRepo->addOrder($productId, 1, $productPrice, $username);
        $prodRepo->decrementQuantityByOne($productId);
    }

    /**
     * Returns a list of orders from a user given by the username
     */
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

    /**
     * Returns a list with all products being sold on the shop
     */
    function getAllSoldProducts()
    {
        $prodRepo = new ProductRepository();

        $orders = $this->orderRepo->getAllOrders();
        $products = array();
        foreach ($orders as $item) {
            $product = $prodRepo->getProductById($item->getProductId());
            array_push($products, $product);
        }
        return $products;
    }

    /**
     * Returns a list of all sold products which have been
     * offered by a user of the shop
     */
    function usersSoldProducts()
    {
        $prodRepo = new ProductRepository();
        $username = Session::getUsername();
        $orders = $this->orderRepo->getUserSoldProducts($username);
        $products = array();
        foreach ($orders as $item) {
            $product = $prodRepo->getProductById($item->getProductId());
            array_push($products, $product);
        }
        return $products;
    }
}
