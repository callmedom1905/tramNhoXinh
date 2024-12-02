<?php 
class OrderModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }
    //user
    // sửa insert bởi session
    function insertOrder($data){
        $sql = "INSERT INTO orders (id, totalPrice, noteUser, name, address, phone, payment, idUser) VALUES (?,?,?,?,?,?,?,?)";
        $param = [$data['id'],$data['totalPrice'], $data['noteUser'], $data['name'], $data['address'], $data['phone'], $data['payment'],$data['idUser']];
        return $this->db->insert($sql, $param);
    }
    function getOrder(){
        $sql = "SELECT * FROM orders";
        return $this->db->getAll($sql);
    }
    function getIdOrder(){
        $sql = "SELECT * FROM orders";
        return $this->db->getAll($sql);
    }
    //lấy đơn hàng theo id user
    function getOrderByIdUser($idUser){
        $sql = "SELECT * FROM orders WHERE idUser = $idUser";
        return $this->db->getAll($sql);
    }

    function cancelOrder($id){
        $sql = "UPDATE orders SET status = 0 WHERE id = ?";
        $param = [$id];
        return $this->db->update($sql, $param);
    }
    //admin
    function getOrderDetail(){
        $sql = "SELECT * FROM orderitems";
        return $this->db->getAll($sql);
    }
    function getIdOrderItem($id){
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