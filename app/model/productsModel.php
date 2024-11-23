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
    
    //trang sản phẩm và sp chi tiết
    // function getProById( $idpro ){
    //     if($idpro > 0){
    //         $sql = "SELECT * FROM products WHERE id = $idpro";
    //         return $this->db->getOne($sql);
    //     }else{
    //         return null;
    //     }
    // }
    // //sản phẩm theo danh mục
    // function getProCate(){
        
    // }

    function getAllPro(){
        $sql = "SELECT * FROM products";
        return $this->db->getAll($sql);
    }

}