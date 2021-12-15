<?php

include_once '../database/database.php';
include_once '../models/rolemodel.php';

class RoleRepository extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function getRole($roleid)
    {
        $result = $this->mysqli->query("SELECT * FROM role WHERE id ='$roleid'")->fetch_assoc();
        return new RoleModel($result);
    }

    function addRole($name)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO role (name) VALUES (?)");
        $stmt->bind_param('s', $name);
        if (!$stmt->execute()) {
            echo "SQL Statement Failed!";
        }
        $stmt->close();
    }

    function updateRole($roleid, $name)
    {
        $this->mysqli->query("UPDATE role SET name = '$name' WHERE id = '$roleid'");
    }

    function deleteRole($roleid)
    {
        $this->mysqli->query("DELETE FROM role WHERE id = '$roleid'");
    }

    function getAllRoles()
    {
        return $this->mysqli->query("SELECT * FROM role");
    }
}
