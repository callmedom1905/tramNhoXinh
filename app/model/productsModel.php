<?php
class ProductsModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }
    //trang chủ
    function get8Pro(){
        $sql = "SELECT * FROM products LIMIT 8";
        return $this->db->getAll($sql);
    }

    function get6Pro(){
        $sql = "SELECT * FROM products ORDER BY name DESC LIMIT 6";
        return $this->db->getAll($sql);
    }
    
    //sản phẩm theo danh mục
    function getProCate($idcate){
        $sql = "SELECT * FROM products WHERE idCate = $idcate";
        return $this->db->getAll($sql);
    }

    //lấy tất cả sản phẩm
    function getAllPro(){
        $sql = "SELECT * FROM products";
        return $this->db->getAll($sql);
    }

    //lấy sản phẩm nổi bật theo view
    function getProHot(){
        $sql = "SELECT * FROM products ORDER BY view DESC LIMIT 4";
        return $this->db->getAll($sql);
    }

    //lấy sản phẩm theo id product 
    function getIdPro($idpro){
        if($idpro > 0){
            $sql = "SELECT * FROM products WHERE id = $idpro";
            return $this->db->getOne($sql);
        }else{
            return null;
        }
    }

    //lấy tên và id danh mục theo id sản phẩm
    function getNameCate($idpro){
        $sql = "SELECT productcate.id, productcate.name FROM products INNER JOIN productcate ON products.idCate = productcate.id WHERE products.id = $idpro LIMIT 4";
        return $this->db->getAll($sql);
    }

    //lấy id danh mục của sản phẩm
    function getIdCate($idpro){
        $sql = "SELECT idCate FROM products WHERE id = '$idpro'";
        return $this->db->getOne($sql);
    }

    //lấy sản phẩm thoe id danh mục
    public function getProCateById($idcate, $idpro){
        $sql = "SELECT * FROM products WHERE idCate = '$idcate' AND id <> '$idpro' LIMIT 4"; 
        return $this->db->getAll($sql);
   }

    
    

    



}