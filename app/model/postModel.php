<?php
class PostModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }
    function laybaiviet(){
        $sql = "SELECT * FROM post ";
        return $this->db->getAll($sql);
    }
}