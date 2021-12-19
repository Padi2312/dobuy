<?php

/**
 * Database model for Category Table
 * Provides getter for all table columns
 */
class CategoryModel
{
    
    private $id;
    private $name;

    function __construct($categoryRow)
    {
        $this->id = $categoryRow["id"];
        $this->name = $categoryRow["name"];
    }

    /**
     * Returns Category ID
     */
    function getID()
    {
        return $this->id;
    }

    /**
     * Returns Category Name
     */
    function getName()
    {
        return $this->name;
    }
}
