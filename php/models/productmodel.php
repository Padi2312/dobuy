<?php

class ProductModel
{

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
        $this->category = $productRow["category_id"];
    }

    function getID(): int
    {
        return $this->id;
    }

    function getName(): string
    {
        return $this->name;
    }

    function getDescription(): string
    {
        return $this->description;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getImagePath(): string
    {
        return $this->imagepath;
    }

    function getQuantity(): int
    {
        return $this->quantity;
    }

    function getProvider(): string
    {
        return $this->provider;
    }

    function getCategory(): int
    {
        return $this->category;
    }
}
