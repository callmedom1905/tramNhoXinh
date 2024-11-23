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
            $this->data['products'] = $this->products->getProCate($idcate);
            $this->data['prohot'] = $this->products->getProHot(); 
            $this->data['nameCate'] = $this->category->getNameCate($idcate);
            return $this->renderView('product', $this->data);
        }  
    }


}