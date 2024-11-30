<?php
session_start();
ob_start();
// session_unset();
//Model
require_once 'vendor/autoload.php';
require_once 'app/model/database.php';
require_once 'app/model/productsModel.php';
require_once 'app/model/userModel.php';
require_once 'app/model/productCateModel.php';
require_once 'app/model/productCommentModel.php';
require_once 'app/model/postModel.php';
require_once 'app/model/ratingModel.php';
require_once 'app/model/favoriteModel.php';
require_once 'app/model/searchModel.php';
require_once 'app/model/orderModel.php';
require_once 'app/model/orderItemModel.php';

//Controller
require_once 'app/controller/homeController.php';
require_once 'app/controller/paymentController.php';
require_once 'app/controller/userController.php';
require_once 'app/controller/productController.php';
require_once 'app/controller/postController.php';
require_once 'app/controller/mailerController.php';
require_once 'app/controller/cartController.php';
require_once 'app/controller/favoriteController.php';
require_once 'app/controller/getFavoriteController.php';
require_once 'app/controller/updateFavoriteController.php';
require_once 'app/controller/removeFavoriteController.php';
require_once 'app/controller/searchController.php';


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

        // trang bài viết
        case 'post':
            $post = new PostController();
            $post->viewPost();
            break;
        case 'postDetail':
            $postDetail = new PostController();
            $postDetail->viewPostDetail();
            break;

        // trang thanh toán
        case 'payment':
            $payment = new PaymentController();
            $payment->viewPayment();
            break;
        // case 'paymentStep1':
        //     $paymentStep2 = new PaymentController();
        //     $paymentStep2->viewPaymentStep1();
        //     break;
        case 'paymentStep2':
            $paymentStep2 = new PaymentController();
            $paymentStep2->viewPaymentStep2();
            break;

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
            echo "<script>
                    localStorage.removeItem('userId');
                    localStorage.removeItem('danhSachThichSP');
                    alert('Đăng xuất thành công');
                    window.location.href = 'index.php'; 
                </script>";
            break;
        case 'forgotPass':
            $forgotPass = new UserController();
            $forgotPass->forgotPass();
            break;
        //giỏ hàng
        case 'addToCart':
            $addToCart = new CartController();
            $addToCart->addToCart();
            break;
        case 'removeFromCart':
            $removeFromCart = new CartController();
            $removeFromCart->removeFromCart();
            break;
        //thích sản phẩm
        case 'insertFavorite':
            $favorite = new FavoriteController();
            $favorite->insertFavorite();
        break;
        case 'getFavorite':
            $getFavorite = new GetFavoriteController();
            $getFavorite->getFavorite();
            break;
        case 'capNhatTrucTiep':
            $capNhatTrucTiep = new UpdateFavoriteController();
            $capNhatTrucTiep->capNhatTrucTiep();
            break;
        case 'removeFavorite':
            $removeFavorite = new RemoveFavoriteController();
            $removeFavorite->removeFavorite();
            break;
        //tìm kiếm
        case 'search':
            $search = new SearchController();
            $search->getSearch();
            break;
        //đặt hàng
        case 'order':
            $order = new PaymentController();
            $order->createOrder();
            break;


        //xác thực email
        case 'verify':
            $verify = new UserController();
            $verify->verifyEmail();
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