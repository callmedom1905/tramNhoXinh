<?php
class CategoryModel
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function getCate()
    {
        $sql = "SELECT * FROM productcate";
        return $this->db->getAll($sql);
    }

    function getIdCate($id)
    {
        $sql = "SELECT * FROM productcate WHERE id = $id";
        return $this->db->getOne($sql);
    }

    function getNameCate($id)
    {
        $sql = "SELECT name FROM productcate WHERE id = $id";
        return $this->db->getOne($sql);
    }

    function upCate($data)
    {
        $sql = "UPDATE productcate SET name = ?, status = ? WHERE id = ?";
        $param = [$data['name'], $data['status'], $data['id']];
        return $this->db->update($sql, $param);
    }

    function insertCate($data)
    {
        $sql = "INSERT INTO productcate (name, status) VALUES (?, ?)";
        $param = [$data['name'], $data['status']];
        return $this->db->insert($sql, $param);
    }

    function deleteCate($id)
    {
        $sql = "DELETE FROM productcate WHERE id = ?";
        $this->db->delete($sql, [$id]);
    }
}
