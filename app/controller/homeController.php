<?php
class HomeController{
    private $product;
    private $data;
    function __construct(){
        $this->product = new ProductsModel();
    }

    function renderView($view, $data){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }

    // function viewHome(){
    //     $this->renderView('home');
    // }

    function viewHome(){
        $this->data['product8'] = $this->product->get8Pro();
        $this->data['product6'] = $this->product->get6Pro();
        return $this->renderView('home', $this->data);
    }
    


}