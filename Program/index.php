<?php
include_once "controllers/Student.controller.php";
include_once "views/Template.class.php";

$student = new StudentController ();

if (isset ($_POST['create'])) {
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $phone = $_POST['phone'];
    $student->create ($name, $nim, $phone);
}

else if (isset ($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $phone = $_POST['phone'];
    $student->update ($id, $name, $nim, $phone);
}

else if (!empty ($_GET['form'])) {
    $id = $_GET['form'] == 'X' ? null : $_GET['form'];
    $student->form ($id);
}

else if (!empty ($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $student->delete ($id);
}

else $student->index ();