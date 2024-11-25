<?php
class ProductCommentModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }

    function getComment($idpro){
        $sql = "SELECT productcomment.text, productcomment.dateProComment, products.id, users.name
         FROM productcomment 
         JOIN products ON productcomment.idProduct = products.id  
         JOIN users ON productcomment.idUser = users.id
         WHERE idProduct = $idpro";
        return $this->db->getAll($sql);
    }
}