<?php
class adminOrderController
{
    private $order;
    private $orderdetail;
    private $data;

    function __construct()
    {
        $this->order = new OrderModel();
        $this->orderdetail = new OrderModel();
    }

    function renderView($view, $data = null)
    {
        $view = './app/view/' . $view . '.php';
        require_once $view;
    }
    function viewOrd()
    {
        $this->data['listord'] = $this->order->getOrder();
        $this->renderView('order', $this->data);
    }

    // function OrdDetail(){
    //     if (isset($_GET['id']) && ($_GET['id']) > 0) {
    //         $id = $_GET['id'];
    //         $ordct = $this->orderdetail->getIdOrder($id);
    //     }
    //     if (is_array($ordct)) {
    //         $this->data['ordct'] = $ordct;
    //         $this->renderView('orderDetail', $this->data);
    //     } else {
    //         echo "Not found Comment";
    //     }
    //     return $this->renderView('OrderDetail', $ordct);
    //     }

    public function OrdDetail()
    {
        // Lấy idOrder từ URL nếu có
        $idOrder = isset($_GET['id']) ? $_GET['id'] : null;
        if ($idOrder) {
            // Lấy chi tiết đơn hàng với ID đó
            $this->data['ordDetail'] = $this->order->getOrderDetailsWithImages($idOrder);
            // Trả về dữ liệu cho view
            return $this->renderView('orderDetail', $this->data);
        } else {
            // Trường hợp không có idOrder
            echo "Không có đơn hàng";
        }
    }
}
