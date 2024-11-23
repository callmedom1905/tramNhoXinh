<?php
class ProductCateModel{
    private $db;

    function __construct(){
        $this->db = new DataBase();
    }

    function getNameCate($idcate){
        $sql = "SELECT * FROM productcate WHERE id = $idcate";
        return $this->db->getAll($sql);
    }
}