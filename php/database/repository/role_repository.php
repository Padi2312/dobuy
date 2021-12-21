<?php

include_once '../database/database.php';
include_once '../models/rolemodel.php';

class RoleRepository extends Database
{

    /**
     * Handles all actions for the database in role table Context
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns one Role as RoleModel from Database
     */
    function getRole($roleid)
    {
        $result = $this->mysqli->query("SELECT * FROM role WHERE id ='$roleid'")->fetch_assoc();
        return new RoleModel($result);
    }

    /**
     * Adds one Role to Database
     */
    function addRole($name)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO role (name) VALUES (?)");
        $stmt->bind_param('s', $name);
        if (!$stmt->execute()) {
            echo "SQL Statement Failed!";
        }
        $stmt->close();
    }

    /**
     * Updates one Role in Database
     */
    function updateRole($roleid, $name)
    {
        $this->mysqli->query("UPDATE role SET name = '$name' WHERE id = '$roleid'");
    }

    /**
     * Deletes one Role in Database
     */
    function deleteRole($roleid)
    {
        $this->mysqli->query("DELETE FROM role WHERE id = '$roleid'");
    }

    /**
     * Returns all Roles from Database
     */
    function getAllRoles()
    {
        return $this->mysqli->query("SELECT * FROM role");
    }
}
