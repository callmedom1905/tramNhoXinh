<?php
class PostModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }
    //lấy bài viết
    function getPost(){
        $sql = "SELECT * FROM post";
        return $this->db->getAll($sql);
    }
    //lấy 1 bài viết theo id
    function getPostById($idpost){
        $sql = "SELECT * FROM post WHERE id = $idpost";
        return $this->db->getOne($sql);
    }
    //lấy id danh mục của bài viết
    function getIdCatePost($idpost){
        $sql = "SELECT idCatePost FROM post WHERE id = $idpost";
        return $this->db->getOne($sql);
    }

    function getPostByIdCate($idCatePost){
        $sql = "SELECT * FROM post WHERE idCatePost = $idCatePost";
        return $this->db->getAll($sql);
    }
    
}