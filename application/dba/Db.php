<?php

//require_once 'config/general.php';
require_once(dirname(__FILE__) . '/../config/general.php');

class Db {

    public $conn;
    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;

//    public function __construct() {
//        $this->conn = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass);
//        mysqli_select_db($this->conn, $this->dbName);
//        mysqli_query($this->conn, "SET NAMES 'utf8'");
//    }

    protected function connect() {        
        $this->dbHost = host;
        $this->dbUser = user;
        $this->dbPass = pass;
        $this->dbName = name;

        // Create connection
        $conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            //header("Location: https://ehosito.com/public/page/Error.php");
            exit();
        }
        
        mysqli_set_charset($conn,"utf8");
        return $conn;
    }
//    
//    function close($conn) {
//        $conn->close();
//    }

}
