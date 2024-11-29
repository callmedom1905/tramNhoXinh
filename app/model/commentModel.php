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
