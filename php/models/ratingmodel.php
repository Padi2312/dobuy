<?php

/**
 * Database model for Rating Table
 * Provides getter for all table columns
 */
class RatingModel
{

    private $id;
    private $description;
    private $rating;
    private $user;
    private $productid;

    function __construct($ratingRow)
    {
        $this->id = $ratingRow["id"];
        $this->description = $ratingRow["description"];
        $this->rating = $ratingRow["rating"];
        $this->user = $ratingRow["user"];
        $this->productid = $ratingRow["product_id"];
    }

    /**
     * Returns Rating ID
     */
    function getID()
    {
        return $this->id;
    }

    /**
     * Returns Rating Description
     */
    function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns Actual Rating from 1-5
     */
    function getRating()
    {
        return $this->rating;
    }

    /**
     * Returns User for this Rating
     */
    function getUser()
    {
        return $this->user;
    }

    /**
     * Returns Product ID for this Rating
     */
    function getProdcutID()
    {
        return $this->productid;
    }
}
