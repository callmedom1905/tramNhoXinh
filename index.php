<?php
session_start();
ob_start();
require_once 'app/model/database.php';
require_once 'app/model/productsModel.php';
require_once 'app/model/userModel.php';
require_once 'app/model/productCateModel.php';
require_once 'app/model/productCommentModel.php';
require_once 'app/controller/homeController.php';
require_once 'app/controller/paymentController.php';
require_once 'app/controller/userController.php';
require_once 'app/controller/productController.php';
require_once 'app/view/header.php';
$db = new DataBase();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'home':
            $home = new HomeController();
            $home->viewHome();
            break;

            // trang sản phẩm
        case 'product':
            $product = new ProductController();
            $product->viewProCate();
            break;
        case 'productDetail':
            $productDetail = new ProductController();
            $productDetail->viewProDetail();
            break;

        //     // trang bài viết
        // case 'post':
        //     $post = new PostController();
        //     $post->viewPost();
        //     break;
        // case 'postProBandana':
        //     $postProBandana = new PostController();
        //     $postProBandana->viewPostProBandana();
        //     break;
        // case 'postProShoulder':
        //     $postProShoulder = new PostController();
        //     $postProShoulder->viewPostProShoulder();
        //     break;

            // trang thanh toán
        case 'payment':
            $payment = new PaymentController();
            $payment->viewPayment();
            break;
        // case 'paymentStep1':
        //     $paymentStep1 = new PaymentController();
        //     $paymentStep1->viewPaymentStep1();
        //     break;
        // case 'paymentStep2':
        //     $paymentStep2 = new PaymentController();
        //     $paymentStep2->viewPaymentStep2();
        //     break;

        //     // trang thông tin người dùng
        // case 'userAddress':
        //     $userAddress = new UserController();
        //     $userAddress->viewUserAddress();
        //     break;
        // case 'userFavorite':
        //     $userFavorite = new UserController();
        //     $userFavorite->viewUserFavorite();
        //     break;
        // case 'userInfo':
        //     $userInfo = new UserController();
        //     $userInfo->viewUserInfo();
        //     break;
        // case 'userOrder':
        //     $userOrder = new UserController();
        //     $userOrder->viewUserOrder();
        //     break;

        //     //trang liên hệ
        // case 'contact':
        //     $contact = new ContactController();
        //     $contact->viewContact();
        //     break;

            //các chức năng
        case 'register':
            $register = new UserController();
            $register->register();
            break;
        case 'login':
            $login = new UserController();
            $login->login();
            break;
        case 'logout':
            session_unset();
            header('Location: index.php');
            break;
        




        default:
            $home = new HomeController();
            $home->viewHome();
            break;
    }
} else {
    $home = new HomeController();
    $home->viewHome();
}
require_once 'app/view/footer.php';