<?php
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "handmade_db";
    private $conn; // khai báo thuộc tính conn để lưu giá trị database
    private $stmt;

    function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname; charset=utf8", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        };
    }

    function query($sql, $param = [])
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute($param);
        return $this->stmt;
    }

    public function getAll($sql, $param = [])
    {
        $statement = $this->query($sql, $param);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    // thêm $param = []
    public function getOne($sql, $param = [])
    {
        $statement = $this->query($sql, $param);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function insert($sql, $param)
    {
        $this->query($sql, $param);
        return $this->conn->lastInsertId();
    }

    function delete($sql, $param)
    {
        $this->query($sql, $param);
    }

    function update($sql, $param)
    {
        $this->query($sql, $param);
    }
    function __destruct()
    {
        unset($this->conn);
    }
}
