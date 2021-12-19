<?php

/**
 * Database model for Rating Table
 * Provides getter for all table columns
 */
class RatingModel
{

    private $id;
    private $title;
    private $description;
    private $rating;
    private $user;
    private $productid;

    function __construct($ratingRow)
    {
        $this->id = $ratingRow["id"];
        $this->title = $ratingRow["title"];
        $this->description = $ratingRow["description"];
        $this->rating = $ratingRow["rating"];
        $this->user = $ratingRow["user"];
        $this->productid = $ratingRow["product_id"];
    }

    function getID()
    {
        return $this->id;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getDescription()
    {
        return $this->description;
    }

    function getRating()
    {
        return $this->rating;
    }

    function getUser()
    {
        return $this->user;
    }

    function getProdcutID()
    {
        return $this->productid;
    }
}
