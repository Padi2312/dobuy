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

    /**
     * Returns a category model based on the given name
     */
    function getCategoryByName($name)
    {
        return $this->categoryRepo->getCategoryIdByName($name);
    }

    /**
     * Returns the category model based on the given category id
     */
    function getCategoryById($categoryId)
    {
        return $this->categoryRepo->getCategoryById($categoryId);
    }
}
