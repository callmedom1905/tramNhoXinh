<?php
session_start();
ob_start();
require_once 'app/model/database.php';
require_once 'app/model/productsModel.php';
require_once 'app/model/postModel.php';
require_once 'app/controller/homeController.php';
require_once 'app/controller/postController.php';
require_once 'app/controller/aboutController.php';
require_once 'app/view/header.php';
$db = new DataBase();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'home':
            $home = new HomeController();
            $home->viewHome();
            break;
        
        case 'post':
            $post = new PostController();
            $post->postView();
            break;
        case 'postProBandana':
            $postProBandana = new PostController();
            $postProBandana->postProBandana();
            break;
        case 'postProShoulderlen':
            $postProShoulderlen = new PostController();
            $postProShoulderlen->postProShoulderlen();
            break;
        case 'postProMockhoa':
            $postProMockhoa = new PostController();
            $postProMockhoa->postProMockhoa();
            break;
        case 'about':
            $about = new AboutController();
            $about->aboutView();
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

