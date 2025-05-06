<?php
include_once "models/DB.class.php";

class Student extends DB {
    function create ($name, $nim, $phone) {
        $join_date = date("Y-m-d");
        $query = "INSERT INTO students (name, nim, phone, join_date)
                  VALUES ('$name', '$nim', '$phone', '$join_date')";
        $this->execute($query);
    }

    function read ($id = null) {
        $query = "SELECT * FROM students ". ($id ? "WHERE ID = $id" : "");
        $this->execute($query);
    }

    function update ($id, $name, $nim, $phone) {
        $query = "UPDATE students
                  SET name = '$name', nim = '$nim', phone = '$phone'
                  WHERE id = $id";
        $this->execute($query);
    }

    function delete ($id) {
        $query = "DELETE FROM students
                  WHERE id = $id";
        $this->execute($query);
    }
}