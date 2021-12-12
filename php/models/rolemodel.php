<?php

class RoleModel {

    private $id;
    private $name;

    function __construct($roleRow)
    {
        $this->id = $roleRow["id"];
        $this->name = $roleRow["name"];
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