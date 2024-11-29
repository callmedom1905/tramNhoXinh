<?php
class SearchController{
    private $search;
    private $products;
    private $category;
    function __construct()
    {
        $this->products = new ProductsModel();
        $this->search = new SearchModel();
        $this->category = new ProductCateModel();
    }

    function renderView($view, $data = []){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }


    function getSearch(){
        if(isset($_POST['submitSearch'])){
            $data = [];
            $key = $_POST['search'];
            $dataView = $this->search->getSearch($key);
            
                $data['prohot'] = $this->products->getProHot();
               

            
        }
       $this->renderView('search', ['dataSearch' => $dataView , 'prohot'=>$data['prohot'], 'key'=>$key]);
    }
}
?>