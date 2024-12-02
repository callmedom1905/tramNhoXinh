<?php
class ProductCommentModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }
    //user
    function getComment($idpro){
        $sql = "SELECT productcomment.text, productcomment.dateProComment, products.id, users.name
         FROM productcomment 
         JOIN products ON productcomment.idProduct = products.id  
         JOIN users ON productcomment.idUser = users.id
         WHERE idProduct = $idpro";
        return $this->db->getAll($sql);
    }
    function getIdComment($id)
    {
        $sql = "SELECT * FROM productcomment WHERE id = $id";
        return $this->db->getOne($sql);
    }
    //admin
    function getCommentAndNameUser()
    {
        $sql = "SELECT 
                c.id, c.text, c.idProduct, c.dateProComment, c.status, u.name as userName
            FROM 
                productcomment c
            JOIN 
                users u 
            ON 
                c.idUser = u.id";
        return $this->db->getAll($sql);
    }

    public function getCommentDetail($id)
    {
        $sql = "
            SELECT 
                c.id, c.text, c.dateProComment, u.name as userName
            FROM 
                productcomment c
            JOIN 
                users u 
            ON 
                c.idUser = u.id
            WHERE
                c.id = :id
        ";
        return $this->db->getOne($sql, ['id' => $id]);
    }
}