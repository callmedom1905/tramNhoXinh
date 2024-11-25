<?php
class PostModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }
    function getPost(){
        $sql = "SELECT * FROM post";
        return $this->db->getAll($sql);
    }
}