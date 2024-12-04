<?php
class CommentModel
{
    private $db;

    function __construct()
    {
        $this->db = new Database;
    }

    // function getComment()
    // {
    //     $sql = "SELECT * FROM productcomment";
    //     return $this->db->getAll($sql);
    // }

    // function getcommentdetail()
    // {
    //     $sql = "SELECT * FROM productcomment";
    //     return $this->db->getAll($sql);
    // }

    function getIdComment($id)
    {
        $sql = "SELECT * FROM productcomment WHERE id = $id";
        return $this->db->getOne($sql);
    }

    function getCommentAndNameUser()
    {
        $sql = "SELECT 
                c.id AS commentId, 
                c.text AS commentText, 
                c.idProduct, 
                c.dateProComment, 
                c.status, 
                u.name AS userName, 
                p.name AS productName
            FROM 
                productcomment c
            JOIN 
                users u 
            ON 
                c.idUser = u.id
            JOIN 
                products p 
            ON 
                c.idProduct = p.id";
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

    // function getNameProduct(){
    //     $sql = "SELECT ord.idProduct, p.id, p.name FROM orderitems ord JOIN products p ON ord.idProduct = p.id";
    //     return $this->db->getAll($sql);
    // }
}
