<?php
class AboutController{
    function renderView($view){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }
    function aboutView(){
        return $this->renderView('about');
    }
}
?>