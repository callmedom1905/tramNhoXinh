<?php
    class SearchModel{
        private $db;

        function __construct()
        {
            $this->db = new Database();
        }

        function getSearch($key){
            $sql = "SELECT * FROM products WHERE name like '%$key%'";
            return $this->db->getAll($sql);
        }
    }
?>