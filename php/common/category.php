<?php

include_once '../database/repository/category_repository.php';

class Category
{
    private $categoryRepo;
    function __construct()
    {
        $this->categoryRepo = new CategoryRepository();
    }

    /**
     * Returns a list with all categories
     */
    function getAllCategories()
    {
        return $this->categoryRepo->getAllCategories();
    }
}
