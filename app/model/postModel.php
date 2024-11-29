<?php
class PostModel{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }
    // Lấy bài viết
    function getAllPost(){
        $sql = "SELECT * FROM post";
        return $this->db->getAll($sql);
    }

    function getPost($id){
        $sql = "SELECT * FROM post WHERE id = $id";
        return $this->db->getOne($sql);
    }
    // Thêm bài viết
    function insertPost($dataForm){
        $sql = "INSERT INTO post(title,text,image,datePost,description,status,idCatePost,idUserPost) VALUE (?,?,?,?,?,?,?,?)";
        $param = [$dataForm['title'],$dataForm['text'],$dataForm['image'],$dataForm['datePost'],$dataForm['description'],$dataForm['status'],$dataForm['idCatePost'],$dataForm['idUserPost']];
        $this->db->insert($sql, $param);
    }
    // Sửa bài viết
    function editPost($data){
        $sql = "UPDATE post SET title=?, text=?, image=?, description=?, status=?, idCatePost=? WHERE id=?";
        $param = [$data['title'], $data['text'], $data['image'], $data['description'], $data['status'], $data['idCatePost'], $data['id']];
        $this->db->update($sql, $param);
    }

    function deletePost($id){
        $sql = "DELETE FROM post WHERE id = ?";
        $this->db->delete($sql, [$id]);
    }
}
?>