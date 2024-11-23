<?php
class ProductController{
    private $products;
    private $category;
    private $data;

    function __construct(){
        $this->products = new ProductsModel();
        $this->category = new ProductCateModel();
    }
    function renderView($view, $data){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }

    function viewProCate(){
        if(isset($_GET['id']) && $_GET['id']>0){
            $idcate = $_GET['id'];
            $this->data['products'] = $this->products->getProCate($idcate); //lấy sản phẩm cùng danh mục
            $this->data['prohot'] = $this->products->getProHot();  //lấy sản phẩm hot (view cao)
            $this->data['nameCate'] = $this->category->getNameCate($idcate);  //lấy tên danh mục theo id
            return $this->renderView('product', $this->data);
        }else{
            echo 'Not found category';
        }
    }

    function viewProDetail(){
        if(isset($_GET['id'])){
            $idpro = $_GET['id'];
            $this->data['detail'] = $this->products->getIdPro($idpro); //lấy chi tiết sản phẩm theo id
            $this->data['newpro'] = $this->products->getNewPro(); //lấy sản phẩm mới nhất
            return $this->renderView('productDetail', $this->data);
        }else{
            echo 'Not found product';
        }
    }


}