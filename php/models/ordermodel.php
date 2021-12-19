<?php

/**
 * Database model for Order Table
 * Provides getter for all table columns
 */
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

    /**
     * Returns Order ID
     */
    function getID()
    {
        return $this->id;
    }

    /**
     * Returns Product ID to this Order
     */
    function getProductId()
    {
        return $this->productid;
    }

    /**
     * Returns Order Timestamp
     */
    function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Returns Order Quantity
     */
    function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Returns Order Price
     */
    function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns Order User
     */
    function getUser()
    {
        return $this->user;
    }
}
