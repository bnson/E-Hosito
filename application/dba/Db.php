<?php

require_once(dirname(__FILE__) . '/../config/Prepend.php');
require_once(dirname(__FILE__) . '/../config/General.php');

class Db {

    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;

    protected function connect() {

        $this->dbHost = dbHost;
        $this->dbUser = dbUser;
        $this->dbPass = dbPass;
        $this->dbName = dbName;

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // Create connection
        $conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            //header("Location: " . $GLOBALS['page_error']);
            exit();
        }

        mysqli_set_charset($conn, "utf8");
        return $conn;
    }

}
