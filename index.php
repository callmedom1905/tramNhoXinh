<?php
session_start();
ob_start();
require_once 'app/model/database.php';
require_once 'app/model/productsModel.php';
require_once 'app/controller/homeController.php';
require_once 'app/view/header.php';
$db = new DataBase();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'home':
            $home = new HomeController();
            $home->viewHome();
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