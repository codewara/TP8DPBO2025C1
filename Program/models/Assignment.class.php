<?php
include_once "models/DB.class.php";

class Assignment extends DB {
    function create ($title, $description, $deadline, $student_id) {
        $query = "INSERT INTO assignments (title, description, deadline, student_ID)
                  VALUES ('$title', '$description', '$deadline', $student_id)";
        $this->execute($query);
    }

    function read ($id = null) {
        $query = "SELECT a.*, s.name AS student_name
                  FROM assignments a
                  JOIN students s ON a.student_ID = s.ID
                  ". ($id ? "WHERE a.ID = $id" : "");
        $this->execute($query);
    }

    function update ($id, $title, $description, $deadline, $student_id) {
        $query = "UPDATE assignments
                  SET title = '$title', description = '$description', deadline = '$deadline', student_ID = $student_id
                  WHERE id = $id";
        $this->execute($query);
    }

    function delete ($id) {
        $query = "DELETE FROM assignments
                  WHERE id = $id";
        $this->execute($query);
    }
}