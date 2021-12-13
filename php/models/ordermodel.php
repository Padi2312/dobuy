<?php

include_once './php/models/usermodel.php';
include_once './php/models/productmodel.php';

class OrderModel {

    private $id;
    private $productid;
    private $timestamp;
    private $quantity;
    private $price;
    private $user;

    function __construct($orderRow)
    {
        $this->id = $orderRow["id"];
        $this->productid = $orderRow["product_id"];
        $this->timestamp = $orderRow["timestamp"];
        $this->quantity = $orderRow["quantity"];
        $this->price = $orderRow["price"];
        $this->user = $orderRow["user"];
    }

    function getID()
    {
        return $this->id;
    }

    function getProduct()
    {
        return new ProductModel($this->productid);
    }

    function getTimestamp()
    {
        return $this->timestamp;
    }

    function getQuantity()
    {
        return $this->quantity;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getUser()
    {
        return new UserModel($this->user);
    }


}