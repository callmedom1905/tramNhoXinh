<?php
class ProductModel
{
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function getProduct()
    {
        $sql = "SELECT * FROM products";
        return $this->db->getAll($sql);
    }

    function get_all_pro_cate($id)
    {
        $sql = "SELECT * FROM products WHERE idCate = '$id'";
        return $this->db->getAll($sql);
    }

    function getIdPro($id)
    {
        if ($id > 0) {
            $sql =  "SELECT * FROM products WHERE id = $id";
            return $this->db->getOne($sql);
        } else {
            return null;
        }
    }

    function upProduct($data)
    {
        $sql = "UPDATE products 
            SET name = ?, price = ?, salePrice = ?, quantity = ?, status = ?, image = ?, listImages = ?, idCate =? WHERE id = ?";
        $params = [$data['name'], $data['price'], $data['salePrice'], $data['quantity'], $data['status'], $data['image'], $data['listImages'], $data['idCate'], $data['id']];
        $this->db->update($sql, $params);
    }

    function insertPro($data)
    {
        $sql = "INSERT INTO products (name, price, salePrice, quantity, status, image, listImages, idCate) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [
            $data['name'],
            $data['price'],
            $data['salePrice'],
            $data['quantity'],
            $data['status'],
            $data['image'],
            $data['listImages'],
            $data['idCate']
        ];
        $this->db->insert($sql, $params);
    }

    function deletePro($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        return $this->db->delete($sql, [$id]);
    }
}
