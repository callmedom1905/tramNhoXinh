<?php
class OrderModel
{
    private $db;

    function __construct() {
        $this->db = new Database;
    }
        function getOrder(){
        $sql = "SELECT * FROM orders";
        return $this->db->getAll($sql);
    }
    function getOrderDetail(){
        $sql = "SELECT * FROM orderitems";
        return $this->db->getAll($sql);
    }
    function getIdOrder($id){
        $sql = "SELECT * FROM orderitems WHERE id = $id";
        return $this->db->getOne($sql);
    }

    function getOrderDetailsWithImages($idOrder) {
        $sql = "SELECT 
                    oi.id, 
                    oi.quantity, 
                    oi.priceItem, 
                    p.name AS productName, 
                    p.image
                FROM 
                    orderitems oi
                JOIN 
                    products p ON oi.idProduct = p.id
                WHERE 
                    oi.idOrder = :idOrder";
        return $this->db->getAll($sql, ['idOrder' => $idOrder]);
    }
}
