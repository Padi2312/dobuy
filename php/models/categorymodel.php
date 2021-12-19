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

    function getID()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }
}
