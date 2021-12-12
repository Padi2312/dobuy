<?php

include_once './php/models/usermodel.php';

class RatingModel {

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
        return new UserModel($this->user);
    }

    function getProdcutID()
    {
        return $this->productid;
    }

}