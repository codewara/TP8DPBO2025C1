<?php
include_once "controllers/Group.controller.php";
include_once "views/Template.class.php";

$group = new GroupController ();

if (isset ($_POST['create'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $group->create ($name, $description);
}

else if (isset ($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $group->update ($id, $name, $description);
}

else if (!empty ($_GET['form'])) {
    $id = $_GET['form'] == 'X' ? null : $_GET['form'];
    $group->form ($id);
}

else if (!empty ($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $group->delete ($id);
}

else $group->index ();