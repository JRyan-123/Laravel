<?php

class Database  
{   
    private $host = "localhost";
    private $dbname = "employeedb";
    private $username = "root";
    private $password = "";
    private $conn;
    
    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $this->conn;
        } catch (Exception $e) {
            die("Error : ". $e->getMessage());
        }
    }
    public function close() {
        $this->conn = null;
    }
}

