<?php
class ProductsModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }

    function get8Pro(){
        $sql = "SELECT * FROM products LIMIT 8";
        return $this->db->getAll($sql);
    }
    function get6Pro(){
        $sql = "SELECT * FROM products ORDER BY name DESC LIMIT 6";
        return $this->db->getAll($sql);
    }
}