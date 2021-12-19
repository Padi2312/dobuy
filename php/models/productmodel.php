<?php

/**
 * Database model for Product Table
 * Provides getter for all table columns
 */
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

    /**
     * Returns Product ID
     */
    function getID(): int
    {
        return $this->id;
    }

    /**
     * Returns Product Name
     */
    function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns Product Description
     */
    function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Returns Product Price
     */
    function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns Product ImagePath
     */
    function getImagePath(): string
    {
        return $this->imagepath;
    }

    /**
     * Returns Product Quantity
     */
    function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Returns Product Provider
     */
    function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * Returns Product Category
     */
    function getCategory(): int
    {
        return $this->category;
    }
}
