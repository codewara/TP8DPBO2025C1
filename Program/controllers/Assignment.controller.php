<?php
include_once "config.php";
include_once "models/Assignment.class.php";
include_once "models/Student.class.php";
include_once "views/Assignment.view.php";

class AssignmentController {
    private $assignment;
    private $student;

    function __construct() {
        $this->assignment = new Assignment(Config::$servername, Config::$username, Config::$password, Config::$db_name);
        $this->student = new Student(Config::$servername, Config::$username, Config::$password, Config::$db_name);
    }

    public function index() {
        $this->assignment->connect();
        $this->assignment->read ();
        $data = array('assignment' => array());
        
        while ($row = $this->assignment->fetch()) array_push($data['assignment'], $row);
        $this->assignment->close();

        $view = new AssignmentView ();
        $view->render ($data);
    }

    public function form($id = null) {
        $this->assignment->connect();
        $this->student->connect();

        $this->student->read ();
        if ($id) {
            $this->assignment->read ($id);
            $data['main'] = $this->assignment->fetch ();
        } else $data['main'] = null;

        $data['student'] = array();
        while ($row = $this->student->fetch()) array_push($data['student'], $row);
        
        $view = new AssignmentView ();
        $view->fill ($data);
        
        $this->student->close();
        $this->assignment->close();
    }

    public function create($title, $description, $deadline, $student_id) {
        $this->assignment->connect();
        $this->assignment->create ($title, $description, $deadline, $student_id);
        $this->assignment->close();

        header("Location: assignment.php");
    }

    public function update($id, $title, $description, $deadline, $student_id) {
        $this->assignment->connect();
        $this->assignment->update ($id, $title, $description, $deadline, $student_id);
        $this->assignment->close();

        header("Location: assignment.php");
    }

    public function delete($id) {
        $this->assignment->connect();
        $this->assignment->delete ($id);
        $this->assignment->close();

        header("Location: assignment.php");
    }
}