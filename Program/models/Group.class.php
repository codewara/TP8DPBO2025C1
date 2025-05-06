<?php
include_once "models/DB.class.php";

class Group extends DB {
    function create ($name, $description) {
        $query = "INSERT INTO groups (name, description)
                  VALUES ('$name', '$description')";
        $this->execute($query);
    }

    function read ($id = null) {
        $query = "SELECT * FROM groups ". ($id ? "WHERE ID = $id" : "");
        $this->execute($query);
    }

    function update ($id, $name, $description) {
        $query = "UPDATE groups
                  SET name = '$name', description = '$description'
                  WHERE id = $id";
        $this->execute($query);
    }

    function delete ($id) {
        $query = "DELETE FROM groups
                  WHERE id = $id";
        $this->execute($query);
    }
}