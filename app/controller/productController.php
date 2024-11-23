<?php
class ProductController{
    private $products;
    private $data;

    function __construct(){
        $this->products = new ProductsModel();
    }
    function renderView($view, $data){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }

    function viewProduct(){
        $this->data['products'] = $this->products->getAllPro();
        return $this->renderView('product', $this->data);
    }
}