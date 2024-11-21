<?php
class DataBase
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "tramNhoXinh";
    private $conn;
    private $stmt;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    // get data from database
    public function query($sql, $param = []): mixed
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute($param);
        return $this->stmt;
    }
    public function getAll($sql)
    {
        $statement = $this->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOne($sql)
    {
        $statement = $this->query($sql);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
