<?php

include_once './php/models/usermodel.php';

class ProductModel {

    private $id;
    private $name;
    private $description;
    private $price;
    private $imagepath;
    private $quantity;
    private $provider;
    private $category;

    function __construct($productRow)
    {
        $this->id = $productRow["id"];
        $this->name = $productRow["name"];
        $this->description = $productRow["description"];
        $this->price = $productRow["price"];
        $this->imagepath = $productRow["imagepath"];
        $this->quantity = $productRow["quantity"];
        $this->provider = $productRow["provider"];
        $this->category = $productRow["category"];
    }

    function getID()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getDescription()
    {
        return $this->description;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getImagePath()
    {
        return $this->imagepath;
    }

    function getQuantity()
    {
        return $this->quantity;
    }

    function getProvider()
    {
        return new UserModel($this->provider);
    }

    function getCategory()
    {
        return $this->category;
    }

}

    