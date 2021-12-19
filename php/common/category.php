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
     * Returns Category by Name
     */
    function getCategoryByName($name) {
        return $this->categoryRepo->getCategoryByName($name);
    }

    function getCategoryNameByID($id) {
        $category = $this->categoryRepo->getCategory($id);
        return $category->getName();
    }
}
