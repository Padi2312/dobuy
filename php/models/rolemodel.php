<?php

/**
 * Database model for Role Table
 * Provides getter for all table columns
 */
class RoleModel
{

    private $id;
    private $name;

    function __construct($roleRow)
    {
        $this->id = $roleRow["id"];
        $this->name = $roleRow["name"];
    }

    /**
     * Returns Role ID
     */
    function getID()
    {
        return $this->id;
    }

    /**
     * Returns Role Name
     */
    function getName()
    {
        return $this->name;
    }
}
