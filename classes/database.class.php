<?php

// include_once("config/config.php"); ERROR

class Database
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "rapidlinkdb";

    protected $conn;

    public function __construct()
    {
        $this->connectDB();
    }

    public function connectDB()
    {

        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->conn == false) {
            die("Connection failed: " . $this->conn->connect_error);
            exit();
        }
    }
}
