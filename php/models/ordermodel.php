<?php

class OrderModel
{

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

    function getProductId()
    {
        return $this->productid;
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
        return $this->user;
    }
}
