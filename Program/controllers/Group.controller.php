<?php
include_once "config.php";
include_once "models/Group.class.php";
include_once "views/Group.view.php";

class GroupController {
    private $group;

    function __construct() { $this->group = new Group(Config::$servername, Config::$username, Config::$password, Config::$db_name); }

    public function index() {
        $this->group->connect();
        $this->group->read ();
        $data = array('group' => array());
        
        while ($row = $this->group->fetch()) array_push($data['group'], $row);
        $this->group->close();

        $view = new GroupView ();
        $view->render ($data);
    }

    public function form($id = null) {
        $this->group->connect();
        if ($id) {
            $this->group->read ($id);
            $data = $this->group->fetch ();
        } else $data = null;

        $view = new GroupView ();
        $view->fill ($data);

        $this->group->close();
    }

    public function create($name, $description) {
        $this->group->connect();
        $this->group->create ($name, $description);
        $this->group->close();

        header("Location: group.php");
    }

    public function update($id, $name, $description) {
        $this->group->connect();
        $this->group->update ($id, $name, $description);
        $this->group->close();

        header("Location: group.php");
    }

    public function delete($id) {
        $this->group->connect();
        $this->group->delete ($id);
        $this->group->close();

        header("Location: group.php");
    }
}