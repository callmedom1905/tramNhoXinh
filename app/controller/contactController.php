<?php
class ContactController{
    function renderView($view){
        $view = 'app/view/'.$view.'.php';
        require_once $view;
    }
    
    function viewContact(){
        return $this->renderView('contact');
    }
}