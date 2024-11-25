<?php
class HomeController{
    private $product;
    private $category;
    private $post;
    private $data;
   
    function __construct(){
        $this->product = new ProductsModel();
        $this->category = new ProductCateModel();
        $this->post = new PostModel();
    }
    
    function renderView($view, $data){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }

    function viewHome(){
        $this->data['product8'] = $this->product->get8Pro();
        $this->data['product6'] = $this->product->get6Pro();
        $this->data['post'] = $this->post->getPost();
        return $this->renderView('home', $this->data);
    }


}