<?php
include_once "controllers/Assignment.controller.php";
include_once "views/Template.class.php";

$assignment = new AssignmentController ();

if (isset ($_POST['create'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $student_id = $_POST['student_id'];
    $assignment->create ($title, $description, $deadline, $student_id);
}

else if (isset ($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $student_id = $_POST['student_id'];
    $assignment->update ($id, $title, $description, $deadline, $student_id);
}

else if (!empty ($_GET['form'])) {
    $id = $_GET['form'] == 'X' ? null : $_GET['form'];
    $assignment->form ($id);
}

else if (!empty ($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $assignment->delete ($id);
}

else $assignment->index ();