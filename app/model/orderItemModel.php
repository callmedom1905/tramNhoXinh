<?php 
class OrderItemModel{
    private $orderItem;
    function __construct(){
        $this->orderItem = new DataBase();
    }
    function insertOrderItem($data){
        $sql = "INSERT INTO orderitems (idProduct, quantity, priceItem, idOrder) VALUES (?,?,?,?)";
        $param = [$data['idProduct'], $data['quantity'], $data['priceItem'], $data['idOrder']];
        return $this->orderItem->insert($sql, $param);
    }
}