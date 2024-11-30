<?php
class OrderModel{
    private $db;
    function __construct(){
        $this->db = new DataBase();
    }

    // sửa insert bởi session
    function insertOrder($data){
        $sql = "INSERT INTO orders (id, totalPrice, noteUser, name, address, phone, payment, idUser) VALUES (?,?,?,?,?,?,?,?)";
        $param = [$data['id'],$data['totalPrice'], $data['noteUser'], $data['name'], $data['address'], $data['phone'], $data['payment'],$data['idUser']];
        return $this->db->insert($sql, $param);
    }
    function getIdOrder(){
        $sql = "SELECT * FROM orders";
        return $this->db->getAll($sql);
    }
}