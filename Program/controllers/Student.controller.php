<?php
include_once "config.php";
include_once "models/Student.class.php";
include_once "views/Student.view.php";

class StudentController {
    private $student;

    function __construct() { $this->student = new Student(Config::$servername, Config::$username, Config::$password, Config::$db_name); }

    public function index() {
        $this->student->connect();
        $this->student->read ();
        $data = array('student' => array());

        while ($row = $this->student->fetch()) array_push($data['student'], $row);
        $this->student->close();

        $view = new StudentView ();
        $view->render ($data);
    }

    public function form($id = null) {
        $this->student->connect();
        if ($id) {
            $this->student->read ($id);
            $data = $this->student->fetch ();
        } else $data = null;

        $view = new StudentView ();
        $view->fill ($data);

        $this->student->close();
    }

    public function create($name, $nim, $phone) {
        $this->student->connect();
        $this->student->create ($name, $nim, $phone);
        $this->student->close();

        header("Location: index.php");
    }

    public function update($id, $name, $nim, $phone) {
        $this->student->connect();
        $this->student->update ($id, $name, $nim, $phone);
        $this->student->close();

        header("Location: index.php");
    }

    public function delete($id) {
        $this->student->connect();
        $this->student->delete ($id);
        $this->student->close();

        header("Location: index.php");
    }
}

    