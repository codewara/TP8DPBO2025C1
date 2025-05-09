<?php

class DB {
    var $db_host = "";
    var $db_user = "";
    var $db_pass = "";
    var $db_name = "";
    var $db_link;
    var $result;

    function __construct ($db_host, $db_user, $db_pass, $db_name) {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    function connect () { $this->db_link = new mysqli ($this->db_host, $this->db_user, $this->db_pass, $this->db_name); }

    function close () { mysqli_close ($this->db_link); }

    function fetch () { return mysqli_fetch_array ($this->result); }

    function execute ($query) { $this->result = mysqli_query ($this->db_link, $query); }

}