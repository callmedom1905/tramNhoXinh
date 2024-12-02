<?php
class CartController
{
    function addToCart()
    {
        // Kiểm tra xem form đã được gửi hay chưa
        if (isset($_POST['addToCart'])) {
            // Lấy thông tin sản phẩm từ form
            $id = $_POST['product_id'];
            $name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $image = $_POST['product_image'];
            $color = $_POST['product_color'];

            // Khởi tạo mảng sản phẩm
            $item = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'color' => $color,
                'quantity' => 1
            ];

            // Khởi tạo giỏ hàng nếu chưa có
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = []; // Khởi tạo giỏ hàng là mảng rỗng
            }

            $found = false;
            // Duyệt qua giỏ hàng để kiểm tra sản phẩm đã có chưa
            foreach ($_SESSION['cart'] as &$cartItem) {
                // Kiểm tra nếu $cartItem là một mảng và có chỉ số 'id'
                if (is_array($cartItem) && isset($cartItem['id']) && $cartItem['id'] == $id) {
                    $cartItem['quantity']++; // Cập nhật số lượng
                    $found = true;
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    break;
                }
            }


            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            if (!$found) {
                $_SESSION['cart'][] = $item;
                // chuyển hướng đến trang hiện tại
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        } else {
            echo '<script>alert("Không có sản phẩm nào được gửi")</script>';
        }
    }

    function removeFromCart()
    {
        // Kiểm tra xem yêu cầu xóa có được gửi không
        if (isset($_POST['removeFromCart']) && isset($_POST['deletePro'])) {
            $id = $_POST['deletePro'];

            // Kiểm tra xem giỏ hàng có tồn tại không
            if (isset($_SESSION['cart'])) {
                // Duyệt qua giỏ hàng để tìm sản phẩm cần xóa
                foreach ($_SESSION['cart'] as $key => $cartItem) {
                    if (is_array($cartItem) && $cartItem['id'] == $id) {
                        unset($_SESSION['cart'][$key]); // Xóa sản phẩm khỏi giỏ hàng
                        // chuyển hướng đến trang hiện tại
                        header("Location: " . $_SERVER['HTTP_REFERER']);

                        break;
                    }
                }
            }
        }
    }

    function updateCart()
    {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);
            echo print_r($data);
            $action = $data['action'];
            $proId = $data['proId'];

            if (isset($_SESSION['cart'])) {
                $cartUpdate = false;
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] === $proId) {
                        if ($action === 'giam') {
                            $item['quantity']--;
                        } else if ($action === 'tang' && $item['quantity'] >= 0) {
                            $item['quantity']++;
                        }
                        $cartUpdate = true;
                        break;
                    }
                }
            }
        }
    }


    function addToCartInDetail()
    {
        if (isset($_POST['addToCartInDetail'])) {
            // Lấy thông tin sản phẩm từ form
            $quantity = $_POST['product_quantity'];
            $id = $_POST['product_id'];
            $name = $_POST['product_name'];
            $price = $_POST['product_price'];
            $image = $_POST['product_image'];
            $color = $_POST['product_color'];

            $item = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'color' => $color,
                'quantity' => $quantity
            ];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            $found = false;
            // Duyệt qua giỏ hàng để kiểm tra sản phẩm đã có chưa
            foreach ($_SESSION['cart'] as &$cartItem) {
                // Kiểm tra nếu $cartItem là một mảng và có chỉ số 'id'
                if (is_array($cartItem) && isset($cartItem['id']) && $cartItem['id'] == $id) {
                    $cartItem['quantity']++; // Cập nhật số lượng
                    $found = true;
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    break;
                }
            }
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            if (!$found) {
                $_SESSION['cart'][] = $item;
                // chuyển hướng đến trang hiện tại
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }
}